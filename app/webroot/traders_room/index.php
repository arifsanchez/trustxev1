<?
include_once('code/mq.php');
include_once('code/func.php');
include_once('lng.php');
//---- конфиг
include_once('cfg.php');
//---- конфиг
if(session_id()=='')            session_start();
//---- аутентификация
if(isset($_POST['e']['login'])) $login_error=MQ_Login($_POST['d']['login'],$_POST['d']['pass']);
if(isset($_GET['logout']))      MQ_Logout();
//---- изменение режима вывода информации
if(isset($_GET['mode']))        $mode=$_SESSION['mq_mode']=($_GET['mode']==0?'trade':'history');
else                            $mode=isset($_SESSION['mq_mode']) && $_SESSION['mq_mode']=='history'?'history':'trade';
?>
<html>
<head>
  <title><?=$LNG['title']?></title>
  <link href="styles.css" rel="stylesheet" type="text/css"/>
</head>
<body marginheight="0"  marginwidth="0" leftmargin="0" topmargin="0" bottommargin="0" rightmargin="0">
<table cellspacing="0" cellpadding="0" border="0" width="775" align="center" style="padding:15 0 0 0;">
  <tr><td>
    <font class="h1"><?=$LNG['title']?></font>
<?
if(empty($_SESSION['mq_l'])) include('content/login.php');
else                         include('content/terminal.php');
?></td></tr>
</table>

</body>
</html>