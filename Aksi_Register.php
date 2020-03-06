<?php
	session_start();
	$username = "";
	$email = "";
	$errors = array();

	$con = mysqli_connect('localhost','root','','penjualan');


	if (isset($_POST['register'])) {
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password_1 = mysqli_real_escape_string($con,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($con,$_POST['password_2']);

	

		//memastikan bahwa bidang formulir diisi dengan benar
		if (empty($username)) {
			array_push($errors, "Masukan Username");
		}if (empty($email)) {
			array_push($errors, "Masukan Email");
		}if (empty($password_1)) {
			array_push($errors, "Masukan Password");
		}if ($password_1 != $password_2) {
			array_push($errors, "kata sandi tidak cocok");
		}

		if (count($errors) == 0) {
			$password = md5($password_1);
			$sql = "INSERT INTO regester (username, email, password)
			VALUES ('$username', '$email', '$password')";
			mysqli_query($con, $sql);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Register Sukses";
			header('location: Cek_Login.php');

		}
	}

	//USER MASUK DARI HALAMAN LOGIN
	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$password = mysqli_real_escape_string($con,$_POST['password']);

	

		//memastikan bahwa bidang formulir diisi dengan benar
		if (empty($username)) {
			array_push($errors, "Masukan Username");
		}if (empty($password)) {
			array_push($errors, "Masukan Password");
		}

		if (count($errors) == 0 ) {
			$password = md5($password);//mengenkripsi kata sandi sebelum membandingkan dengan itu dari basis data
			$query = "SELECT * FROM regester WHERE username='$username' AND password='$password'";
			$result = mysqli_query($con, $query);
			if (mysqli_num_rows($result) == 1) {
				// USER LOGIN
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "Register Sukses";
        		header('location:HalamanDepan/HalamanDepan.php');
			}else{
				array_push($errors, "username, kata sandi salah");
			}
		}
	}

	//LOGOUt
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: LoginUser.php');
	}
?>
