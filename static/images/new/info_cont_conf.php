<?php
	session_start();
 
	if(empty($_SESSION["name"])){
		$login_url ="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["SCRIPT_NAME"]) . "/info_cont.php";
		header("Location:{$login_url}");
		exit;
	}

	$name		= $_SESSION["name"];
	$kana		= $_SESSION["kana"];
	$sex		= $_SESSION["sex"];
	$birth_g	= $_SESSION["birth_g"];
	$zip		= $_SESSION["zip"];
	$addr		= $_SESSION["addr"];
	$tel		= $_SESSION["tel"];
	$email		= $_SESSION["email"];
	$comment	= $_SESSION["comment"];

	if($sex == 1){
		$sex1 = "男性";
	}else{
		$sex1 = "女性";
	}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--<meta name="keywords" content="オルソケラトロジー,オルソ,オルソケーレンズ,近視,近視屈折矯正,眼科,LASIK">
<meta name="description" content="このサイトは近視屈折矯正法オルソケラトロジーについての最新情報をお届けすることを目的としています。"> --> 
<title>お問い合わせ｜オルソケラトロジー情報館</title>
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
		<script>
function pop_1() {
  window.open("http://www.oklens.co.jp/new/pop.html", "", "width=315, height=210, scrollbars=yes, left=20, top=20");
}
 </script>





<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="97" align="center" background="image/main/main_top_bg.jpg">
			<table width="836" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="538"><a href="http://www.oklens.co.jp/new/ortho.php"><img src="image/main/main_toploge.jpg" border="0"></a></td>
                <td width="298" align="right" valign="top"><a href="http://www.oklens.co.jp/new/patient_ortho.php"><img src="image/info/button_s01.jpg" width="89" height="28" hspace="2" border="0"></a><a href="#"><img src="image/info/button_s02.jpg" width="130" height="28" border="0" onClick="pop_1()"></a></td>
              </tr>
            </table>
			</td>
          </tr>
          <tr>
            <td height="30" align="center" valign="top" background="image/info/main_topmeunbg01.jpg" style=" padding-top:3">
			  <table width="836" border="0" cellspacing="0" cellpadding="0">
              <tr align="center">
                <td width="187"><a href="http://www.oklens.co.jp/new/info_ortho.php"><img src="image/main/main_topmeuntitle01.jpg" width="119" height="24" border="0"></a></td>
                <td width="117"><a href="http://www.oklens.co.jp/new/info_sitemap.php"><img src="image/main/main_topmeuntitle02.jpg" width="68" height="24" border="0"></a></td>
                <td width="109"><a href="http://www.oklens.co.jp/new/info_link.php"><img src="image/main/main_topmeuntitle03.jpg" width="32" height="24" border="0"></a></td>
                <td width="149"><a href="http://www.oklens.co.jp/new/info_cont.php"><img src="image/main/main_topmeuntitle04.jpg" width="79" height="24" border="0"></a></td>
                <!--<td width="130"><a href="http://www.oklens.co.jp/new/info_faq.php"><img src="image/main/main_topmeuntitle05.jpg" width="69" height="24" border="0"></a></td> -->
                <td width="144"><a href="http://www.oklens.co.jp/new/info_monita.php"><img src="image/main/main_topmeuntitle06.jpg" width="75" height="24" border="0"></a></td>
              </tr>
            </table>
			</td>
          </tr>
        </table>	
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
				   <table width="250" border="0" cellspacing="0" cellpadding="0" >
                     <tr align="center">
                       <td class="mf1_txt">HOME</td>
                       <td><img src="image/info/y_dot.gif" width="16" height="9"></td>
                       <td class="mf1_txt">インフォメーション</td>
                       <td><img src="image/info/y_dot.gif" width="16" height="9"></td>
                       <td class="mf1_txt">お問い合わせ</td>
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
                   <td width="611" valign="bottom"><img src="image/info/md_title004.gif" width="209" height="28"></td>
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
               <td align="center" >
			    <table width="852" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td width="241" valign="top">
				      <!--left -->
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
<body onLoad="MM_preloadImages('image/info/mtitle01_over.gif','image/info/mtitle03_over.gif','image/info/mtitle04_over.gif','image/info/mtitle05_over.gif','image/info/mtitle06_over.gif')">

				   <table width="174" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                       <td><img src="image/info/left_title01.gif" width="174" height="32"></td>
                     </tr>
                     <tr>
                       <td>&nbsp;</td>
                     </tr>
                     <tr>
                       <td align="center">
					   <table width="165" border="0" cellspacing="0" cellpadding="0">
                         <tr>
                           <td><img src="image/info/dot_m.gif" width="6" height="2" align="absmiddle"><a href="http://www.oklens.co.jp/new/info_ortho.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image19','','image/info/mtitle01_over.gif',1)"><img src="image/info/mtitle01.gif" name="Image19"width="112" height="13" border="0"></a></td>
                         </tr>
						  <tr>
                           <td>&nbsp;</td>
                         </tr>
                         <tr>
                           <td><img src="image/info/dot_m.gif" width="6" height="2" align="absmiddle"><a href="http://www.oklens.co.jp/new/info_sitemap.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image31','','image/info/mtitle02_over.gif',1)"><img src="image/info/mtitle02.gif" name="Image31" width="109" height="13" border="0" ></a></td>
                         </tr>
						 <tr>
                           <td>&nbsp;</td>
                         </tr>
                         <tr>
                           <td><img src="image/info/dot_m.gif" width="6" height="2" align="absmiddle"><a href="http://www.oklens.co.jp/new/info_link.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image27','','image/info/mtitle03_over.gif',1)"><img src="image/info/mtitle03.gif" name="Image27" width="78" height="13" border="0"></a></td>
                         </tr>
						 <tr>
                           <td>&nbsp;</td>
                         </tr>
                         <tr>
                           <td><img src="image/info/dot_m.gif" width="6" height="2" align="absmiddle"><a href="http://www.oklens.co.jp/new/info_cont.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image28','','image/info/mtitle04_over.gif',1)"><img src="image/info/mtitle04.gif" name="Image28" width="78" height="13" border="0"></a></td>
                         </tr>
						 <tr>
                           <td>&nbsp;</td>
                         </tr>
                         <!--<tr>
                           <td><img src="image/info/dot_m.gif" width="6" height="2" align="absmiddle"><a href="http://www.oklens.co.jp/new/info_faq.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image29','','image/info/mtitle05_over.gif',1)"><img src="image/info/mtitle05.gif" name="Image29" width="78" height="13" border="0"></a></td>
                         </tr>
						 <tr>
                           <td>&nbsp;</td>
                         </tr> -->
                         <tr>
                           <td><img src="image/info/dot_m.gif" width="6" height="2" align="absmiddle"><a href="http://www.oklens.co.jp/new/info_monita.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image30','','image/info/mtitle06_over.gif',1)"><img src="image/info/mtitle06.gif" name="Image30" width="78" height="13" border="0"></a></td>
                         </tr>
						 <tr>
                           <td>&nbsp;</td>
                         </tr>
						  <tr>
                           <td><img src="image/info/dot_m.gif" width="6" height="2" align="absmiddle"><a href="http://www.oklens.co.jp/new/info_new.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image56','','image/info/mtitle07_over.gif',1)"><img src="image/info/mtitle07.gif" name="Image56"  border="0"></a></td>
                         </tr>
						 <tr>
                           <td>&nbsp;</td>
                         </tr>
                       </table>
					   </td>
                     </tr>
                   </table>               <!--left -->					 
			   </td>
                   <td width="611" valign="top">
				   
				   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                     
                     <tr>
                       <td align="center"><img src="image/info/cot_top.jpg"></td>
                     </tr>
                     <tr>
                       <td align="center">
					   <table width="548" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                         
                         <tr>
                           <td valign="top" align="center">
						   
						   <!--------------------------- [form] -------------------------->
                               <form action="info_cont.php" method="POST">
                                 <table width="570" border="0" cellspacing="0" cellpadding="0">
                                   <tr>
                                     <td bgcolor="#e1e1e1">
									 
									 <table width="100%" border="0" cellspacing="1" cellpadding="4">
                                         
                                         <tr>
                                             <td align="right" width="21%" bgcolor="#ededed">お名前</td>
                                             <td width="79%" bgcolor="#FFFFFF" style=" padding:5"><?php echo $name; ?></td>
                                           </tr>
                                           <tr>
                                             <td align="right" width="21%" bgcolor="#ededed">ふりがな</td>
                                             <td width="79%" bgcolor="#FFFFFF" style=" padding:5"><?php echo $kana; ?></td>
                                           </tr>
										  <tr>
                                             <td width="21%" align="right" bgcolor="#ededed">性別<font color="#CCFF99">-</font></td>
                                             <td width="79%" bgcolor="#FFFFFF" style=" padding:5"><?php echo $sex1; ?></td>
                                           </tr>
										 <tr>
                                             <td width="21%" align="right" bgcolor="#ededed">年齢</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo $birth_g; ?>才</td>
                                           </tr>
                                         <tr>
                                             <td width="21%" align="right" bgcolor="#ededed">ご住所<font color="#CCFF99">-</font></td>
                                             <td width="79%" bgcolor="#FFFFFF" style=" padding:5">
											 〒<?php echo $zip; ?><br>
                                               <?php echo $addr; ?></td>
                                           </tr>
                                         <tr>
                                             <td align="right" width="21%" bgcolor="#ededed">電話番号<br>（日中連絡先）<font color="#CCFF99">-</font></td>
                                             <td width="79%" bgcolor="#FFFFFF" style=" padding:5"><?php echo $tel; ?></td>
                                           </tr>
                                         <tr>
                                             <td align="right" width="21%" bgcolor="#ededed">E-mail<font color="#CCFF99">-</font></td>
                                             <td width="79%" bgcolor="#FFFFFF"style=" padding:5"><?php echo $email; ?></td>
                                           </tr>
                                         <tr>
                                             <td width="21%" align="right" bgcolor="#ededed">お問い合わせ内容</td>
                                             <td bgcolor="#FFFFFF" style=" padding:5"><?php echo $comment; ?></td>
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
									 <form action="info_cont.php" method="post">
										<td align="center" width="50%">
											<input type="hidden" name="name" value="<?php echo $name; ?>" />
											<input type="hidden" name="kana" value="<?php echo $kana; ?>" />
											<input type="hidden" name="sex" value="<?php echo $sex; ?>" />
											<input type="hidden" name="birth_g" value="<?php echo $birth_g; ?>" />
											<input type="hidden" name="zip" value="<?php echo $zip; ?>" />
											<input type="hidden" name="addr" value="<?php echo $addr; ?>" />
											<input type="hidden" name="tel" value="<?php echo $tel; ?>" />
											<input type="hidden" name="email" value="<?php echo $email; ?>" />
											<input type="hidden" name="email1" value="<?php echo $email; ?>" />
											<input type="hidden" name="comment" value="<?php echo $comment; ?>" />
											<input type="hidden" name="conf" value="" />
											<input type="submit" name="submit" value="入力し直す"/>
										</td>
									</form>
									<form action="info_cont_comp.php" method="post">
										<td align="center" width="50%"><input type="submit" name="submit1" value="問い合わせる"/></td>
									</form>
									 </tr>
                                   </table>				   
								  </td>
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
				   
				   <!--body -->
			 
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
	<table width="923" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="100" align="right" valign="top"><img src="image/main/main_topmeunfoot.jpg" width="473" height="44" vspace="10"></td>
          </tr>
        </table> 
					
					
							<!--foot--> 
		</td>
      </tr>
    </table>
	</td>
  </tr>
</table>
</body>
</html>

