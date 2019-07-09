<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="stylesheet" href="/css/style.css">
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script src="js/scripr.js"></script>
</head>
<body>
	<form action="/form1.php" method="post">
		<input type="text" placeholder="Имя" name ="name" >
		<input type="text" placeholder="E-mail" name ="email" >
		<input type="text" placeholder="Логин" name ="login" >
		<input type="text" placeholder="Пароль" name ="password" >
		<input type="text" placeholder="Повторите пароль" name ="password2" >
		<input type="submit"  value = "Зарегистрироваться">
	</form>
	<div id="messageBox"></div>
</body>
</html>
