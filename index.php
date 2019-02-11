<?php
/*
 * 
 * 
 * 
 * 
 * 
 */
require("configure.php");
if (isset($_SESSION["username"]) || $_SESSION["username"] != "") {
    //if user already logged in
    redirect("home.php");
}

$errMSG = "";
if (isset($_POST["mode"]) && $_POST["mode"] == "login") {

    //valiadte uerinput for security checks
    // add addslashes() function to prevent from sql injections
    $uname = trim($_POST["uname"]);
    $pass = trim($_POST["upass"]);
    $rem = trim($_POST["remember_me"]);

    if ($uname == "" || $pass == "") {
        $errMSG = errorMessage("Enter credentials properly!");
    } else {

        // check if username exist 
        $sql = "SELECT * FROM users where username = :uname";
        try {
            $stmt = $DB->prepare($sql);
            $stmt->bindValue(":uname", $uname);
            $stmt->execute();
            $usernameRS = $stmt->fetchAll();
        } catch (Exception $ex) {
            echo errorMessage($ex->getMessage());
        }

        if (count($usernameRS) > 0) {
            // user exist
            $sql = "SELECT * FROM users where username = :uname AND password = :pwd";
            try {
                $stmt = $DB->prepare($sql);
                $stmt->bindValue(":uname", $uname);
                $stmt->bindValue(":pwd", encryptPassword($pass));
                
                $stmt->execute();
                $userRS = $stmt->fetchAll();
            } catch (Exception $ex) {
                echo errorMessage($ex->getMessage());
            }

            if (count($userRS) > 0 ) {
                // user exist 
                // now check if the status of the user
                if ($userRS[0]["status"] == 'Y') {

                    $_SESSION["username"] = $userRS[0]["username"];

                    if ($rem == 1) {
                        // if user select to remember 
                        setcookie("userame", $uname, time() + 7200);
                    } else {
                        setcookie("userame", $uname, time() - 7200);
                    }

                    redirect("home.php");
                } else {
                    // user exist but the status is inactive
                    $errMSG = errorMessage("Sorry!!! But the account is temporary suspended.");
                }
            } else {
                $errMSG = errorMessage("Sorry!!! Either the username of the password mismatch.");
            }
        } else {
            // no user exist with same name
            $errMSG = errorMessage("Sorry!!! No user with such name exist");
        }
    }
}
$userame = (isset($_COOKIE["userame"]) && $_COOKIE["userame"] != "") ? $_COOKIE["userame"] : "";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="http://www.xyz.in/favicon.ico" type="image/x-icon" />
        <title>Secure Login Script - www.xyz.in</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>

    <body>

        <div id="container">
            <div id="body">
                <header>
                    <div class="mainTitle" >Secure Login Script</div>
                </header>
                <article>
                    <div style="text-align:center;">
                        <strong>username:</strong> admin <strong>password:</strong> admin123
                        <br><br>
                        <?php echo $errMSG; ?>
                    </div>
                    <br><br>
                    <form method="post" action="" name="myform">
                        <input type="hidden" value="login" name="mode" />
                        <div class="loginbox">
                            <div class="col_left">Username: </div><div class="col_right"><input type="text" name="uname" value="<?php echo $userame; ?>" autocomplete="off" class="inputbox" required /></div>
                            <div class="height10"></div>
                            <div class="col_left">Password: </div><div class="col_right"><input type="password" name="upass" value="" class="inputbox" required /></div>
                            <div class="height10"></div>
                            <div class="col_left">&nbsp;</div><div class="col_right"><label for="remember_me"><input type="checkbox" value="1" name="remember_me" <?php echo ($userame != "") ? 'checked' : ''; ?>> Remember me </label> </div>
                            <div class="height10"></div>
                            <div class="col_left">&nbsp;</div><div class="col_right"><input type="submit" name="sub" value="" class="submitButton" /> </div>
                            <div class="height10"></div>
                        </div>

                    </form>
                </article>
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