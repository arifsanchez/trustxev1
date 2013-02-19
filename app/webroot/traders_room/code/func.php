<?
//+------------------------------------------------------------------+
//|                                      MetaTrader API Web-services |
//|                                         func.php - version 1.0.1 |
//|                 Copyright © 1999-2008, MetaQuotes Software Corp. |
//|                                        http://www.metaquotes.net |
//+------------------------------------------------------------------+

//+------------------------------------------------------------------+
//| Quotes                                                           |
//+------------------------------------------------------------------+
function quotes()
  {
   global $MAIN_SYMBOLS,$MORE_SYMBOLS,$quotes_row,$time,$CONNECTION_TIMEOUT;
//----
   $res=MQ_Query('QUOTES-'.join(',',$MAIN_SYMBOLS).','.join(',',$MORE_SYMBOLS).',');
   if($res=='!!!CAN\'T CONNECT!!!')
     {
      $CONNECTION_TIMEOUT=true;
      return;
     }
//----
   $time      ='';
   $quotes_row=array();
   $cnt       =0;
   foreach(explode("\n",$res) as $line)
     {
      if(isset($line[0]) && ($line[0]=='u' || $line[0]=='d'))
        {
         $tmp = explode(' ',$line);
         $quotes_row[]=array(
           'direction'=>$tmp[0],
           'symbol'   =>strtoupper($tmp[1]),
           'bid'      =>$tmp[2],
           'ask'      =>$tmp[3],
         );
         ++$cnt;
        }
      elseif($line!='')
        {
         $time=$line;
        }
     }
  }
//+------------------------------------------------------------------+
//| Chart                                                            |
//+------------------------------------------------------------------+
function chart()
  {
   global $MAIN_SYMBOLS,$PERIODS,$currentSymbol,$symbolList,$symbolMenu,$currentPeriod,$periodList,$periodMenu;
//----
   if (isset($_COOKIE['mq_currSymbol']) && in_array(strtoupper($_COOKIE['mq_currSymbol']),$MAIN_SYMBOLS))
      $currentSymbol = strtolower($_COOKIE['mq_currSymbol']);
   else
      $currentSymbol = 'eurusd';
//----
   if (isset($_COOKIE['mq_currPeriod']) && in_array((int)$_COOKIE['mq_currPeriod'],$PERIODS))
      $currentPeriod = (int)$_COOKIE['mq_currPeriod'];
   else
      $currentPeriod = 10080;
//----
   $symbolList='';
   $symbolMenu=array();
   foreach($MAIN_SYMBOLS as $symbol)
     {
      $lowerSymbol =strtolower($symbol);
      $symbolList .='symbolList[i++]="'.$lowerSymbol.'";';
      $symbolMenu[]=array(
        'id'    =>'symbolListItem_'.$lowerSymbol,
        'active'=>$currentSymbol==$lowerSymbol ? 'a' : '',
        'title' =>'<a href="javascript:SetSymbol(\''.$lowerSymbol.'\');">'.$symbol.'</a>',
      );
     }
//----
   $periodList='';
   $periodMenu=array();
   foreach($PERIODS as $symbol=>$period)
     {
      $periodList.='timeList[i++]="'.$period.'";';
      $periodMenu[]=array(
        'id'    =>'timeListItem_'.$period,
        'active'=>$currentPeriod==$period? 'a' : '',
        'title' =>'<a href="javascript:SetTimePeriod(\''.$period.'\');">'.$symbol.'</a>',
      );
     }
  }
//+------------------------------------------------------------------+
//| Open and pending orders                                          |
//+------------------------------------------------------------------+
function trade()
  {
   global $userInfo,$total,$rows,$CONNECTION_TIMEOUT;
//----
   $res='';
   if(!empty($_SESSION['mq_l']))
     {
      $login   =substr((int)$_SESSION['mq_l'],0,14);
      $password=substr($_SESSION['mq_p'],0,16);

      $res=MQ_Query('USERINFO-login='.$login.'|password='.$password,T_CACHEDIR,T_CACHETIME,$login.'/');

      if($res=='!!!CAN\'T CONNECT!!!')
        {
         $CONNECTION_TIMEOUT=true;
         return;
        }
     }
//---- If error or invalid/disabled login then logout
   if(empty($res) || strpos($res,'Invalid')!==false || strpos($res,'Disabled')!==false) MQ_Logout();

   $info=explode("\r\n",$res);
   $size=sizeof($info);

   $userInfo['account']=$info[0];
   $userInfo['name']   =$info[1];
   $userInfo['2']   =$info[2];

   $beginIndex = 3;

   $equity=getParam($info[$beginIndex+1]);
   $margin=getParam($info[$beginIndex+2]);

   $margin_level=$margin!=0 ? ($equity/$margin) : 0;

   $total =array(
     'balance'     =>getParam($info[$beginIndex]),
     'equity'      =>$equity,
     'margin'      =>$margin,
     'free_margin' =>getParam($info[$beginIndex+3]),
     'margin_level'=>number_format(100*$margin_level,2,'.','').'%',
   );
   $rows=array();
//---- list of open orders
   $cnt=0;
   for($i=$beginIndex+4;$i<$size;$i++)
     {
      if($info[$i]==='0') break;
      $row = explode("\t",$info[$i]);
      $rows[]=array(
        'icon_img'   =>strpos($row[2],'buy')===false?'sell':'buy',
        'bgcolor'    =>$cnt%2?'#e0e0e0':'#ffffff',
        'order'      =>$row[0],
        'time'       =>$row[1],
        'type'       =>$row[2],
        'lots'       =>$row[3],
        'symbol'     =>strtolower($row[4]),
        'start_price'=>$row[5],
        'S/L'        =>$row[6],
        'T/P'        =>$row[7],
        'price'      =>$row[8],
        'comm'       =>$row[9],
        'swap'       =>$row[10],
        'profit'     =>$row[11],
      );
      ++$cnt;
     }
   $rows[]=null;
//---- profit
   $profit = getParam($info[$i+3]);
   if($profit==0) $profit_img='stop';
   else           $profit_img=$profit>0?'up':'down';
   $total['profit']    =$profit;
   $total['profit_img']=$profit_img;
//---- list of pending orders
   for($i+=4;$i<$size;$i++)
     {
      if($info[$i]==='0') break;
      $row = explode("\t",$info[$i]);
      $rows[]=array(
        'icon_img'   =>strpos($row[2],'buy')===false?'sell':'buy',
        'bgcolor'    =>$cnt%2?'#e0e0e0':'#ffffff',
        'order'      =>$row[0],
        'time'       =>$row[1],
        'type'       =>$row[2],
        'lots'       =>$row[3],
        'symbol'     =>strtolower($row[4]),
        'start_price'=>$row[5],
        'S/L'        =>$row[6],
        'T/P'        =>$row[7],
        'price'      =>$row[8],
      );
     }
}
//+------------------------------------------------------------------+
//| Account history                                                  |
//+------------------------------------------------------------------+
function history()
  {
   global $userInfo,$total,$rows,$CONNECTION_TIMEOUT;
//----
   $res = '';
   if(!empty($_SESSION['mq_l']))
     {
      $time    =mktime(23,59,59,date('n'),date('j'),date('Y'));
      $login   =substr((int)$_SESSION['mq_l'],0,14);
      $password=substr($_SESSION['mq_p'],0,16);

      $res=MQ_Query('USERHISTORY-login='.$login.'|password='.$password.'|from='.($time-2592000).'|to='.$time,T_CACHEDIR,T_CACHETIME,$login.'/');
      if($res=='!!!CAN\'T CONNECT!!!')
        {
         $CONNECTION_TIMEOUT=true;
         return;
        }
     }

//---- If error or invalid/disabled login then logout
   if(empty($res) || strpos($res,'Invalid')!==false || strpos($res,'Disabled')!==false) MQ_Logout();

   $info=explode("\r\n",$res);
   $size=sizeof($info);

   $userInfo['account'] = $info[0];
   $userInfo['name'] = $info[1];

   $beginIndex = 3;
   $rows=array();
//---- list of orders
   $cnt=0;
   for($i=$beginIndex;$i<$size;$i++)
     {
      if ($info[$i]==='0') break;
      $row = explode("\t",$info[$i]);
      if(strpos($row[2],'balance')!==false)
        {
         list($profit,$lots) = explode(' ',$row[11],2);
         $rows[]=array(
           'icon_img'  =>$row[12]>0?'profit_up':'profit_down',
           'bgcolor'   =>$cnt%2?'#e0e0e0':'#ffffff',
           'order'     =>$row[0],
           'start_time'=>$row[1],
           'type'      =>$row[2],
           'lots'      =>$row[13],
           'profit'    =>$row[12],
         );
        }
      else
        {
         $rows[]=array(
           'icon_img'   =>strpos($row[2],'buy')===false?'sell':'buy',
           'bgcolor'    =>$cnt%2?'#e0e0e0':'#ffffff',
           'order'      =>$row[0],
           'start_time' =>$row[1],
           'type'       =>$row[2],
           'lots'       =>$row[3],
           'symbol'     =>strtolower($row[4]),
           'start_price'=>$row[5],
           'S/L'        =>$row[6],
           'T/P'        =>$row[7],
           'stop_time'  =>$row[8],
           'stop_price' =>$row[9],
           'swap'       =>$row[11],
           'profit'     =>$row[12],
           'comment'    =>strpos($row[2],'limit')!==false?$row[13]:null,
         );
        }
      ++$cnt;
     }
//---- summary
   $profit_loss=getParam($info[$i+6]);
   $deposit    =getParam($info[$i+1]);
   $total=array(
     'profit/loss'=>$profit_loss,
     'credit'     =>getParam($info[$i+3]),
     'deposit'    =>$deposit,
     'withdrawal' =>getParam($info[$i+2]),
     'profit'     =>$deposit+$profit_loss,
   );
  }
//+------------------------------------------------------------------+
//| Parameter string parser                                          |
//+------------------------------------------------------------------+
function getParam($line)
  {
   list($tmp,$value) = explode(' ',$line);
   return $value;
  }
?>