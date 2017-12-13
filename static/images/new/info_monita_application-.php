<?php
	error_reporting(-1);
	session_start();

	//変数初期化
	$name = "";
	$kana = "";
	$sex = "";
	$marriage = "";
	$birth_y = "";
	$birth_m = "";
	$birth_d = "";
	$birth_g = "";
	$station1 = "";
	$company = "";
	$station2 = "";
	$tel = "";
	$email_a = "";
	$email_b= "";
	$job = "";
	$eye1 = "";
	$eye2_1 = "";
	$eye2_2 = "";
	$eye3_1 = "";
	$eye3_2 = "";
	$lasik = "";
	$eye4_1 = "";
	$eye4_2 = "";
	$eye5 = "";
	$eye6 = "";
	$eye6_3 = "";
	$comment1 = "";
	$comment2 = "";

	$sex1 = "checked";
	$sex2 = ""; 
	$marriage1 = "checked";
	$marriage2 = "";
	$lasik1 = "checked";
	$lasik2 = "";
	$eye5_1 = "checked";
	$eye5_2 = "";
	$eye6_1 = "checked";
	$eye6_2 = "";

	// 住所変換
	if(isset($_POST["zip_change"])) {
		
		$zip = $_POST["zip"];
		$zip = str_replace("-","",$zip);
		
		// DB
		$host = "mysql502.in-plus.jp";
		$user = "u1012095_user001";
		$pass = "techpass001";

		$con = mysql_connect($host, $user, $pass);
/*		if(!$con){
			die('DB_ERROR1: ' . mysql_error());
		}
*/
		$db_select = mysql_select_db('db1012095_tech',$con);
/*		if(!$db_select){
			die('DB_ERROR2: ' . mysql_error());
		}
*/
		$zip_ = m($zip);
		$sql = mysql_query('SELECT pref,city,town FROM zip WHERE zip = ' . $zip_ ,$con);

		while($data = mysql_fetch_array($sql)){
			// DB文字コードUTF-8→SHIFT-JIS変換
			$pref = mb_convert_encoding($data["pref"],"SHIFT-JIS","UTF-8");
			$city = mb_convert_encoding($data["city"],"SHIFT-JIS","UTF-8");
			$town = mb_convert_encoding($data["town"],"SHIFT-JIS","UTF-8");
		}

		$addr = $pref.$city.$town;

		$name = $_POST["name"];
		$kana = $_POST["kana"];
		$sex = $_POST["sex"];
		$marriage = $_POST["marriage"];
		$birth_y = $_POST["birth_y"];
		$birth_m = $_POST["birth_m"];
		$birth_d = $_POST["birth_d"];
		$birth_g = $_POST["birth_g"];
		$station1 = $_POST["station1"];
		$company = $_POST["company"];
		$station2 = $_POST["station2"];
		$tel = $_POST["tel"];
		$email_a = $_POST["email"];
		$email_b= $_POST["email1"];
		$job = $_POST["job"];
		$eye1 = $_POST["eye1"];
		$eye2_1 = $_POST["eye2_1"];
		$eye2_2 = $_POST["eye2_2"];
		$eye3_1 = $_POST["eye3_1"];
		$eye3_2 = $_POST["eye3_2"];
		$lasik = $_POST["lasik"];
		$eye4_1 = $_POST["eye4_1"];
		$eye4_2 = $_POST["eye4_2"];
		$eye5 = $_POST["eye5"];
		$eye6 = $_POST["eye6"];
		$eye6_3 = $_POST["eye6_3"];
		$comment1 = $_POST["comment1"];
		$comment2 = $_POST["comment2"];
	}

	// 入力確認
	if(isset($_POST["submit"])){

		$name = $_POST["name"];
		$kana = $_POST["kana"];
		$sex = $_POST["sex"];
		$marriage = $_POST["marriage"];
		$birth_y = $_POST["birth_y"];
		$birth_m = $_POST["birth_m"];
		$birth_d = $_POST["birth_d"];
		$birth_g = $_POST["birth_g"];
		$station1 = $_POST["station1"];
		$company = $_POST["company"];
		$station2 = $_POST["station2"];
		$tel = $_POST["tel"];
		$email_a = $_POST["email"];
		$email_b= $_POST["email1"];
		$job = $_POST["job"];
		$eye1 = $_POST["eye1"];
		$eye2_1 = $_POST["eye2_1"];
		$eye2_2 = $_POST["eye2_2"];
		$eye3_1 = $_POST["eye3_1"];
		$eye3_2 = $_POST["eye3_2"];
		$lasik = $_POST["lasik"];
		$eye4_1 = $_POST["eye4_1"];
		$eye4_2 = $_POST["eye4_2"];
		$eye5 = $_POST["eye5"];
		$eye6 = $_POST["eye6"];
		$eye6_3 = $_POST["eye6_3"];
		$comment1 = $_POST["comment1"];
		$comment2 = $_POST["comment2"];

		//エラーチェック
		$err = array();

		if(empty($name)){
			$err["name"] = "<br><font color='red'>※お名前を入力して下さい。</font>";
		}elseif(mb_strlen($name, "SHIFT-JIS")>20){
			$err["name"] = "<br><font color='red'>※お名前は20文字以内でお願いします。</font>";
		}

		if(empty($kana)){
			$err["kana"] = "<br><font color='red'>※ふりがなを入力して下さい。</font>";
		}elseif(mb_strlen($name, "SHIFT-JIS")>30){
			$err["kana"] = "<br><font color='red'>※ふりがなは30文字以内でお願いします。</font>";
		}

		if($sex == "1"){
			$sex1 = "checked";
			$sex2 = "";
		}elseif($sex == "2"){
			$sex1 = "";
			$sex2 = "checked";
		}else{
			exit();
		}

		if($marriage == "1"){
			$marriage1 = "checked";
			$marriage2 = "";
		}elseif($marriage == "2"){
			$marriage1 = "";
			$marriage2 = "checked";
		}else{
			exit();
		}	

		date_default_timezone_set('Asia/Tokyo');
		if(empty($birth_y)){
			$err["birth_y"] = "<br><font color='red'>※生年月日(西暦)を入力して下さい。</font>";
		}elseif(!is_numeric($birth_y) || !mb_strlen($birth_y, "SHIFT-JIS") == 4){
			$err["birth_y"] = "<br><font color='red'>※生年月日(西暦)は数字4ケタを入力して下さい。</font>";
		}elseif($birth_y < "1900" || $birth_y > date("Y")){
			$err["birth_y"] = "<br><font color='red'>※正しい生年月日(西暦)を入力して下さい。</font>";
		}elseif( $birth_m == "0" ){
			$err["birth_md"] = "<br /><font color='red'>※生年月日(月)を選択して下さい。</font>";
		}elseif($birth_m >12 || !is_numeric($birth_m)){
			$err["birth_md"] = "<br /><font color='red'>※正しい生年月日(月)を選択して下さい。</font>";
		}elseif( $birth_d == "0" ){
			$err["birth_md"] = "<br /><font color='red'>※生年月日(日)を選択して下さい。</font>";
		}elseif($birth_m >31 || !is_numeric($birth_m)){
			$err["birth_md"] = "<br /><font color='red'>※正しい生年月日(日)を選択して下さい。</font>";
		}

		if(empty($birth_g)){
			$err["birth_g"] = "<br /><font color='red'>※年齢を入力して下さい。</font>";
		}elseif($birth_g >200 || !is_numeric($birth_g)){
			$err["birth_g"] = "<br /><font color='red'>※正しい年齢を入力してください。</font>";
		}
//////////////////////////////////
		if(empty($zip)){
			$err["zip"] = "<br /><font color='red'>※郵便番号を入力してください。</font>";
		}else(){
			$err_zip = "<br /><font color='red'>※郵便番号を入力してください。</font>";
		}

		if(!empty($_POST["addr"])){
			$addr = htmlspecialchars($_POST["addr"],ENT_QUOTES);
			$_SESSION["addr"] = $addr;
		}else{
			$err_addr = "<br /><font color='red'>※ご住所を入力してください。</font>";
		}

		if(!empty($_POST["station1"])){
			$station1 = htmlspecialchars($_POST["station1"],ENT_QUOTES);
			$_SESSION["station1"] = $station1;
		}else{
			$err_station1 = "<br /><font color='red'>※自宅最寄駅を入力してください。</font>";
		}

		if(!empty($_POST["company"])){
			$company = htmlspecialchars($_POST["company"],ENT_QUOTES);
			$_SESSION["company"] = $company;
		}

		if(!empty($_POST["station2"])){
			$station2 = htmlspecialchars($_POST["station2"],ENT_QUOTES);
			$_SESSION["station2"] = $station2;
		}

		if(!empty($_POST["tel"])){
			$tel = htmlspecialchars($_POST["tel"],ENT_QUOTES);
			$_SESSION["tel"] = $tel;
		}else{
			$err_tel = "<br /><font color='red'>※電話番号を入力してください。</font>";
		}

		if(empty($_POST["email"])){
			$err_email = "<br /><font color='red'>※E-mailを入力してください。</font>";	
		}else{
			$email_a = htmlspecialchars($_POST["email"],ENT_QUOTES);
		}

		if(empty($_POST["email1"])){
			$err_email1 = "<br /><font color='red'>※E-mailを再入力してください。</font>";	
		}else{
			$email_b = htmlspecialchars($_POST["email1"],ENT_QUOTES);
		}
		
		if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST["email"])) {
			$email_a = htmlspecialchars($_POST["email"],ENT_QUOTES);
			$email_ok = htmlspecialchars($_POST["email"],ENT_QUOTES);
		}else{
			$err_email = "<br /><font color='red'>※正しいメールアドレスを入力してください。</font>";	
		}

		if(($_POST["email"]) == ($_POST["email1"])){
			if(!empty($email_ok)){
				$email = htmlspecialchars($_POST["email"],ENT_QUOTES);
				$_SESSION["email"] = $email;
				$email_a = htmlspecialchars($_POST["email"],ENT_QUOTES);
				$email_b = htmlspecialchars($_POST["email1"],ENT_QUOTES);
			}
		}else{
			$err_email2 = "<br /><font color='red'>※同一のE-mailを入力してください。</font>";
			$email_a = htmlspecialchars($_POST["email"],ENT_QUOTES);
			$email_b = htmlspecialchars($_POST["email1"],ENT_QUOTES);
		}
	
		if( $_POST["job"] == 0 ){
			$err_job = "<br /><font color='red'>※ご職業を選択してください。</font>";
		}else{
			$job = htmlspecialchars($_POST["job"],ENT_QUOTES);
			$_SESSION["job"] = $job;
		}

		if(!empty($_POST["eye1"])){
			$eye1 = htmlspecialchars($_POST["eye1"],ENT_QUOTES);
			$_SESSION["eye1"] = $eye1;
		}else{
			$err_eye1 = "<br /><font color='red'>※お使いの矯正器具を入力してください。</font>";
		}

		if( $_POST["eye2_1"] == 0 ){
			$err_eye2 = "<br /><font color='red'>※裸眼視力を選択してください。</font>";
		}else{
			$eye2_1 = htmlspecialchars($_POST["eye2_1"],ENT_QUOTES);
			$_SESSION["eye2_1"] = $eye2_1;
		}

		if( $_POST["eye2_2"] == 0 ){
			$err_eye2 = "<br /><font color='red'>※裸眼視力を選択してください。</font>";
		}else{
			$eye2_2 = htmlspecialchars($_POST["eye2_2"],ENT_QUOTES);
			$_SESSION["eye2_2"] = $eye2_2;
		}

		if( $_POST["eye3_1"] == 0 ){
			$err_eye3 = "<br /><font color='red'>※近視度数を選択してください。</font>";
		}else{
			$eye3_1 = htmlspecialchars($_POST["eye3_1"],ENT_QUOTES);
			$_SESSION["eye3_1"] = $eye3_1;
		}

		if( $_POST["eye3_2"] == 0 ){
			$err_eye3 = "<br /><font color='red'>※近視度数を選択してください。</font>";
		}else{
			$eye3_2 = htmlspecialchars($_POST["eye3_2"],ENT_QUOTES);
			$_SESSION["eye3_2"] = $eye3_2;
		}

		if(!empty($_POST["lasik"]) && $_POST["lasik"] == 1){
			$lasik1 = "checked";
			$lasik2 = "";
			$lasik = htmlspecialchars($_POST["lasik"],ENT_QUOTES);
			$_SESSION["lasik"] = $lasik;
		}elseif(!empty($_POST["lasik"]) && $_POST["lasik"] == 2){
			$lasik1 = "";
			$lasik2 = "checked";
			$lasik = htmlspecialchars($_POST["lasik"],ENT_QUOTES);
			$_SESSION["lasik"] = $lasik;
		}

		if( $_POST["eye4_1"] == 0 ){
			$err_eye4 = "<br /><font color='red'>※乱視の有無を選択してください。</font>";
		}else{
			$eye4_1 = htmlspecialchars($_POST["eye4_1"],ENT_QUOTES);
			$_SESSION["eye4_1"] = $eye4_1;
		}

		if( $_POST["eye4_2"] == 0 ){
			$err_eye4 = "<br /><font color='red'>※乱視の有無を選択してください。</font>";
		}else{
			$eye4_2 = htmlspecialchars($_POST["eye4_2"],ENT_QUOTES);
			$_SESSION["eye4_2"] = $eye4_2;
		}

		if(!empty($_POST["eye5"]) && $_POST["eye5"] == 1){
			$eye5_1 = "checked";
			$eye5_2 = "";
			$eye5 = htmlspecialchars($_POST["eye5"],ENT_QUOTES);
			$_SESSION["eye5"] = $eye5;
		}elseif(!empty($_POST["eye5"]) && $_POST["eye5"] == 2){
			$eye5_1 = "";
			$eye5_2 = "checked";
			$eye5 = htmlspecialchars($_POST["eye5"],ENT_QUOTES);
			$_SESSION["eye5"] = $eye5;
		}

		if(!empty($_POST["eye6"]) && $_POST["eye6"] == 1){
			$eye6_1 = "checked";
			$eye6_2 = "";
			$eye6 = htmlspecialchars($_POST["eye6"],ENT_QUOTES);
			$_SESSION["eye6"] = $eye6;
		}elseif(!empty($_POST["eye6"]) && $_POST["eye6"] == 2){
			$eye6_1 = "";
			$eye6_2 = "checked";
			$eye6 = htmlspecialchars($_POST["eye6"],ENT_QUOTES);
			$_SESSION["eye6"] = $eye6;
		}

		if(!empty($_POST["eye6_3"])){
			$eye6_3 = htmlspecialchars($_POST["eye6_3"],ENT_QUOTES);
			$_SESSION["eye6_3"] = $eye6_3;
		}

		if(!empty($_POST["comment1"])){
			$comment1 = htmlspecialchars($_POST["comment1"],ENT_QUOTES);
			$_SESSION["comment1"] = $comment1;
		}else{
			$err_comment1 = "<br /><font color='red'>※入力してください。</font>";
		}

		if(!empty($_POST["comment2"])){
			$comment2 = htmlspecialchars($_POST["comment2"],ENT_QUOTES);
			$_SESSION["comment2"] = $comment2;
		}

		if(	!empty($name)		&&
			!empty($kana)		&&
			!empty($sex)		&&
			!empty($marriage)	&&
			!empty($birth_y)	&&
			!empty($birth_m)	&&
			!empty($birth_d)	&&
			!empty($birth_g)	&&
			!empty($zip)		&&
			!empty($addr)		&&
			!empty($station1)	&&
			!empty($tel)		&&
			!empty($email)		&&
			!empty($job)		&&
			!empty($eye1)		&&
			!empty($eye2_1)		&&
			!empty($eye2_2)		&&
			!empty($eye3_2)		&&
			!empty($eye3_2)		&&
			!empty($eye4_1)		&&
			!empty($eye4_2)		&&
			!empty($eye5)		&&
			!empty($eye6)		&&
			!empty($comment1)	&&
			!isset($_POST["conf"]) )
		{
		$login_url ="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]) . "/info_monita_appliconf.php";
		header("Location:{$login_url}");
		exit;
		}
	}

	function h($str) {
		return htmlspecialchars($str,ENT_QUOTES);
	}
	function m($str) {
		return mysql_real_escape_string($str);	
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
							 <!--------------------------- [form] -------------------------->
                                 <form action="" method="POST">
                                   <table width="570" border="0" cellspacing="0" cellpadding="0">
                                     <tr>
                                       <td bgcolor="#e1e1e1"><table width="100%" border="0" cellspacing="1" cellpadding="4">
                                           <tr>
                                             <td align="right" width="25%" bgcolor="#ededed">お名前<font color="red">*</font></td>
                                             <td width="75%" bgcolor="#FFFFFF" style=" padding:5">
												<input name="name" type="text" class="input_01" size="35" style="ime-mode:active" value="<?php echo $name; ?>"><?php echo @$err["name"]; ?></td>
                                           </tr>
                                           <tr>
                                             <td align="right" width="25%" bgcolor="#ededed">ふりがな<font color="red">*</font></td>
                                             <td width="75%" bgcolor="#FFFFFF" style=" padding:5">
												<input name="kana" type="text" class="input_01" size="35" style="ime-mode:active" value="<?php echo $kana; ?>"><?php echo @$err["kana"]; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">
												性別<font color="red">*</font></td>
                                             <td width="75%" bgcolor="#FFFFFF" style=" padding:5">
												男性
												  <label><input name="sex" type="radio" value="1" <?php echo $sex1; ?> /></label>　
												女性<label><input name="sex" type="radio" value="2" <?php echo $sex2; ?> /></label></td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">生年月日<font color="red">*</font></td>
                                             <td bgcolor="#FFFFFF" style=" padding:5">
												西暦<input name="birth_y" type="text" size="4" maxlength="4"  class="fieldid" style="ime-mode:disabled" value="<?php echo $birth_y; ?>" />年
													<select name="birth_m" class="fieldid">
														<option value="0">▼選択</option>
														<?php
															for($i=1; $i<=12; $i++){
																if(isset($birth_m) && $i == $birth_m){
																	echo "<option value='{$i}' selected>{$i}</option>";
																}else{
																	echo "<option value='{$i}'>{$i}</option>";
																}
															}
														
														?>
													</select>月
													<select name="birth_d" class="fieldid">
														<option value="0">▼選択</option>
														<?php
															for($p=1; $p<=31; $p++){
																if(isset($birth_d) && $p == $birth_d){
																	echo "<option value='{$p}' selected>{$p}</option>";
																}else{
																	echo "<option value='{$p}'>{$p}</option>";
																}
															}
														?>
													</select>日
													<?php echo @$err["birth_y"].@$err["birth_md"]; ?>
											 </td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">年齢<font color="red">*</font></td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><input name="birth_g" type="text" size="4" maxlength="3"  class="fieldid" style="ime-mode:disabled" value="<?php echo $birth_g; ?>" />才<?php echo @$err["birth_g"]; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">ご住所<font color="red">*</font></td>
                                             <td width="75%" bgcolor="#FFFFFF" style=" padding:5">
											 〒
											   <input name="zip" type="text" class="input_01" size="10" style="ime-mode:disabled" value="<?php echo @$zip; ?>">
                                               （例 : 1000005）<font class="up_txt">半角英数字</font>
											   <input type="submit" name="zip_change" value="住所変換">
											   <?php echo @$err_zip; ?><br>
                                               <input name="addr" type="text" class="input_01" size="65" style="ime-mode:active" value="<?php echo @$addr; ?>">
                                               <br />
                                               (例 : 東京都千代田区丸の内1-2-3)<?php echo @$err_addr; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">自宅最寄駅<font color="red">*</font></td>
                                             <td bgcolor="#FFFFFF" style=" padding:5">
											 <input name="station1" type="text" class="input_01" size="35" style="ime-mode:active" value="<?php echo @$station1; ?>">(例 : JR東京駅)<?php echo @$err_station1; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">通勤・通学先</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><input name="company" type="text" class="input_01" size="35" style="ime-mode:active" value="<?php echo @$company; ?>">(例 : 株式会社＊＊＊＊)<?php echo @$err_company; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">通勤・通学先最寄駅</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><input name="station2" type="text" class="input_01" size="35" style="ime-mode:active" value="<?php echo @$station2; ?>">(例 : 東京メトロ日比谷線六本木駅)<?php echo @$err_station2; ?></td>
                                           </tr>
                                           <tr>
                                             <td align="right" width="25%" bgcolor="#ededed">電話番号<font color="red">*</font><br>
                                               （日中連絡先）<font color="#CCFF99">-</font></td>
                                             <td width="75%" bgcolor="#FFFFFF" style=" padding:5"><input name="tel" type="text" class="input_01" size="35" style="ime-mode:disabled" value="<?php echo @$tel; ?>"><font  class="up_txt">半角英数字</font>
                                                 <br>（例：090-＊＊＊＊-＊＊＊＊)<?php echo @$err_tel; ?></td>
                                           </tr>
                                           <tr>
                                             <td align="right" width="25%" bgcolor="#ededed">E-mail<font color="red">*</font><font color="#CCFF99">-</font></td>
                                             <td width="75%" bgcolor="#FFFFFF"style=" padding:5"><input name="email" type="text" class="input_01" size="35" style="ime-mode:disabled" value="<?php echo @$email_a; ?>"><font  class="up_txt">半角英数字</font><br>※携帯メールアドレスは無効とさせていただきます。<?php echo @$err_email; ?></td>
                                           </tr>
										   <tr>
                                             <td align="right" width="25%" bgcolor="#ededed">E-mail(確認用)<font color="red">*</font><font color="#CCFF99">-</font></td>
                                             <td width="75%" bgcolor="#FFFFFF"style=" padding:5"><input name="email1" type="text" class="input_01" size="35" style="ime-mode:disabled" value="<?php echo @$email_b; ?>"><font  class="up_txt">半角英数字</font><?php echo @$err_email1; ?><?php echo @$err_email2; ?></td>
                                           </tr>
										   <tr>
										    <td width="25%" align="right" bgcolor="#ededed">
												未既婚<font color="red">*</font></td>
										    <td width="75%" bgcolor="#FFFFFF" style=" padding:5">
											配偶者無し<label><input name="marriage" type="radio" value="1" <?php echo @$marriage1; ?> /></label>
											配偶者有り<label><input name="marriage" type="radio" value="2" <?php echo @$marriage2; ?> /></label>　
												</td>
										   </tr>
                                           <tr>
                                             <td align="right" width="25%" bgcolor="#ededed">ご職業<font color="red">*</font></td>
                                             <td width="75%"  bgcolor="#FFFFFF" style=" padding:5">
												<select name="job">
												<option value="0">▼選択してください</option>
												<?php
												
													for($j=1; $j<=15; $j++){

														if($j == 1 && @$job == $j){
															echo "<option value='{$j}' selected>会社員(事務系)</option>";
														}elseif($j == 1 && @$job !== $j){
															echo "<option value='{$j}'>会社員(事務系)</option>";
														}
														if($j == 2 && @$job == $j){
															echo "<option value='{$j}' selected>会社員(技術系)</option>";
														}elseif($j == 2 && @$job !== $j){
															echo "<option value='{$j}'>会社員(技術系)</option>";
														}
														if($j == 3 && @$job == $j){
															echo "<option value='{$j}' selected>会社員(その他)</option>";
														}elseif($j == 3 && @$job !== $j){
															echo "<option value='{$j}'>会社員(その他)</option>";
														}
														if($j == 4 && @$job == $j){
															echo "<option value='{$j}' selected>会社経営・役員</option>";
														}elseif($j == 4 && @$job !== $j){
															echo "<option value='{$j}'>会社経営・役員</option>";
														}
														if($j == 5 && @$job == $j){
															echo "<option value='{$j}' selected>国家公務員</option>";
														}elseif($j == 5 && $job !== $j){
															echo "<option value='{$j}'>国家公務員</option>";
														}
														if($j == 6 && @$job == $j){
															echo "<option value='{$j}' selected>地方公務員</option>";
														}elseif($j == 6 && $job !== $j){
															echo "<option value='{$j}'>地方公務員</option>";
														}
														if($j == 7 && @$job == $j){
															echo "<option value='{$j}' selected>自営業</option>";
														}elseif($j == 7 && @$job !== $j){
															echo "<option value='{$j}'>自営業</option>";
														}
														if($j == 8 && $job == $j){
															echo "<option value='{$j}' selected>自由業</option>";
														}elseif($j == 8 && $job !== $j){
															echo "<option value='{$j}'>自由業</option>";
														}
														if($j == 9 && $job == $j){
															echo "<option value='{$j}' selected>医師・弁護士等の専門職</option>";
														}elseif($j == 9 && $job !== $j){
															echo "<option value='{$j}'>医師・弁護士等の専門職</option>";
														}
														if($j == 10 && $job == $j){
															echo "<option value='{$j}' selected>派遣・契約社員</option>";
														}elseif($j == 10 && $job !== $j){
															echo "<option value='{$j}'>派遣・契約社員</option>";
														}
														if($j == 11 && $job == $j){
															echo "<option value='{$j}' selected>パート・アルバイト</option>";
														}elseif($j == 11 && $job !== $j){
															echo "<option value='{$j}'>パート・アルバイト</option>";
														}
														if($j == 12 && $job == $j){
															echo "<option value='{$j}' selected>専業主婦</option>";
														}elseif($j == 12 && $job !== $j){
															echo "<option value='{$j}'>専業主婦</option>";
														}
														if($j == 13 && $job == $j){
															echo "<option value='{$j}' selected>学生</option>";
														}elseif($j == 13 && $job !== $j){
															echo "<option value='{$j}'>学生</option>";
														}
														if($j == 14 && $job == $j){
															echo "<option value='{$j}' selected>無職</option>";
														}elseif($j == 14 && $job !== $j){
															echo "<option value='{$j}'>無職</option>";
														}
														if($j == 15 && $job == $j){
															echo "<option value='{$j}' selected>その他</option>";
														}elseif($j == 15 && $job !== $j){
															echo "<option value='{$j}'>その他</option>";
														}
													}
												?>
												</select>
												<?php echo @$err_job; ?>
											</td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">
												現在お使いの<br />
												視力矯正器具<font color="red">*</font></td>
                                             <td width="75%" bgcolor="#FFFFFF" style=" padding:5">
												<input name="eye1" type="text" class="input_01" size="65" style="ime-mode:active" value="<?php echo @$eye1; ?>">
												<br>
												(コンタクトレンズの場合は種類をご記入下さい。)<br>
												例1 : ソフトレンズ２週間タイプ+メーカー名+製品名<br>
												例2 : なし(現在メガネ・コンタクト等何も使用していない場合）
												<?php echo @$err_eye1; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">裸眼視力<font color="red">*</font></td>
                                             <td bgcolor="#FFFFFF" style=" padding:5">
												右
												<select name="eye2_1">
												<option value="0">▼選択してください</option>
												<?php
												
												for($k=1; $k<=5; $k++){

													if($k == 1 && $eye2_1 == $k){
															echo "<option value='{$k}' selected>0.1未満</option>";
														}elseif($k == 1 && $eye2_1 !== $k){
															echo "<option value='{$k}'>0.1未満</option>";
														}
														if($k == 2 && $eye2_1 == $k){
															echo "<option value='{$k}' selected>0.1以上0.3未満</option>";
														}elseif($k == 2 && $eye2_1 !== $k){
															echo "<option value='{$k}'>0.1以上0.3未満</option>";
														}
														if($k == 3 && $eye2_1 == $k){
															echo "<option value='{$k}' selected>0.3以上0.7未満</option>";
														}elseif($k == 3 && $eye2_1 !== $k){
															echo "<option value='{$k}'>0.3以上0.7未満</option>";
														}
														if($k == 4 && $eye2_1 == $k){
															echo "<option value='{$k}' selected>0.7以上1.0未満</option>";
														}elseif($k == 4 && $eye2_1 !== $k){
															echo "<option value='{$k}'>0.7以上1.0未満</option>";
														}
														if($k == 5 && $eye2_1 == $k){
															echo "<option value='{$k}' selected>1.0以上</option>";
														}elseif($k == 5 && $eye2_1 !== $k){
															echo "<option value='{$k}'>1.0以上</option>";
														}

												}

												?>
												</select>
												左
												<select name="eye2_2">
												<option value="0">▼選択してください</option>
												<?php
												
												for($h=1; $h<=5; $h++){

													if($h == 1 && $eye2_2 == $h){
															echo "<option value='{$h}' selected>0.1未満</option>";
														}elseif($h == 1 && $eye2_2 !== $h){
															echo "<option value='{$h}'>0.1未満</option>";
														}
														if($h == 2 && $eye2_2 == $h){
															echo "<option value='{$h}' selected>0.1以上0.3未満</option>";
														}elseif($h == 2 && $eye2_2 !== $h){
															echo "<option value='{$h}'>0.1以上0.3未満</option>";
														}
														if($h == 3 && $eye2_2 == $h){
															echo "<option value='{$h}' selected>0.3以上0.7未満</option>";
														}elseif($h == 3 && $eye2_2 !== $h){
															echo "<option value='{$h}'>0.3以上0.7未満</option>";
														}
														if($h == 4 && $eye2_2 == $h){
															echo "<option value='{$h}' selected>0.7以上1.0未満</option>";
														}elseif($h == 4 && $eye2_2 !== $h){
															echo "<option value='{$h}'>0.7以上1.0未満</option>";
														}
														if($h == 5 && $eye2_2 == $h){
															echo "<option value='{$h}' selected>1.0以上</option>";
														}elseif($h == 5 && $eye2_2 !== $h){
															echo "<option value='{$h}'>1.0以上</option>";
														}

												}
												?>
												</select><?php echo @$err_eye2; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">近視度数<font color="red">*</font></td>
                                             <td bgcolor="#FFFFFF" style=" padding:5">
												右
												<select name="eye3_1">
												<option value="0">▼選択してください</option>
												<?php
												
													for($a=1; $a<=7; $a++){

														if($a == 1 && $eye3_1 == $a){
															echo "<option value='{$a}' selected>-7.0D以上</option>";
														}elseif($a == 1 && $eye3_1 !== $a){
															echo "<option value='{$a}'>-7.0D以上</option>";
														}
														if($a == 2 && $eye3_1 == $a){
															echo "<option value='{$a}' selected>-7.0D未満-6.0D以上</option>";
														}elseif($a == 2 && $eye3_1 !== $a){
															echo "<option value='{$a}'>-7.0D未満-6.0D以上</option>";
														}
														if($a == 3 && $eye3_1 == $a){
															echo "<option value='{$a}' selected>-6.0D未満-5.0D以上</option>";
														}elseif($a == 3 && $eye3_1 !== $a){
															echo "<option value='{$a}'>-6.0D未満-5.0D以上</option>";
														}
														if($a == 4 && $eye3_1 == $a){
															echo "<option value='{$a}' selected>-5.0D未満-3.0D以上</option>";
														}elseif($a == 4 && $eye3_1 !== $a){
															echo "<option value='{$a}'>-5.0D未満-3.0D以上</option>";
														}
														if($a == 5 && $eye3_1 == $a){
															echo "<option value='{$a}' selected>-3.0D未満-1.0D以上</option>";
														}elseif($a == 5 && $eye3_1 !== $a){
															echo "<option value='{$a}'>-3.0D未満-1.0D以上</option>";
														}
														if($a == 6 && $eye3_1 == $a){
															echo "<option value='{$a}' selected>-1.0D未満</option>";
														}elseif($a == 6 && $eye3_1 !== $a){
															echo "<option value='{$a}'>-1.0D未満</option>";
														}
														if($a == 7 && $eye3_1 == $a){
															echo "<option value='{$a}' selected>分からない</option>";
														}elseif($a == 7 && $eye3_1 !== $a){
															echo "<option value='{$a}'>分からない</option>";
														}
													}
												?>
												</select>
												左
												<select name="eye3_2">
												<option value="0">▼選択してください</option>
												<?php
												
													for($b=1; $b<=7; $b++){

														if($b == 1 && $eye3_2 == $b){
															echo "<option value='{$b}' selected>-7.0D以上</option>";
														}elseif($b == 1 && $eye3_2 !== $b){
															echo "<option value='{$b}'>-7.0D以上</option>";
														}
														if($b == 2 && $eye3_2 == $b){
															echo "<option value='{$b}' selected>-7.0D未満-6.0D以上</option>";
														}elseif($b == 2 && $eye3_2 !== $b){
															echo "<option value='{$b}'>-7.0D未満-6.0D以上</option>";
														}
														if($b == 3 && $eye3_2 == $b){
															echo "<option value='{$b}' selected>-6.0D未満-5.0D以上</option>";
														}elseif($b == 3 && $eye3_2 !== $b){
															echo "<option value='{$b}'>-6.0D未満-5.0D以上</option>";
														}
														if($b == 4 && $eye3_2 == $b){
															echo "<option value='{$b}' selected>-5.0D未満-3.0D以上</option>";
														}elseif($b == 4 && $eye3_2 !== $b){
															echo "<option value='{$b}'>-5.0D未満-3.0D以上</option>";
														}
														if($b == 5 && $eye3_2 == $b){
															echo "<option value='{$b}' selected>-3.0D未満-1.0D以上</option>";
														}elseif($b == 5 && $eye3_2 !== $b){
															echo "<option value='{$b}'>-3.0D未満-1.0D以上</option>";
														}
														if($b == 6 && $eye3_2 == $b){
															echo "<option value='{$b}' selected>-1.0D未満</option>";
														}elseif($b == 6 && $eye3_2 !== $b){
															echo "<option value='{$b}'>-1.0D未満</option>";
														}
														if($b == 7 && $eye3_2 == $b){
															echo "<option value='{$b}' selected>分からない</option>";
														}elseif($b == 7 && $eye3_2 !== $b){
															echo "<option value='{$b}'>分からない</option>";
														}
													}
												?>
												</select><?php echo @$err_eye3; ?><br>※お分かりにならない場合は現在お使いのコンタクトのパワーでも可</td>
                                           </tr>
										   
										   <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">乱視の有無<font color="red">*</font></td>
                                             <td bgcolor="#FFFFFF" style=" padding:5">
												右
												<select name="eye4_1">
												<option value="0">▼選択してください</option>
												<?php
												
													for($c=1; $c<=3; $c++){

														if($c == 1 && $eye4_1 == $c){
															echo "<option value='{$c}' selected>なし</option>";
														}elseif($c == 1 && $eye4_1 !== $c){
															echo "<option value='{$c}'>なし</option>";
														}
														if($c == 2 && $eye4_1 == $c){
															echo "<option value='{$c}' selected>弱い乱視</option>";
														}elseif($c == 2 && $eye4_1 !== $c){
															echo "<option value='{$c}'>弱い乱視</option>";
														}
														if($c == 3 && $eye4_1 == $c){
															echo "<option value='{$c}' selected>強い乱視</option>";
														}elseif($c == 3 && $eye4_1 !== $c){
															echo "<option value='{$c}'>強い乱視</option>";
														}
													}
												?>
												</select>
												左
												<select name="eye4_2">
												<option value="0">▼選択してください</option>
												<?php
												
													for($d=1; $d<=3; $d++){

														if($d == 1 && $eye4_2 == $d){
															echo "<option value='{$d}' selected>なし</option>";
														}elseif($d == 1 && $eye4_2 !== $d){
															echo "<option value='{$d}'>なし</option>";
														}
														if($d == 2 && $eye4_2 == $d){
															echo "<option value='{$d}' selected>弱い乱視</option>";
														}elseif($d == 2 && $eye4_2 !== $d){
															echo "<option value='{$d}'>弱い乱視</option>";
														}
														if($d == 3 && $eye4_2 == $d){
															echo "<option value='{$d}' selected>強い乱視</option>";
														}elseif($d == 3 && $eye4_2 !== $d){
															echo "<option value='{$d}'>強い乱視</option>";
														}
													}
												?>
												</select><?php echo @$err_eye4; ?></td>
                                           </tr>
										   <tr>
                                             <td width="25%" align="center" bgcolor="#ededed">
												ハードコンタクトレンズ<br>												
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;の装用経験<font color="red">*</font></td>
                                             <td width="75%" bgcolor="#FFFFFF" style=" padding:5">
												無し
												  <input name="eye5" type="radio" value="1" <?php echo @$eye5_1; ?> />
												有り<input name="eye5" type="radio" value="2" <?php echo @$eye5_2; ?> />
											　</td>
                                           </tr>
										   <tr>
										    <td width="25%" align="right" bgcolor="#ededed">
												レーシック等の&nbsp;&nbsp;<BR>
												目に関する外科手術歴<font color="red">*</font></td>
										    <td width="75%" bgcolor="#FFFFFF" style=" padding:5">
												無し
												<label>
													<input name="lasik" type="radio" value="1" <?php echo @$lasik1; ?> />
												</label>
												有り
												<label>
													<input name="lasik" type="radio" value="2" <?php echo @$lasik2; ?> />
												</label>
											</td>
										   </tr>
										   <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">
												眼疾患の有無<font color="red">*</font></td>
                                             <td width="75%" bgcolor="#FFFFFF" style=" padding:5">
												無し
												  <input name="eye6" type="radio" value="1" <?php echo @$eye6_1; ?> />
												有り<input name="eye6" type="radio" value="2" <?php echo @$eye6_2; ?> />(有りの場合、具体的に)<input type="text" class="input_01" name="eye6_3" size="30" style="ime-mode:active" value="<?php echo @$eye6_3; ?>" />
												<?php echo @$err_eye6; ?>
											　</td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">
											 オルソケラトロジーを<br>
											 お知りになったきっかけ<font color="red">*</font></td>
                                             <td bgcolor="#FFFFFF" style=" padding:5">
											 <textarea name="comment1" cols="65" rows="3" class="input_01" style="ime-mode:active"><?php echo @$comment1; ?></textarea>
											 <?php echo @$err_comment1; ?></td>
                                           </tr>
                                           <tr>
                                             <td width="25%" align="right" bgcolor="#ededed">その他ご質問</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><textarea name="comment2" cols="65" rows="3" class="input_01" style="ime-mode:active"><?php echo @$comment2; ?></textarea></td>
                                           </tr>
                                       </table></td>
                                     </tr>
                                   </table>
                                   <table width="570" border="0" cellspacing="0" cellpadding="0">
                                     <tr>
                                       <td align="center"><font color="#FF0000">※必須入力　必要項目にご入力の上、送信下さいますようお願い致します。</font></td>
                                     </tr>
									 <tr>
                                       <td>&nbsp;</td>
                                     </tr>
									 <tr>
										<td align="center"><input type="submit" name="submit" value="内容確認画面へ"/></td>
									 </tr>
                                   </table>
                                 </form></td>
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