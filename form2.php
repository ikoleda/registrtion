<?php

$login = $_POST['login'];
$password = $_POST['password'];

$check = "";

if (strlen($login) < 3){
	$check =  "Логин меньше 3 символов";
}
else if (strlen($password) < 3){
	$check =  "пароль должен содержать больше 4 символов";
}
if($check != ""){
	echo $check;
}
else{

$xml = simplexml_load_file('user.xml');


$name = "";
// проверка на совпадение
foreach ($xml as $users) {
	if($login == $users->login &&  password_verify($password, $users->password) == true )
	{
		$name = $users->name;

	}
}

if($name != ""){

	setcookie("name", $name, time() + 60*60*24*30);
    //Имя юзера присваевается массиву сессии по ключу user
    $_SESSION['user'] = $name;

	echo "Hello $name";
}
else if ($name == ""){
	echo "Логин и пароль введены не верно";
}
}

?>