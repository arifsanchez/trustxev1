<?
$currentSymbol='';
$symbolList   ='';
$symbolMenu   =array();
$currentPeriod=1;
$periodList   ='';
$periodMenu   =array();
//----
chart();
?>
<script language="JavaScript" type="text/javascript">
var currPeriod = <?=(int)$currentPeriod?>;
var currSymbol = '<?=$currentSymbol?>';
var d = new Date();
var imageLoad = true;
var symbolList = new Array();
var obj = null;
var i=0;
<?=$symbolList?>
var timeList = new Array();
i=0;
<?=$periodList?>

function SetTimePeriod(period){
  if (!period) period = <?=(int)$currentPeriod?>;
  currPeriod = parseInt(period);
  var now = new Date(); now.setMonth(now.getMonth() + 1);
  SetCookie('mq_currPeriod',currPeriod,now,'/');
  LoadChart();
  SetTabChart();
}

function SetSymbol(symbol){
  if (!symbol) symbol = '<?=$currentSymbol?>';
  currSymbol = ""+symbol;
  var now = new Date(); now.setMonth(now.getMonth() + 1);
  SetCookie('mq_currSymbol',currSymbol,now,'/');
  LoadChart();
  SetTabChart();
}

function LoadChart(){
  var obj = document.getElementById('chart');
  if (obj){
    imageLoad = true;
    obj.style.visibility = 'hidden';
    obj.src = '<?=$CHART_IMG?>/'+currSymbol+currPeriod+'_482x240x4.gif?' + d.getMilliseconds();
  }
}

function CompleteLoadChart(){
  if (imageLoad){
    var obj = document.getElementById('chart');
    if (obj) obj.style.visibility = 'visible';
    imageLoad = false;
  }
}

function SetTabChart(){
  __TabProcess('symbolListItem_',currSymbol,symbolList);
  __TabProcess('timeListItem_',currPeriod,timeList);
}

function SetClassName(id,name){
  if (obj = document.getElementById(id)) obj.className = name;
}

function __TabProcess(id,current,list){
  SetClassName(id+current,'room_atab_right');
  SetClassName('dot_'+id+current,'room_atab_pright');
  for (i=0;i<list.length;i++){
    if (list[i]==current) continue;
    SetClassName(id+list[i],'room_tab_right')
    SetClassName('dot_'+id+list[i],'room_tab_pright')
  }
}

function DeleteCookie(name,path,domain){
  if (GetCookie(name)) document.cookie = name+"="+((path) ? "; path="+path : "")+((domain) ? "; domain="+domain : "")+"; expires=Thu, 01-Jan-70 00:00:01 GMT";
}

function SetCookie (name,value,expires,path,domain,secure){
  document.cookie = name+"="+escape(value)+((expires) ? "; expires="+expires.toGMTString() : "")+((path) ? "; path="+path : "")+((domain) ? "; domain="+domain : "")+((secure) ? "; secure" : "");
}

function GetCookie (name){
  var arg = name+"=";
  var alen = arg.length;
  var clen = document.cookie.length;var i = 0;
  while (i < clen){
    var j = i + alen;
    if (document.cookie.substring(i,j)==arg) return GetCookieVal(j);
    i = document.cookie.indexOf(" ",i)+1;
    if (i == 0) break;
  }
  return null;
}

function GetCookieVal(offset){
  var endstr = document.cookie.indexOf (";", offset);
  if (endstr == -1) endstr = document.cookie.length;
  return unescape(document.cookie.substring(offset, endstr));
}
</script>
<table cellspacing="0" cellpadding="0" width="100%" height="100%" style="border-top: 1px solid buttonshadow; border-right: 1px solid buttonshadow; border-bottom: 1px solid buttonshadow;">
  <tr height="100%">
    <td style="background-repeat: no-repeat; background-position: center; background-image: url(img/0.gif);"><img id="chart" src="<?=$CHART_IMG?>/<?=$currentSymbol?><?=$currentPeriod?>_482x240x4.gif" width="482" height="240" onLoad="CompleteLoadChart();" style="visibility: hidden;" /></td>
    <td height="100%">
      <table cellspacing="0" cellpadding="0" width="100%" height="100%">
        <tr>
          <td width="1" class="room_tab_pright"><img src="img/0.gif" width="1" height="100%" ></td>
          <td style="background-color:buttonface;"><img src="img/0.gif" width="100%" height="2" ></td>
        </tr>
<?foreach($symbolMenu as $line){?>
        <tr>
          <td width="1" class="room_<?=$line['active']?>tab_pright" id="dot_<?=$line['id']?>"><img src="img/0.gif" width="1" height="100%" ></td>
          <td align="center" class="room_<?=$line['active']?>tab_right" id="<?=$line['id']?>"><?=$line['title']?></td>
        </tr>
<?}?>
        <tr height="100%">
          <td width="1" class="room_tab_pright" height="100%"><img src="img/0.gif" width="1" height="100%" ></td>
          <td class="room_tab_right">&nbsp;</td>
        </tr>
<?foreach($periodMenu as $line){?>
        <tr>
          <td width="1" class="room_<?=$line['active']?>tab_pright" id="dot_<?=$line['id']?>"><img src="img/0.gif" width="1" height="100%" ></td>
          <td align="center" class="room_<?=$line['active']?>tab_right" id="<?=$line['id']?>"><?=$line['title']?></td>
        </tr>
<?}?>
        <tr>
          <td width="1" class="room_tab_pright"><img src="img/0.gif" width="1" height="100%" ></td>
          <td width="1" style="background-color:buttonface;"><img src="img/0.gif" width="100%" height="2" ></td>
        </tr>
      </table>
    </td>
    <td width="2" style="background-color:buttonface;"><img src="img/0.gif" width="2" height="100%" ></td>
  </tr>
</table>