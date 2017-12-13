<?php
        error_reporting(1);
	session_start();
 
	if(empty($_SESSION["name"])){
		$login_url ="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]) . "/info_monita_application.php";
		header("Location:{$login_url}");
		exit;
	}

	$name		= $_SESSION["name"];
	$kana		= $_SESSION["kana"];
	$sex		= $_SESSION["sex"];
	$marriage	= $_SESSION["marriage"];
	$lasik		= $_SESSION["lasik"];
	$birth_y	= $_SESSION["birth_y"];
	$birth_m	= $_SESSION["birth_m"];
	$birth_d	= $_SESSION["birth_d"];
	$birth_g	= $_SESSION["birth_g"];
	$zip		= $_SESSION["zip"];
	$addr		= $_SESSION["addr"];
	$station1	= $_SESSION["station1"];
	$company	= $_SESSION["company"];
	$station2	= $_SESSION["station2"];
	$tel		= $_SESSION["tel"];
	$email		= $_SESSION["email"];
	$job		= $_SESSION["job"];
	$eye1		= $_SESSION["eye1"];
	$eye2_1		= $_SESSION["eye2_1"];
	$eye2_2		= $_SESSION["eye2_2"];
	$eye3_1		= $_SESSION["eye3_1"];
	$eye3_2		= $_SESSION["eye3_2"];
	$eye4_1		= $_SESSION["eye4_1"];
	$eye4_2		= $_SESSION["eye4_2"];
	$eye5		= $_SESSION["eye5"];
	$eye6		= $_SESSION["eye6"];
	$eye6_3		= $_SESSION["eye6_3"];
	$comment1	= $_SESSION["comment1"];
	$comment2	= $_SESSION["comment2"];

	if($sex == 1){
		$sex1 = "男性";
	}else{
		$sex1 = "女性";
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

	if(!empty($eye6_3)){
		$eye6_3a = "<br />" . $eye6_3;
	}
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
                                             <td align="right" width="24%" bgcolor="#ededed">お名前</td>
                                             <td width="76%" bgcolor="#FFFFFF" style=" padding:5"><?php echo $name; ?></td>
                                           </tr>
                                           <tr>
                                             <td align="right" width="24%" bgcolor="#ededed">ふりがな</td>
                                             <td width="76%" bgcolor="#FFFFFF" style=" padding:5"><?php echo $kana; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">性別<font color="#CCFF99">-</font></td>
                                             <td width="76%" bgcolor="#FFFFFF" style=" padding:5"><?php echo $sex1; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">生年月日</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5">
												<?php echo $birth_y; ?>年<?php echo $birth_m; ?>月<?php echo $birth_d; ?>日</td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">年齢</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo $birth_g; ?>才</td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">ご住所<font color="#CCFF99">-</font></td>
                                             <td width="76%" bgcolor="#FFFFFF" style=" padding:5">
											 〒<?php echo $zip; ?><br>
                                               <?php echo $addr; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">自宅最寄駅</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo $station1; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">通勤・通学先</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo $company; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">通勤・通学先最寄駅</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo $station2; ?></td>
                                           </tr>
                                           <tr>
                                             <td align="right" width="24%" bgcolor="#ededed">電話番号<br>
                                               （日中連絡先）<font color="#CCFF99">-</font></td>
                                             <td width="76%" bgcolor="#FFFFFF" style=" padding:5"><?php echo $tel; ?></td>
                                           </tr>
                                           <tr>
                                             <td align="right" width="24%" bgcolor="#ededed">E-mail<font color="#CCFF99">-</font></td>
                                             <td width="76%" bgcolor="#FFFFFF"style=" padding:5"><?php echo $email; ?></td>
                                           </tr>
										   <tr>
										    <td width="24%" align="right" bgcolor="#ededed">未既婚</td>
										    <td width="76%" bgcolor="#FFFFFF" style=" padding:5"><?php echo $marriage1; ?></td>
										   </tr>
                                           <tr>
                                             <td align="right" width="24%" bgcolor="#ededed">ご職業</td>
                                             <td width="76%"  bgcolor="#FFFFFF" style=" padding:5"><?php echo $job1; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">
												現在お使いの視力<br>
												矯正器具<font color="#CCFF99">-</font></td>
                                             <td width="76%" bgcolor="#FFFFFF" style=" padding:5"><?php echo $eye1; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">裸眼視力</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo "(右) " . $eye2_1a . " (左) " . $eye2_2a; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">近視度数</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo "(右) " . $eye3_1a . " (左) " . $eye3_2a; ?></td>
                                           </tr>
										   <tr>
										    <td width="24%" align="right" bgcolor="#ededed">レーシック等の<br />
												目に関する外科手術歴</td>
										    <td width="76%" bgcolor="#FFFFFF" style=" padding:5"><?php echo $lasik1; ?></td>
                                           </tr>
										   <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">乱視の有無</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo "(右) " . $eye4_1a . " (左) " . $eye4_2a; ?></td>
                                           </tr>
										   <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">ハードコンタクト<br />
                                               装用経験</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo $eye5_1; ?></td>
                                           </tr>
										   <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">眼疾患の有無</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo $eye6_1 . $eye6_3a; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">オルソケラトロジーを
お知りになったきっかけ</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo $comment1; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="24%" align="right" bgcolor="#ededed">その他ご質問</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo $comment2; ?></td>
                                           </tr>
                                       </table></td>
                                     </tr>
                                   </table>
                                   <table width="570" border="0" cellspacing="0" cellpadding="0">
                                     <tr>
                                       <td align="center" colspan="2"><font color="#FF0000">*上記内容でよろしいですか？</font></td>
                                     </tr>
									 <tr>
                                       <td colspan="2">&nbsp;</td>
                                     </tr>
									 <tr>
									 <form action="info_monita_application.php" method="post">
										<td align="center" width="50%">
											<input type="hidden" name="name" value="<?php echo $name; ?>" />
											<input type="hidden" name="kana" value="<?php echo $kana; ?>" />
											<input type="hidden" name="sex" value="<?php echo $sex; ?>" />
											<input type="hidden" name="marriage" value="<?php echo $marriage; ?>" />
											<input type="hidden" name="lasik" value="<?php echo $lasik; ?>" />
											<input type="hidden" name="birth_y" value="<?php echo $birth_y; ?>" />
											<input type="hidden" name="birth_m" value="<?php echo $birth_m; ?>" />
											<input type="hidden" name="birth_d" value="<?php echo $birth_d; ?>" />
											<input type="hidden" name="birth_g" value="<?php echo $birth_g; ?>" />
											<input type="hidden" name="zip" value="<?php echo $zip; ?>" />
											<input type="hidden" name="addr" value="<?php echo $addr; ?>" />
											<input type="hidden" name="station1" value="<?php echo $station1; ?>" />
											<input type="hidden" name="company" value="<?php echo $company; ?>" />
											<input type="hidden" name="station2" value="<?php echo $station2; ?>" />
											<input type="hidden" name="tel" value="<?php echo $tel; ?>" />
											<input type="hidden" name="email" value="<?php echo $email; ?>" />
											<input type="hidden" name="email1" value="<?php echo $email; ?>" />
											<input type="hidden" name="job" value="<?php echo $job; ?>" />
											<input type="hidden" name="eye1" value="<?php echo $eye1; ?>" />
											<input type="hidden" name="eye2_1" value="<?php echo $eye2_1; ?>" />
											<input type="hidden" name="eye2_2" value="<?php echo $eye2_2; ?>" />
											<input type="hidden" name="eye3_1" value="<?php echo $eye3_1; ?>" />
											<input type="hidden" name="eye3_2" value="<?php echo $eye3_2; ?>" />
											<input type="hidden" name="eye4_1" value="<?php echo $eye4_1; ?>" />
											<input type="hidden" name="eye4_2" value="<?php echo $eye4_2; ?>" />
											<input type="hidden" name="eye5" value="<?php echo $eye5; ?>" />
											<input type="hidden" name="eye6" value="<?php echo $eye6; ?>" />
											<input type="hidden" name="eye6_3" value="<?php echo $eye6_3; ?>" />
											<input type="hidden" name="comment1" value="<?php echo $comment1; ?>" />
											<input type="hidden" name="comment2" value="<?php echo $comment2; ?>" />
											<input type="hidden" name="conf" value="" />
											<input type="submit" name="submit" value="入力し直す"/>
										</td>
									</form>
									<form action="info_monita_applicomp.php" method="post">
										<td align="center" width="50%"><input type="submit" name="submit1" value="モニター応募する"/></td>
									</form>
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

