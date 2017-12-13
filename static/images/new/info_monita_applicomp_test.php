<?php
        error_reporting(1);
	session_start();
 
	if(empty($_SESSION["name"])){
		$login_url ="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]) . "/info_monita_application.php";
		header("Location:{$login_url}");
		exit;
	}

	$name		= mb_convert_kana($_SESSION["name"], "asK", "SHIFT_JIS");
	$kana		= mb_convert_kana($_SESSION["kana"], "asK", "SHIFT_JIS");
	$sex		= mb_convert_kana($_SESSION["sex"], "asK", "SHIFT_JIS");
	$marriage	= mb_convert_kana($_SESSION["marriage"], "asK", "SHIFT_JIS");
	$lasik		= mb_convert_kana($_SESSION["lasik"], "asK", "SHIFT_JIS");
	$birth_y	= mb_convert_kana($_SESSION["birth_y"], "asK", "SHIFT_JIS");
	$birth_m	= mb_convert_kana($_SESSION["birth_m"], "asK", "SHIFT_JIS");
	$birth_d	= mb_convert_kana($_SESSION["birth_d"], "asK", "SHIFT_JIS");
	$birth_g	= mb_convert_kana($_SESSION["birth_g"], "asK", "SHIFT_JIS");
	$zip		= mb_convert_kana($_SESSION["zip"], "asK", "SHIFT_JIS");
	$addr		= mb_convert_kana($_SESSION["addr"], "asK", "SHIFT_JIS");
	$station1	= mb_convert_kana($_SESSION["station1"], "asK", "SHIFT_JIS");
	$company	= mb_convert_kana($_SESSION["company"], "asK", "SHIFT_JIS");
	$station2	= mb_convert_kana($_SESSION["station2"], "asK", "SHIFT_JIS");
	$tel		= mb_convert_kana($_SESSION["tel"], "asK", "SHIFT_JIS");
	$email		= mb_convert_kana($_SESSION["email"], "asK", "SHIFT_JIS");
	$job		= mb_convert_kana($_SESSION["job"], "asK", "SHIFT_JIS");
	$eye1		= mb_convert_kana($_SESSION["eye1"], "asK", "SHIFT_JIS");
	$eye2_1		= mb_convert_kana($_SESSION["eye2_1"], "asK", "SHIFT_JIS");
	$eye2_2		= mb_convert_kana($_SESSION["eye2_2"], "asK", "SHIFT_JIS");
	$eye3_1		= mb_convert_kana($_SESSION["eye3_1"], "asK", "SHIFT_JIS");
	$eye3_2		= mb_convert_kana($_SESSION["eye3_2"], "asK", "SHIFT_JIS");
	$eye4_1		= mb_convert_kana($_SESSION["eye4_1"], "asK", "SHIFT_JIS");
	$eye4_2		= mb_convert_kana($_SESSION["eye4_2"], "asK", "SHIFT_JIS");
	$eye5		= mb_convert_kana($_SESSION["eye5"], "asK", "SHIFT_JIS");
	$eye6		= mb_convert_kana($_SESSION["eye6"], "asK", "SHIFT_JIS");
	$eye6_3		= mb_convert_kana($_SESSION["eye6_3"], "asK", "SHIFT_JIS");
	$comment1	= mb_convert_kana($_SESSION["comment1"], "asK", "SHIFT_JIS");
	$comment2	= mb_convert_kana($_SESSION["comment2"], "asK", "SHIFT_JIS");

	if($sex == 1){
		$sex1 = "男性";
	}elseif($sex == 2){
		$sex1 = "女性";
	}else{
		exit;
	}

	if($marriage == 1){
		$marriage1 = "配偶者無し";
	}else{
		$marriage1 = "配偶者有り";
	}

	if($lasik == 1){
		$lasik1 = "無し";
	}else{
		$lasik1 = "有り";
	}

	if($job == 1){
		$job1 = "会社員(事務系)";
	}elseif($job == 2){
		$job1 = "会社員(技術系)";
	}elseif($job == 3){
		$job1 = "会社員(その他)";
	}elseif($job == 4){
		$job1 = "会社経営・役員";
	}elseif($job == 5){
		$job1 = "国家公務員";
	}elseif($job == 6){
		$job1 = "地方公務員";
	}elseif($job == 7){
		$job1 = "自営業";
	}elseif($job == 8){
		$job1 = "自由業";
	}elseif($job == 9){
		$job1 = "医師・弁護士等の専門職";
	}elseif($job == 10){
		$job1 = "派遣・契約社員";
	}elseif($job == 11){
		$job1 = "パート・アルバイト";
	}elseif($job == 12){
		$job1 = "専業主婦";
	}elseif($job == 13){
		$job1 = "学生";
	}elseif($job == 14){
		$job1 = "無職";
	}elseif($job == 15){
		$job1 = "その他";
	}

	if($eye2_1 == 1){
		$eye2_1a = "0.1未満";
	}elseif($eye2_1 == 2){
		$eye2_1a = "0.1以上0.3未満";
	}elseif($eye2_1 == 3){
		$eye2_1a = "0.3以上0.7未満";
	}elseif($eye2_1 == 4){
		$eye2_1a = "0.7以上1.0未満";
	}elseif($eye2_1 == 5){
		$eye2_1a = "1.0以上";
	}

	if($eye2_2 == 1){
		$eye2_2a = "0.1未満";
	}elseif($eye2_2 == 2){
		$eye2_2a = "0.1以上0.3未満";
	}elseif($eye2_2 == 3){
		$eye2_2a = "0.3以上0.7未満";
	}elseif($eye2_2 == 4){
		$eye2_2a = "0.7以上1.0未満";
	}elseif($eye2_2 == 5){
		$eye2_2a = "1.0以上";
	}

	if($eye3_1 == 1){
		$eye3_1a = "-7.0D以上";
	}elseif($eye3_1 == 2){
		$eye3_1a = "-7.0D未満-6.0D以上";
	}elseif($eye3_1 == 3){
		$eye3_1a = "-6.0D未満-5.0D以上";
	}elseif($eye3_1 == 4){
		$eye3_1a = "-5.0D未満-3.0D以上";
	}elseif($eye3_1 == 5){
		$eye3_1a = "-3.0D未満-1.0D以上";
	}elseif($eye3_1 == 6){
		$eye3_1a = "-1.0D未満";
	}elseif($eye3_1 == 7){
		$eye3_1a = "分からない";
	}

	if($eye3_2 == 1){
		$eye3_2a = "-7.0D以上";
	}elseif($eye3_2 == 2){
		$eye3_2a = "-7.0D未満-6.0D以上";
	}elseif($eye3_2 == 3){
		$eye3_2a = "-6.0D未満-5.0D以上";
	}elseif($eye3_2 == 4){
		$eye3_2a = "-5.0D未満-3.0D以上";
	}elseif($eye3_2 == 5){
		$eye3_2a = "-3.0D未満-1.0D以上";
	}elseif($eye3_2 == 6){
		$eye3_2a = "-1.0D未満";
	}elseif($eye3_2 == 7){
		$eye3_2a = "分からない";
	}

	if($eye4_1 == 1){
		$eye4_1a = "無し";
	}elseif($eye4_1 == 2){
		$eye4_1a = "弱い乱視";
	}elseif($eye4_1 == 3){
		$eye4_1a = "強い乱視";
	}

	if($eye4_2 == 1){
		$eye4_2a = "無し";
	}elseif($eye4_2 == 2){
		$eye4_2a = "弱い乱視";
	}elseif($eye4_2 == 3){
		$eye4_2a = "強い乱視";
	}

	if($eye5 == 1){
		$eye5_1 = "無し";
	}else{
		$eye5_1 = "有り";
	}

	if($eye6 == 1){
		$eye6_1 = "無し";
	}else{
		$eye6_1 = "有り";
	}


//-----------メール送信-------------------------------------------------------------//

mb_language("ja");
mb_internal_encoding("Shift-JIS");

//送信先
$mailto = "monitor@oklens.co.jp";
//$mailto = "sakaso0306@yahoo.co.jp";

//送信元
$mailfrom="From:" . mb_encode_mimeheader("{$email}") ;

//件名
$subject = 'モニター応募';

//内容
$mailbody  = '名前: ' . $name . "\n";
$mailbody .= 'かな: ' . $kana . "\n\n";
$mailbody .= '郵便番号: ' . $zip . "\n";
$mailbody .= '住所: ' . $addr . "\n";
$mailbody .= '電話: ' . $tel . "\n";
$mailbody .= 'E-mail: ' . $email . "\n\n";
$mailbody .= '生年月日: ' . $birth_y . "年" . $birth_m . "月" . $birth_d . "日" . "\n";
$mailbody .= '年齢: ' . $birth_g . "\n";
$mailbody .= '性別: ' . $sex1 . "\n";
$mailbody .= '配偶者: ' . $marriage1 . "\n\n";
$mailbody .= '最寄駅: ' . $station1 . "\n";
$mailbody .= '会社学校: ' . $company . "\n";
$mailbody .= '会社学校最寄駅: ' . $station2 . "\n";
$mailbody .= '職業: ' . $job1 . "\n\n";
$mailbody .= '矯正器具: ' . $eye1 . "\n";
$mailbody .= '裸眼視力: ' . "(右)" . $eye2_1a . "(左)" . $eye2_2a . "\n";
$mailbody .= '近視度数: ' . "(右)" . $eye3_1a . "(左)" . $eye3_2a . "\n";
$mailbody .= 'レーシック等の目に関する外科手術歴: ' . $lasik1 . "\n\n";
$mailbody .= '乱視: ' . "(右)" . $eye4_1a . "(左)" . $eye4_2a . "\n";
$mailbody .= 'ハードコンタクト経験: ' .  $eye5_1 . "\n";
$mailbody .= '眼疾患: ' .  $eye6_1 . "\n" . $eye6_3 . "\n\n";
$mailbody .= 'オルソケラトロジーを知ったきっかけ: ' . "\n" . $comment1 . "\n\n";
$mailbody .= 'その他質問: ' . "\n" . $comment2;


mb_send_mail($mailto,$subject,$mailbody,$mailfrom);

//-------------------------------------------------------------------------------------------//
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>モニター募集｜オルソケラトロジー情報館</title>
<link href="css/ortho.css" rel="stylesheet" type="text/css">
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<script language="JavaScript">
<!--
<!-- 
function bluring(){ 
if(event.srcElement.tagName=="A"||event.srcElement.tagName=="IMG") document.body.focus(); 
} 
document.onfocusin=bluring; 
// -->
</script> 
</head>



<body topmargin="0"leftmargin="0" marginheight="0" marginwidth="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top">
	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="0" align="center" valign="top">
		<!--top -->
		<?php include("inc/inc_info_top.php"); ?>	
		<!--top -->	
		</td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="e6e8ea">
		  <table width="100%" height="100" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td height="117" align="center" valign="top" background="image/info/top_bg.jpg"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1100" height="117">
              <param name="movie" value="image/swf/oksb001.swf">
              <param name="quality" value="high">
              <embed src="image/swf/oksb001.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1100" height="117"></embed>
            </object></td>
          </tr>
		   <tr>
            <td align="center" valign="top">
			<table width="923" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
            <tr>
           <td height="800" align="center" valign="top">
		   <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td height="10"></td>
             </tr>
             <tr>
               <td align="center">
			   <table width="852" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td align="right">
				   <table width="240" border="0" cellspacing="0" cellpadding="0" >
                     <tr align="center">
                       <td class="mf1_txt">HOME</td>
                       <td><img src="image/info/y_dot.gif" width="16" height="9"></td>
                       <td class="mf1_txt">インフォメーション</td>
                       <td><img src="image/info/y_dot.gif" width="16" height="9"></td>
                       <td class="mf1_txt">モニター募集</td>
                       </tr>
                   </table>
				   </td>
                 </tr>
               </table>
			   </td>
             </tr>
             <tr>
               <td align="center">
			   <table width="852" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td width="174"><img src="image/info/mtop.jpg" width="138" height="50"></td>
                   <td width="67">&nbsp;</td>
                   <td width="611" valign="bottom"><img src="image/info/md_title006.gif" width="209" height="28"></td>
                 </tr>
               </table>
			   </td>
             </tr>
             <tr>
               <td height="16"></td>
             </tr>
             <tr>
               <td align="center"><img src="image/info/line_top.gif" width="852" height="2"></td>
             </tr>
             <tr>
               <td height="16"></td>
             </tr>
             <tr>
               <td align="center">
			   
			   <table width="852" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td width="241" valign="top">
				      <!--left -->
			   <?php include("inc/inc_info_left.php"); ?>
               <!--left -->					 
			   </td>
                   <td width="611" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                       <td align="center"><img src="image/info/mo_top.jpg"></td>
                     </tr>
                     <tr>
                       <td align="center"><table width="548" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                           <tr>
                             <td valign="top" align="center">
				<!----------------------------------------------------->
                                   <table width="570" border="0" cellspacing="0" cellpadding="0">
                                     <tr>
                                       <td bgcolor="#e1e1e1"><table width="100%" border="0" cellspacing="1" cellpadding="4">
                                           <tr>
                                             <td align="center" width="100%" bgcolor="#ededed">モニター応募受付完了</td>
										   </tr>
										   <tr>
                                             <td width="100%" bgcolor="#FFFFFF" style=" padding:5">
											 <?php echo $name . "様"; ?><br /><br />ご応募ありがとうございます。<br />モニターとして選ばれた方には、最寄りのオルソケラトロジー取扱施設を2週間以内にメールにてご案内します。</td>
                                           </tr>
                                       </table>
									  </td>
                                     </tr>
                                   </table>
                                 </td>
                           </tr>
                       </table></td>
                     </tr>
                     <tr>
                       <td>&nbsp;</td>
                     </tr>
                     <tr>
                       <td>&nbsp;</td>
                     </tr>
                     <tr>
                       <td>&nbsp;</td>
                     </tr>
                   </table>
				   
				   </td>
                 </tr>
               </table>
			   </td>
             </tr>
           </table>
		   </td>
              </tr>
         </table>
            </td>
            </tr>
        </table>		
		</td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="e6e8ea">
		
		<!--foot-->
	<?php include("inc/inc_foot.php"); ?>
			<!--foot--> 
		</td>
      </tr>
    </table>
	</td>
  </tr>
</table>
</body>
</html>
<?php $_SESSION = array(); ?>