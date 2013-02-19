<table cellspacing="0" cellpadding="0" width="100%" style="border-bottom: 1px solid buttonshadow; border-left: 1px solid buttonshadow; border-right: 1px solid buttonshadow; background-color: buttonface;">
  <tr>
    <td width="2" class="room_tab_pbottom"><img src="img/0.gif" width="2" height="100%" ></td>
<?$cnt=0;
  foreach($TABS as $id=>$title){?>
   <?if($mode!=$id){?><td class="room_tab_bottom"><font class="room_text"><nobr><a href="?mode=<?=$cnt?>#room_start"><?=$title?></nobr></text></td><?}
     else          {?><td class="room_atab_bottom"><font class="room_text"><nobr><?=$title?></nobr></text></td><?}
     if($mode!=$id && $cnt>0){?>
     <td width="1" valign="top" class="room_tab_pbottom" valign="middle">
       <img src="/@/0.gif" width="1" height="6"><br>
       <img src="/@/0.gif" width="1" height="10" style="background-color: buttonshadow;"></td><?}?>
<?++$cnt;}?>
     <td width="100%" class="room_tab_pbottom"><img src="img/0.gif" width="100%" height="1" ></td>
  </tr>
  <tr>
    <td colspan="3" style="background-color:buttonface;"><img src="img/0.gif" width="100%" height="2" ></td>
  </tr>
</table>