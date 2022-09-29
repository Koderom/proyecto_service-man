<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ asset('./style/login.css') }}>
    <title>Document</title>
</head>
<body>
    <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Service-<span>Man</span></div>
		</div>
		<br>
		<div class="login">
				<input type="text" placeholder="username" name="user"><br>
				<input type="password" placeholder="password" name="password"><br>
				<input type="button" value="Login">
                <a href={{ route('home') }}>Dashboard</a>
                <a href={{ route('login') }}>login</a>
		</div>
</body>
</html>