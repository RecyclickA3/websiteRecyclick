<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/login.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<!-- <h2 class="heading-section"></h2> -->
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2><img src="assets/img/logo.png" img></h2>
								<p>Don't have an account?</p>
								<a href="register.php" class="btn btn-white btn-outline-white">Sign Up</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Selamat Datang</h3>
			      		</div>
								<div class="w-100">
									<!-- <p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p> -->
								</div>
			      	</div>
					<form action="login2.php" method="post">
							<!-- <form action="#" class="signin-form"> -->
			      		<div class="form-group mb-3">
						  <label class="label" name="Username" for="name">Username</label>
			      			<input type="text" name="Username" class="form-control" placeholder="Username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" name="password" for="password">password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Ingat saya
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="reset.php">Lupa Password</a>
									</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
	</body>
</html>


<?php
require "koneksi.php";
session_start();

class login {
    public $email, $pass;
    public $num, $userName, $role;

    public function __construct($nm, $ps){
        $this->email = $nm;
        $this->pass = $ps;
    }
    Private function getKoneksi(){
        return $this->koneksi = mysqli_connect("localhost", "root", "", "recyclick");
    }

    public function execquery(){
        $query="SELECT * FROM pembeli WHERE Username_pbl = '$this->email'";
        $result = mysqli_query($this->getKoneksi(), $query);
        $this -> num = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)){
            $userVal = $row['Username_pbl'];
            $passVal = $row['password_pbl'];
            $this -> userName = $row['nama_pbl'];
        }
        return $this->movecondition($userVal, $passVal, $this->num);
    }

    private function movecondition($uservl, $passvl,$num){
        if($num != 0 ){
            if($uservl==$this->email && $passvl==$this ->pass ){
                header('Location: index.html');
                $_SESSION['username'] = $uservl;
            }else {
                $error = 'user atau password salah';
                echo $error;
                
            }
        }else {
           
            $error = 'User tidak ditemukan';
            echo $error;
            
        }
    }
}

if(isset($_POST['submit'])){
    $person = new login($_POST['Username'], $_POST['password']);
    echo $person->execquery();
}

?>