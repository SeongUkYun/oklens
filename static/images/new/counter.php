<?php
//設定
$countDir='count_data';		//カウントデータ格納ディレクトリ
$countFig=7;			//合計カウンタ桁数
$dayFig=3;				//昨日・今日カウンタ桁数
$dataCreate=0;			//指定したカウントデータが無い場合は新規に（作る:1／作らない:0）
$refererCheck=0;		//リファラで外部からのアクセスを拒否（する:1／しない:0）
$i=0;
 
//メイン
$remote=gethostbyaddr($_SERVER['REMOTE_ADDR']);
$dateNow=date("Y-m-d");
/*外部からの利用禁止*/
if($refererCheck==1||$dataCreate==1){
	if($_SERVER['HTTP_HOST']!=preg_replace("/^http:\/\/(.*?)\/.*$/","$1",$_SERVER['HTTP_REFERER'])) exit('deny');
}
if($file) $countFile="$countDir/$file.php";
else exit('error');
if(!file_exists($countDir)) exit('error');
if(!file_exists($countFile)){
	if($dataCreate==1){
		$fp=fopen($countFile,"w");
		fwrite($fp,"\t\t\t\t\t\t");
		fclose($fp);
		chmod($countFile,0666);
	}
	else exit('no file');
}
if(!$data=file($countFile)){
	$data[0]="\t\t\t\t\t\t";
}
list(,$count,$host,$today,$date,$yesterday)=explode("\t",$data[0]);
if($host!=$remote){
	if($date!=$dateNow){
		$dateYday=date("Y-m-d",time()-24*60*60);
		if($date!=$dateYday) $yesterday=0;
		else $yesterday=$today;
		$today=0;
		$date=$dateNow;
	}
	$host=$remote;
	$today++;
	$count++;
	$lockFile="$countDir/lock";
	while($i<=3){
		if(!file_exists($lockFile)){
	touch($lockFile);
			$fp=fopen($countFile,"w");
			fwrite($fp,"<?php /*\t$count\t$host\t$today\t$date\t$yesterday\t*/ ?>");
			fclose($fp);
			unlink($lockFile);
			break;
		}
		$i++;
		sleep(1);
	}
	if($i){
		unlink($lockFile);
		exit('TIMEOUT');
	}
}
$count=sprintf("%0{$countFig}d",$count);
?>
