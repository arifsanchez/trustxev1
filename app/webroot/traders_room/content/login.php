<br><br>
<table cellpadding="0" cellspacing="10"  border="0" bgcolor="#EEF4F9" class="formtable" align="center" width="100%">
<?
   if(!empty($login_error))
     {
?>      <tr>
          <td width="40%" align="right">&nbsp;</td>
          <td width="60%" colspan="2"><font color="#ff0000"><b><?
          switch($login_error)
            {
             case 'Invalid':
                echo $LNG['login_errorHeader'];
                break;
             default:
                echo $LNG['login_errorHeader2'];
            }
          ?></b></font></td>
        </tr>
<?
     }
?>
   <form action="index.php" method="POST">
      <tr>
        <td width="40%" align="right"><p><strong><?=$LNG['login_login']?>:</strong></p></td>
        <td width="60%" colspan="2"><input name="d[login]" style="width:150px;" value=""  onFocus="this.select();" /></td>
      </tr>
      <tr>
        <td width="40%" align="right"><p><strong><?=$LNG['login_password']?>:</strong></p></td>
        <td><input type="password" name="d[pass]" style="width:150px;" value="" onFocus="this.select();" /></td>
        <td width="60%"><input name="e[login]" type="image" src="<?=$LNG['login_img_button']?>" width="55" height="22" border="0" /></td>
      </tr>
   </form>
</table>