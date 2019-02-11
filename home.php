<?php
/*
 * 
 * 
 * 
 * 
 * 
 */

require("configure.php");
if (!isset($_SESSION["username"]) || $_SESSION["username"] == "" ){
	redirect("index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="http://www.xyz.in/favicon.ico" type="image/x-icon" />
<title>Secure Login Script - xyz</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

<div id="container">
<div id="body">
    <header>
        <div class="mainTitle" >Secure Login Script :: Welcome</div>
    </header>
    <article>
        <div style="text-align:center;">
            <?php echo successMessage ("Successfully logged in by verified user."); ?>
             <br><br>
            <a href="logout.php"><img src="logout.png" alt="logout" width="103" height="39" border="0" /></a>
        </div>
    </article>
     <div class="height10"></div>
    <div style="margin:10px 0;width:100%;float: left;">
	<div style="width:35%;float: left;margin:0 auto;text-align: center;">
		<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FThesoftwareguy7&amp;width&amp;height=360&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=198210627014732" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:360px;" allowTransparency="true"></iframe>
	</div>
	<div style="width:35%;float: left;margin:0 auto;text-align: center;">
		<!-- Place this tag where you want the widget to render. -->
		<div class="g-person" data-href="https://plus.google.com/116523474604785207782"  data-rel="author" data-layout="potrait"></div>

		<!-- Place this tag after the last widget tag. -->
		<script type="text/javascript">
			(function() {
				var po = document.createElement('script');
				po.type = 'text/javascript';
				po.async = true;
				po.src = 'https://apis.google.com/js/platform.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(po, s);
			})();
		</script>
	</div>
	<div style="width:30%;float: left;margin:0 auto;text-align: center;">
		<a class="twitter-follow-button"
		href="https://twitter.com/xyz7"
		data-show-count="true" 
		data-lang="en" data-size="large" >
		Follow 
		</a>
		<script type="text/javascript">
		window.twttr = (function (d, s, id) {
		var t, js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src= "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);
		return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
		}(document, "script", "twitter-wjs"));
		</script>
	</div>
</div>
     <div class="height10"></div>
   <footer>
        <div class="copyright">
        &copy; 2013 <a href="http://www.xyz.in" target="_blank">xyz</a>. All rights reserved
        </div>
        <div class="footerlogo"><a href="http://www.xyz.in" target="_blank"><img src="http://www.xyz.in/xyz-logo-small.png	" width="200" height="47" alt="xyz logo" /></a> </div>
   </footer>
</div></div>

</body>
</html>