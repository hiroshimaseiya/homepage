<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>廣島聖也オフィシャルサイト</title>
	</head>
</html>


<?php
require_once '../Encode.php';

session_start();
if(isset($_POST['name']) === TRUE){ $_SESSION['name'] = $_POST['name'];}
if(isset($_POST['team']) === TRUE){ $_SESSION['team'] = $_POST['team'];}
if(isset($_POST['email']) === TRUE){ $_SESSION['email'] = $_POST['email'];}
if(isset($_POST['memo']) === TRUE){ $_SESSION['memo'] = $_POST['memo'];}

$errors = array();
foreach ($_SESSION as $key => $value){
	if(is_array($value)) {$value = implode('', $value);}
	if(!mb_check_encoding($value)){
		$errors[] = '文字コードに謝りがあります。';
		break;
	}
}

if (trim($_SESSION['name']) === '') {
	$errors[] = '名前を必ず入力してください。';
}
if (mb_strlen($_SESSION['name']) > 30) {
	$errors[] = '名前は30文字以内で入力してください。';
}

if (trim($_SESSION['email']) === '') {
	$errors[] = 'メールアドレスを必ず入力してください。';
}
if (mb_strlen($_SESSION['email']) > 40) {
	$errors[] = 'メールアドレスは40文字以内で入力してください。';
}

if (trim($_SESSION['memo']) === '') {
	$errors[] = 'メッセージは必ず入力してください。';
}
if (mb_strlen($_SESSION['memo']) > 300) {
	$errors[] = 'メッセージは300文字以内で入力してください。';
}

if (count($errors) > 0){
	die(implode('<br />', $errors).
		'<br />[<a href="contact.php">戻る</a>]');
}

// const SUBJECT = 'コンタクトフォーム';
// const = TO = 'dokovic522@gmail.com';

// $headers = <<<HEAD
// From: {$_POST['from']}
// Return-Path: {$_POST['from']}
// Content-Type: text/plain;charset=ISO-2022-JP
// HEAD;
// $body = "■".SUBJECT."■¥n";
// foreach($_SESSION as $key => $value){
// 	if(is_array($value)){ $value = implode(',', $value); }
// 	$body .= "[{$key}] {$value}¥n";
// }
// mb_send_email(TO, SUBJECT, $body, $headers);
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>廣島聖也オフィシャルサイト</title>
		<link rel="stylesheet" type="text/css" href="../stylesheets/contact.css">
	</head>

	<body>
		<header>
			<div class="topimage"><img src="../images/top.JPG"></div>
		</header>
		<article>
			<div class="menu">
				<a href="../index.html" class="textdeco"><h2>HOME</h2></a>
				<a href="news.html" class="textdeco"><h2>NEWS</h2></a>
				<a href="blog.html" class="textdeco"><h2>BLOG</h2></a>
				<a href="gallery.html" class="textdeco"><h2>GALLERY</h2></a>
				<a href="about.html" class="textdeco"><h2>ABOUT</h2></a>
				<a href="contact.php" class="textdeco"><h2>CONTACT</h2></a>
			</div>
			<div class="sponsers">
				<h3>SPONSERS</h3>
				<a href="http://www.grkk.co.jp"><img src="../images/grkk.png"></a>
				<a href="http://www.descente.co.jp"><img src="../images/descente.png"></a>
				<a href="http://applerind.jp/"><img src="../images/applerind.png"></a>
				<a href="http://www.uvex-sports.jp"><img src="../images/uvex.jpg"></a>
				<a href="http://www.uvex-sports.jp/leki_top"><img src="../images/leki.jpg"></a>
			</div>
			<div class="main">
				<h3>Contact</h3>
				<h4>コンタクトが送信されました。</h4>
				<dl>
				<dt>お名前：</dt>
				<dd><?php print(e($_POST['name'])); ?></dd>
				<dt>所属：</dt>
				<dd><?php print(e($_POST['team'])); ?></dd>
				<dt>メールアドレス：</dt>
				<dd><?php print(e($_POST['email'])); ?></dd>
				<dt>メッセージ：</dt>
				<dd><?php print(nl2br(e($_POST['memo']))); ?></dd>
				</dl>
				<?php session_unset(); ?>
			</div>
		</article>
		<footer>
			<div class="copylight">© 2015 Hiroshima Seiya Official Site</div>
		</footer>
	</body>
</html>