
<?php
include 'config.php';
session_start();
// remove all session variables
// session_unset();

// print_r($_SESSION);

if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($dbconnect, "SELECT * FROM user WHERE username='$username' and password='$password'");

    //mendapatkan hasil dari data
    $data = mysqli_fetch_assoc($query);
    // return var_dump($data);

    //mendapatkan nilai jumlah data
    $check = mysqli_num_rows($query);
    // return var_dump($check);

    if (!$check) {
        $_SESSION['error'] = 'Username & password salah';
    } else {
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role_id'] = $data['role_id'];

        header('location:index.php');
    }
}

?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Jekyll v4.0.1">
		<title>Signin Template · Bootstrap</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<style>
		body{
    	background-image: url(asu.jpg);
    	height: 100%;
    	background-position: center;
    	background-repeat: no-repeat;
    	background-size: cover;
    	background-color: #080710;
   	 	box-sizing: border-box;
		}
		.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
		</style>
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
  	</head>
	<body class="text-center">
		<form method="post" class="form-signin">
			<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
				<div class="alert alert-danger" role="alert">
					<?=$_SESSION['error']?>
				</div>
			<?php }
                $_SESSION['error'] = '';
            ?>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<h3>Please sign in</h3>
			<label for="inputEmail" class="sr-only">Username</label>
			<input type="text" class="form-control" name="username" style="background-color: transparent" placeholder="Username">

			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" class="form-control" name="password" style="background-color: transparent" placeholder="Password">
			<input type="submit" name="masuk" value="Sign in" class="btn btn-lg btn-primary btn-block"/>
			<a href="regis.php">Daftar Sekarang!</a>
			<br>
			<br>
			<br>
			<p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
		</form>
	</body>
</html>


