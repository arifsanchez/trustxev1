<?
//---- настройка языка
$LNG         =$_languages['en']; // текущий язык английский
//$LNG         =$_languages['ru']; // текущий язык русский
//---- настройка симовлов
$MAIN_SYMBOLS=array('EURUSD','GBPUSD','USDCHF','USDJPY',);
$MORE_SYMBOLS=array('AUDUSD','USDCAD','EURGBP','EURCHF','EURJPY','GBPJPY',);
//настройка периодов
$PERIODS     =array('W1'=>10080,'D1'=>1440,'H1'=>60,'M15'=>15,);
//---- URL где лежат картинки
$CHART_IMG   ='/charts/dealing_rates';
//---- табы
$TABS        =array('trade'=>$LNG['trade'],'history'=>$LNG['account_history'],);
?>