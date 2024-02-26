
<?php
include 'config.php';
session_start();
// remove all session variables
// session_unset();

// print_r($_SESSION);

if (isset($_POST['insert'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($dbconnect, "INSERT INTO user(nama, username, password) VALUES('$nama','$username','$password')");
    if($query){
        echo '<script>alert("Selamat, Register berhasil"); location.href="login.php"</script>';
   }else{
        echo '<script>alert("Maaf, Register gagal");</script>';
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
			<h3>Please sign up</h3>
            <label for="inputEmail" class="sr-only">Fullname</label>
			<input type="text" class="form-control" name="nama" style="background-color: transparent" placeholder="Fullname">

			<label for="inputEmail" class="sr-only">Username</label>
			<input type="text" class="form-control" name="username" style="background-color: transparent" placeholder="Username">

			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" class="form-control" name="password" style="background-color: transparent" placeholder="Password">
			<input type="submit" name="insert" value="Sign Up" class="btn btn-lg btn-primary btn-block"/>
            <a href="login.php">Login Sekarang!</a>
			<p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
		</form>
	</body>
</html>


