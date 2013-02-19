<?
//---- инициализация
$userInfo=array('account'=>'','name'=>'');
$rows    =array();
$total   =array();
//---- запрос данных
if($mode=='trade') trade();   // состояния счета
else               history(); // история   счета
?>
<table cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
  <tr>
    <td align="right" class="room_text" style="padding: 0 5 5 5;"><?include ('user_info.php')?></td>
  </tr>
</table>
<table cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
  <tr>
    <td height="100%" valign="top">
      <table cellspacing="0" cellpadding="0" border="0" width="100%" height="100%">
        <tr valign="top" height="100%">
          <td style="background-color: buttonshadow;" align="top" height="100%"><?include ('quotes.php')?></td>
          <td><?include ('chart.php')?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td style="background-color: buttonshadow;"><?include ('order_table.php')?></td>
  </tr>
  <tr>
    <td style="background-color: buttonshadow;"><?include ('tab.php')?></td>
  </tr>
</table>
<p style="font-size:9px;"><?=$LNG['attention']?></p>
