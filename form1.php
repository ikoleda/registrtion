<?php

$login = $_POST['login'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
$name = $_POST['name'];

$check = ""; // проверка полей
if (strlen($login) < 3){
	$check =  "Логин меньше 3 символов";
}
else if (strlen($name) < 3){
	$check = "Имя меньше 3 символов";
}
else if (strlen($email) < 3){
	$check = "E-mail меньше 3 символов";
}
else if (strlen($password) < 4){
	$check = "Пароль меньше 4 символов";
}
else if ($password != $password2){
	$check = "Пароли не совпадают";
}

if($check != ""){
	echo $check;
}
else if ($check == "")
{

$fail = "";

$xml = simplexml_load_file('user.xml');

// проверка на совпадение
foreach ($xml as $users) {
	if($login == $users->login || $email == $users->email)
	{
		$fail =  "Совпадение найдено";
	}
}

if($fail != ""){
	echo "Данный пользователь уже существеут (измените логин или E-mail)";
}
else {
	add_user();
	echo "Вы успешно зарегистрированны";
}
}

// функкция для добавления нового пользователя
 function add_user()
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$name = $_POST['name'];

		$password_hash = password_hash($password, PASSWORD_DEFAULT);//шифруем пароль


		$xml = new DomDocument("1.0","UTF_8");
		$xml->load('user.xml');

		$rootTag = $xml->getElementsByTagName("Users")->item(0);

		$userTag = $xml->createElement("User");
		$loginTag = $xml->createElement("login",$login);
		$passwordTag = $xml->createElement("password",$password_hash);
		$emailTag = $xml->createElement("email",$email);
		$nameTag = $xml->createElement("name",$name);

		$userTag->appendChild($loginTag);
		$userTag->appendChild($passwordTag);
		$userTag->appendChild($emailTag);
		$userTag->appendChild($nameTag);

		$rootTag->appendChild($userTag);

		$xml->save('user.xml');
	}
?>