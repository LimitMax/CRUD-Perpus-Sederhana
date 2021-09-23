<html>
<head>
	<title>Halaman Login</title>
	<style type="text/css">
		body {
			background-color: #7a58ff;
			font-family: "Segoe UI";
		}
		#wrapper {
			background-color: #fff;
			width: 400px;
			height: 330px;
			margin-top: 120px;
			margin-left: auto;
			margin-right: auto;
			padding: 20px;
			border-radius: 4px;
		}
		input[type=text], input[type=password] {
			border: 1px solid #ddd;
			padding: 10px;
			width: 95%;
			border-radius: 2px;
			outline: none;
			margin-top: 10px;
			margin-bottom: 20px;
		}
		label, h1 {
			text-transform: uppercase;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 30px;
			color: #7a58ff;
		}
		button {
			border-radius: 2px;
			padding: 10px;
			width: 120px;
			background-color: #7a58ff;
			border: none;
			color: #fff;
			font-weight: bold;
		}
		.error {
			background-color: #f72a68;
			width: 400px;
			height: auto;
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
			padding: 20px;
			border-radius: 4px;
			color: #fff;

		}
	</style>
</head>
<body>
	<div id="wrapper">
		<form  method="post" action="cek_login.php">
			<h1>Admin Perpustakaan</h1>
			<label>Username</label>
			<input type="text" name="user" placeholder="masukkan username" required="" autofocus="">
			<label>Password </label>
			<input type="password" name="pass" placeholder="masukkan password" required="" >
			<button type="submit" name="submit">Log In</button>
		</form>
	</div>
</body>
</html>