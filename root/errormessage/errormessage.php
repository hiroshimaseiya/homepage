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

if(trim($_SESSTION['name']) === ''){
	$errors[] = '名前を必ず入力してください。';
}
if(mb_strlen($_SESSTION['name']) > 30){
	$errors[] = '名前は30文字以内で入力してください。';
}

if(trim($_SESSTION['email']) === ''){
	$errors[] = 'メールアドレスを必ず入力してください。';
}
if(mb_strlen($_SESSTION['email']) > 40){
	$errors[] = 'メールアドレスは40文字以内で入力してください。';
}

if(trim($_SESSTION['memo']) === ''){
	$errors[] = 'メッセージは必ず入力してください。';
}
if(mb_strlen($_SESSTION['memo']) > 300){
	$errors[] = 'メッセージは300文字以内で入力してください。';
}

if(count($errors) > 0){
	die(implode('<br />', $errors).
		'<br />[<a href="contact.php">戻る</a>]');
}
?>