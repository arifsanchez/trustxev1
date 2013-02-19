<?
//+------------------------------------------------------------------+
//| Trade                                                            |
//+------------------------------------------------------------------+
if($mode=='trade'){?>
<table cellspacing="1" cellpadding="3" border="0" width="100%" class="room_text">
  <tr align="right" style="background-color: buttonface;">
    <td class="room_hcell" align="left"><?=$LNG['trade_order']?></td>
    <td class="room_hcell"><?=$LNG['trade_time']?></td>
    <td class="room_hcell"><?=$LNG['trade_type']?></td>
    <td class="room_hcell"><?=$LNG['trade_lot']?></td>
    <td class="room_hcell"><?=$LNG['trade_symbol']?></td>
    <td class="room_hcell"><?=$LNG['trade_price']?></td>
    <td class="room_hcell">S/L</td>
    <td class="room_hcell">T/P</td>
    <td class="room_hcell"><?=$LNG['trade_price']?></td>
    <td class="room_hcell"><?=$LNG['trade_comm']?></td>
    <td class="room_hcell"><?=$LNG['trade_swap']?></td>
    <td class="room_hcell"><?=$LNG['trade_profit']?></td>
  </tr>
<?foreach($rows as $row){
//---- итоговая строчка
    if(is_null($row)){?>
  <tr bgcolor="#cccccc">
    <td colspan="11">
      <table cellspacing="0" cellpadding="0" border="0" class="room_text">
        <tr valign="middle">
          <td><img src="img/0.gif" width="2" height="9" ></td>
          <td valign="middle">
            <img src="img/0.gif" width="1" height="2" ><br>
            <img src="img/profit_<?=$total['profit_img']?>.gif" width="11" height="9" ></td>
          <td><img src="img/0.gif" width="3" height="9" ></td>
          <td class="room_text"><b><?=$LNG['trade_balance']?>: <nobr><?=$total['balance']?></nobr> <?=$LNG['trade_equity']?>: <nobr><?=$total['equity']?></nobr> <?=$LNG['trade_margin']?>: <nobr><?=$total['margin']?></nobr> <?=$LNG['trade_freemargin']?>: <nobr><?=$total['free_margin']?></nobr> <?=$LNG['trade_level']?>: <nobr><?=$total['margin_level']?></nobr></b></td>
        </tr>
      </table></td>
    <td align="right" class="room_text"><b><?=$total['profit']?></b></td>
  </tr>
<?}else{
//---- ордеры
?>
  <tr align="right" bgcolor="<?=$row['bgcolor']?>">
    <td align="left">
       <table cellspacing="0" cellpadding="0" border="0" style="margin-top:0px;">
          <tr>
             <td><img src="img/<?=$row['icon_img']?>.gif" width="16" height="16" ></td>
             <td class="room_text">&nbsp;<?=$row['order']?></td>
          </tr>
       </table></td>
    <td class="room_text"><?=$row['time']?></td>
    <td class="room_text"><?=$row['type']?></td>
    <td class="room_text"><nobr><?=$row['lots']?></nobr></td>
    <td class="room_text"><?=$row['symbol']?></td>
    <td class="room_text"><nobr><?=$row['start_price']?></nobr></td>
    <td class="room_text"><nobr><?=$row['S/L']?></nobr></td>
    <td class="room_text"><nobr><?=$row['T/P']?></nobr></td>
    <td class="room_text"><nobr><?=$row['price']?></nobr></td>
    <?if(isset($row['comm'])){
      //---- открытые
    ?>
      <td class="room_text"><nobr><?=$row['comm']?></nobr></td>
      <td class="room_text"><nobr><?=$row['swap']?></nobr></td>
      <td class="room_text"><nobr><?=$row['profit']?></nobr></td>
    <?}else{
      //---- отложенные
    ?>
      <td class="room_text" colspan="3">&nbsp;</td>
    <?}?>   
  </tr>
<?}}?>
</table>
<?}else{
//+------------------------------------------------------------------+
//| Account history                                                  |
//+------------------------------------------------------------------+
?>
<table cellspacing="1" cellpadding="3" border="0" width="100%">
  <tr align="right" style="background-color: buttonface;" class="room_text">
    <td class="room_hcell" align="left"><?=$LNG['trade_order']?></td>
    <td class="room_hcell"><?=$LNG['trade_time']?></td>
    <td class="room_hcell"><?=$LNG['trade_type']?></td>
    <td class="room_hcell"><?=$LNG['trade_lot']?></td>
    <td class="room_hcell"><?=$LNG['trade_symbol']?></td>
    <td class="room_hcell"><?=$LNG['trade_price']?></td>
    <td class="room_hcell">S/L</td>
    <td class="room_hcell">T/P</td>
    <td class="room_hcell"><?=$LNG['trade_time']?></td>
    <td class="room_hcell"><?=$LNG['trade_price']?></td>
    <td class="room_hcell"><?=$LNG['trade_swap']?></td>
    <td class="room_hcell"><?=$LNG['trade_profit']?></td>
  </tr>
<?$cnt=0; $is_balance=false;
foreach($rows as $row){
  $is_balance=strpos($row['type'],'balance');
  ?>
  <tr align="right" bgcolor="<?=$row['bgcolor']?>">
    <td align="left">
       <table cellspacing="0" cellpadding="0" border="0" style="margin-top:0px;">
          <tr>
             <td><nobr>
               <img src="img/<?=$row['icon_img']?>.gif" <?if($is_balance!==false){?>width="11" height="9"<?}else{?>width="16" height="16"<?}?>>
               <img src="img/0.gif" width="1" height="2"></nobr></td>
             <td width="20" class="room_text">&nbsp;<?=$row['order']?></td>
          </tr>
       </table></td>
<?if($is_balance!==false){?>
    <td class="room_text"><?=$row['start_time']?></td>
    <td class="room_text"><?=$row['type']?></td>
    <td class="room_text" align="left" colspan="8"><nobr><?=$row['lots']?></nobr></td>
    <td class="room_text"><nobr><?=$row['profit']?></nobr></td>
<?}else{?>
    <td class="room_text"><?=$row['start_time']?></td>
    <td class="room_text"><?=$row['type']?></td>
    <td class="room_text"><nobr><?=$row['lots']?></nobr></td>
    <td class="room_text"><?=$row['symbol']?></td>
    <td class="room_text"><nobr><?=$row['start_price']?></nobr></td>
    <td class="room_text"><nobr><?=$row['S/L']?></nobr></td>
    <td class="room_text"><nobr><?=$row['T/P']?></nobr></td>
    <td class="room_text"><?=$row['stop_time']?></td>
    <td class="room_text"><nobr><?=$row['stop_price']?></nobr></td>
    <?if(is_null($row['comment'])){?>
      <td class="room_text"><nobr><?=$row['swap']?></nobr></td>
      <td class="room_text"><nobr><?=$row['profit']?></nobr></td>
    <?}else{?>
      <td class="room_text" align="right" colspan="2"><nobr><?=$row['comment']?></nobr></td>
    <?}?>
<?}?>
  </tr>
<?++$cnt;}?>
  <tr bgcolor="#cccccc">
    <td colspan="11">
      <table cellspacing="0" cellpadding="0" border="0" class="room_text">
        <tr valign="middle">
          <td><img src="img/0.gif" width="2" height="9" ></td>
          <td valign="middle">
            <img src="img/0.gif" width="1" height="2" ><br>
            <img src="img/profit_stop.gif" width="11" height="9" ></td>
          <td><img src="img/0.gif" width="3" height="9" ></td>
          <td class="room_text"><b><?=$LNG['history_profit/loss']?>: <nobr><?=$total['profit/loss']?></nobr> <?=$LNG['history_credit']?>: <nobr><?=$total['credit']?></nobr> <?=$LNG['history_deposit']?>: <nobr><?=$total['deposit']?></nobr> <?=$LNG['history_withdrawal']?>: <nobr><?=$total['withdrawal']?></nobr></b></td>
        </tr>
      </table></td>
    <td align="right" class="room_text"><b><?=$total['profit']?></b></td>
  </tr>
</table><?}?>