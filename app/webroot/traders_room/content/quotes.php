<?
$quotes_row=array();
$time      ='';
quotes();
?>
<table cellspacing="1" cellpadding="2" border="0" width="100%" height="100%">
  <tr align="center">
    <td class="room_hcell"><?=$LNG['qoutes_symbol']?></td>
    <td class="room_hcell"><?=$LNG['qoutes_bid']?></td>
    <td class="room_hcell"><?=$LNG['qoutes_ask']?></td>
  </tr>
<?foreach($quotes_row as $row){?>
  <tr class="room_qcell">
    <td width="85">
      <table cellspacing="0" cellpadding="0" border="0">
        <tr>
          <td><img src="img/<?=$row['direction']?>.gif" width="11" height="9"></td>
          <td><img src="img/0.gif" width="3" height="1"></td>
          <td class="room_text"><?=$row['symbol']?></td>
        </tr>
      </table></td>
    <td width="55" align="right" class="room_qprice_<?=$row['direction']?>"><?=$row['bid']?></td>
    <td width="55" align="right" class="room_qprice_<?=$row['direction']?>"><?=$row['ask']?></td>
  </tr>
<?}?>
  <tr class="room_qcell">
    <td colspan="3" align="center" style="font-size: 10px;"><?=$time?></td>
  </tr>
</table>