<?php
session_start();
require_once("../config.php");
function anti_injection($string) {
	$data = stripslashes(strip_tags(htmlentities(htmlspecialchars($string, ENT_QUOTES))));

	return $data;
}
$username = anti_injection(mysql_real_escape_string($_POST['username']));
$pw_admin = anti_injection(mysql_real_escape_string($_POST['password']));
$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response']:'';
$secret_key = '6Lc9pg8UAAAAAGitp_JAO1KbEjtqkNgvVHYoiU2Z';
$cekuser = mysql_query("SELECT username,password from administrator WHERE username = '$username'");
$hasil = mysql_fetch_array($cekuser);
if($hasil['password'] == $pw_admin) {

    $_SESSION['username'] = $hasil['username'];
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $captcha;
    $recaptcha = file_get_contents($url);
    $data = json_decode($recaptcha);
    if(!empty($_POST["remember"])) {
				setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
				if(isset($_COOKIE["member_password"])) {
					setcookie ("member_password","");
				}
			}
      if($data->success == true){
        echo "login berhasil";
        //header('location:index.php');
      }
      else{
        ?>
        <script type="text/javascript">
            alert("Captchanya juga mohon di isi");
            document.location="index.php";
        </script>
        <?php
      }
} else {
    ?>
    <script type="text/javascript">
        alert("Login Gagal");
        //document.location="index.php";
    </script>
<?php
session_destroy();
}
?>
