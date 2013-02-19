<?
//+------------------------------------------------------------------+
//|                                      MetaTrader API Web-services |
//|                                           mq.php - version 1.0.1 |
//|                 Copyright © 1999-2008, MetaQuotes Software Corp. |
//|                                        http://www.metaquotes.net |
//+------------------------------------------------------------------+

define('T_HOST','119.81.40.26'); // MetaTrader Server Address
define('T_PORT',443);                  // MetaTrader Server Port
define('T_TIMEOUT',5);                 // MetaTrader Server Connection Timeout, in sec

define('T_CACHEDIR','cache/');         // cache files directory
define('T_CACHETIME',5);               // cache expiration time, in sec

define('T_CLEAR_DELNUMBER',15);        // limit of deleted files, after which process of cache clearing should be stopped

$MQ_CLEAR_STARTTIME = 0; // time
$MQ_CLEAR_NUMBER = 0;    // deleted files counter

//+------------------------------------------------------------------+
//| Cached Request to MetaTrader Server (web-services API)           |
//+------------------------------------------------------------------+
function MQ_Query($query,$cacheDir=T_CACHEDIR,$cacheTime=T_CACHETIME,$cacheDirPrefix='')
  {
   $ret = '';
   $fName = $cacheDir.$cacheDirPrefix.crc32($query); // cache file name

//--- Is there a cache? Has its time not expired yet?
   if(file_exists($fName) && (time()-filemtime($fName))<$cacheTime) 
     {
      $ret = file_get_contents($fName);
     }
   else
     {
      $ptr=@fsockopen(T_HOST,T_PORT,$errno,$errstr,T_TIMEOUT); 
      if($ptr)
        {
//--- If having connected, request and collect the result
         if(fputs($ptr,"W$query\r\nQUIT\r\n")!=FALSE)
           while(!feof($ptr)) 
             {
              if(($line=fgets($ptr,128))=="end\r\n") break;
              $ret .= $line;
             } 
         fclose($ptr);
         if ($cacheTime>0)
           {
//--- If there is a prefix (login, for example), create a nonpresent directory for storing the cache
            if ($cacheDirPrefix!='' && !file_exists($cacheDir.$cacheDirPrefix))
              {
               foreach(explode('/',$cacheDirPrefix) as $tmp)
                 {
                  if ($tmp=='' || $tmp[0]=='.') continue;
                  $cacheDir .= $tmp.'/';
                  if (!file_exists($cacheDir)) @mkdir($cacheDir);
                 }
              }
//--- save result into cache
            $fp=@fopen($fName,'w');
            if($fp) { fputs($fp,$ret); fclose($fp); }
           }
        }
      else
        {
//--- if connection fails, show the old cache (if there is one) or return with the error 
          if(file_exists($fName))
            {
             touch($fName);
             $ret = file_get_contents($fName);
            }
          else
            {
             $ret = '!!!CAN\'T CONNECT!!!';
            }
        }
     }
//--- clear cache every 3 sec (for such frequency of calls)
   if(!file_exists(T_CACHEDIR.'.clearCache') || (time()-filemtime(T_CACHEDIR.'.clearCache'))>=3)
     {
      ignore_user_abort(true);
      touch(T_CACHEDIR.'.clearCache');

      global $MQ_CLEAR_STARTTIME;
      $MQ_CLEAR_STARTTIME = time();
      MQ_ClearCache(realpath(T_CACHEDIR));

      ignore_user_abort(false);
     }
   return $ret;
  }
//+------------------------------------------------------------------+
//| Clear cache                                                      |
//+------------------------------------------------------------------+
function MQ_ClearCache($dirName)
  {
   if(empty($dirName) || ($list=glob($dirName.'/*'))===false || empty($list)) return;
//---
   global $MQ_CLEAR_NUMBER,$MQ_CLEAR_STARTTIME;
   $size = sizeof($list);
   foreach($list as $fileName)
     {
      $baseName = basename($fileName);
      if ($baseName[0]=='.') continue;
      if (is_dir($fileName))
        {
//--- go through all cache directories recursively
         MQ_ClearCache($fileName);
         if ($MQ_CLEAR_NUMBER>=T_CLEAR_DELNUMBER) return; // by recursion check condition for function exit 
        }
      elseif(($MQ_CLEAR_STARTTIME-filemtime($fileName))>T_CACHETIME)
        {
//--- if the file time is expired, delete it and, if the limit of deleted files has been exceeded, exit
         @unlink($fileName);
         if (++$MQ_CLEAR_NUMBER>=T_CLEAR_DELNUMBER) return;
         --$size;
        }
     }
//--- delete empty directory
   $tmp = realpath(T_CACHEDIR);
   if (!empty($tmp) && $size<=0 && strlen($dirName)>strlen($tmp) && $dirName!=$tmp) @rmdir($dirName);
  }
//+------------------------------------------------------------------+
//| Authentification                                                 |
//+------------------------------------------------------------------+
function MQ_Login($login,$password)
  {
   $login = substr($login,0,14);
   $password = substr($password,0,16);
//---
   $res = MQ_Query('WAPUSER-'.$login.'|'.$password,'',0);
//---
   if($res=='!!!CAN\'T CONNECT!!!')
     {
      MQ_ConnectionTimeOut();
      return;
     }
//---
   if(strpos($res,'Invalid')!==false || strpos($res,'Disabled')!==false)
     {
      MQ_Logout('','',1,0);
      return(strpos($res,'Invalid')!==false ? 'Invalid' : 'Disabled');
     }
   else
     {
      MQ_Logout($login,$password,0,1);
     }
  }
//+------------------------------------------------------------------+
//| Logout                                                           |
//+------------------------------------------------------------------+
function MQ_Logout($login='',$password='',$clearCookie=1,$showHeader=1,$address='')
  {
   if ($address=='') $address = 'index.php';
   if (session_id()=='') session_start();
   $_SESSION['mq_l'] = $login;
   $_SESSION['mq_p'] = $password;
   setcookie('mq_login',1,time()+($clearCookie>0?-1000000:1000000),'/',$_SERVER['HTTP_HOST']);
   if ($showHeader)
     {
      $path = $_SERVER['REQUEST_URI'];
      if (strpos($path,'.php')!==false) $path = dirname($path);
      echo '<html><head><meta http-equiv="Refresh" content="0;url=http://'.$_SERVER['SERVER_NAME'].$path.($path[strlen($path)-1]=='/'?'':'/').$address, '" /></head><body></body></html>';
      exit;
     }
  }
//+------------------------------------------------------------------+
//| Parameter value request                                          |
//+------------------------------------------------------------------+
function MQ_GetParam($line)
  {
   list($tmp,$value) = explode(' ',$line);
   return $value;
  }
//+------------------------------------------------------------------+
//| Query Timeout                                                    |
//+------------------------------------------------------------------+
function MQ_ConnectionTimeOut()
  {
   global $LNG;
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-top:15px;">
  <tr>
    <td bgcolor="#B3B3B3"><img src="img/0.gif" width="1" height="1" alt=""></td>
  </tr>
</table>
<p style="color:#FF0000;"><strong><?=$LNG['ctimeout_header']?></strong></p>
<p><?=$LNG['ctimeout_errorMsg']?></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-top:15px;">
  <tr>
    <td bgcolor="#B3B3B3"><img src="/@/0.gif" width="1" height="1" alt=""></td>
  </tr>
</table><br>
<?
  }
?>