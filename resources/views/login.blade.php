<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Correct Font Awesome link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
		body {
		  background-image: url("{{ asset('gambar/background.jpg') }}");
		  background-size: cover;
    	  background-repeat: no-repeat; 
    	  background-position: center; 
		  font-family: 'Open Sans', sans-serif;
		}
		.login {
		  width: 400px;
		  padding-top: 50px;
		  margin: 16px auto;
		  font-size: 16px;
		}
		.login-header,
		.login p {
		  margin-top: 0;
		  margin-bottom: 0;
		}
		.login-header {
		  background: white;
		  padding: 10px;
		  font-size: 1.1em;
		  font-weight: normal;
		  text-align: center;
		}
		.login-container {
		  background: #ebebeb;
		  padding: 10px;
		}

		.login p {
		  padding: 10px;
		}
		.login input {
		  box-sizing: border-box;
		  display: block;
		  width: 100%;
		  border-width: 1px;
		  border-style: solid;
		  padding: 15px;
		  outline: 0;
		  font-family: inherit;
		  font-size: 0.95em;
		}
		.login input[id="email"],
		.login input[id="password"],
		.login input[id="angkatan"]
		.login input[id="akun"]{
		  background: #fff;
		  border-color: #bbb;
		  color: #555;
		}

		/* Text fields' focus effect */
		.login input[id="email"]:focus,
		.login input[id="password"]:focus
		.login input[id="akun"]{
		  border-color: #888;
		}
		.login input[type="button"] {
		  background: #28d;
		  border-color: transparent;
		  color: #fff;
		  cursor: pointer;
		}
		.login input[type="button"]:hover {
		  background: #17c;
		}
		/* Buttons' focus effect */
		.login input[type="button"]:focus {
		  border-color: #05a;
		}
	</style>
    <title>Login</title>
</head>
<body>
    <div class="login">
		<h2 class="login-header">
			<img src= {{ asset('gambar/logo.png') }} width="100px" height="80px"/>
		</h2>
	
		<div class="login-container">
			<p style="text-align: center;"><strong>Welcome, Please Login</strong></p>
	    <p>
	        <input type="text" id="email" placeholder="Email">
	    </p>
	    <p>
	        <input type="text" id="password" placeholder="Password">
	    </p>
	    <p style="text-align: center; font-size: 12px;">
	        <label for="akun">Don't have an account? <a href="{{ route('register') }}" style="color: blue;">Register</a></label>
	    </p>
	    <p>
	        <input type="button" value="Sign in" onclick="submit();">
	    </p>
		</div>
		</div>
	</div>
</body>
</html>
