<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title>
  <link rel="stylesheet" href="{{ asset('/css/stylelogin.css') }}">

</head>
<body>
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">



			<div class="login">
				<form action="login-proses" method="POST">
					@csrf
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit">Login</button>
				</form>
			</div>
	</div>
</body>
</html>
