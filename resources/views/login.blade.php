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
			<form method="POST">
				@csrf
				<input type="text" placeholder="user email" name="email" value="{{old('email')}}"><br>
				@error('email')
					<br><small>{{$message}}</small>
				@enderror
				<input type="password" placeholder="password" name="password"><br>
				@error('email')
					<br><small>{{$message}}</small>
				@enderror
				<button type="submit">Login</button>
			</form>
		</div>
</body>
</html>