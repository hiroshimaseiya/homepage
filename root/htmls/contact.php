<?php
require_once '../Encode.php';
session_start();
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
			<div class="topimage"><img src="../images/top2.JPG"></div>
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
				<form method="POST" action="request.php">
					<div class="container">
						<label for="name">お名前：</label><br />
						<input type="text" id="name" name="name"
							value="<?php print($defs['name']); ?>" />
					</div>
					<div class="container">
						<label for="team">所属：</label><br />
						<input type="team" id="team" name="team"
							value="<?php print($defs['team']); ?>" />
					</div>
					<div class="container">
						<label for="email">メールアドレス：</label><br />
						<input type="email" id="email" name="email"
							value="<?php print($defs['email']); ?>" />
					</div>
					<div class="container">
						<label for="memo">メッセージ：</label><br />
						<textarea rows="10" cols="60" id="memo" name="memo">
							<?php print($defs['memo']); ?>
						</textarea>
					</div>
					<input type="submit" value="送信" />
				</form>
			</div>
		</article>
		<footer>
			<div class="copylight">© 2015 Hiroshima Seiya Official Site</div>
		</footer>
	</body>
</html>