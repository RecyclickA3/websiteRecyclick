<?php
session_start();

//include koneksi
 include "koneksi.php";

//get user detail
$username = $_SESSION['username'];
$query = "SELECT * FROM pembeli WHERE Username_pbl = '$username' LIMIT 1";
$stmt = mysqli_query($koneksi, $query);
$num = mysqli_num_rows($stmt);
if($num >0){
    if($row = mysqli_fetch_array($stmt)){
        $username = $row['Username_pbl'] ;
        $pass = $row['password_pbl'];
        $nama = $row['nama_pbl'];
        $notel = $row['noTelp_pbl'];
    }
}
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<title>Update Profile - PHP</title>
</head>
<body>
	<div class="container">

		<div class="row">
			<div class="col-md-4 offset-md-4 mt-5">

				<?php
				if(isset($_SESSION['error'])) {
				?>
				<div class="alert alert-warning" role="alert">
				  <?php echo $_SESSION['error']?>
				</div>
				<?php
				}
				?>

				<?php
				if(isset($_SESSION['message'])) {
				?>
				<div class="alert alert-success" role="alert">
				  <?php echo $_SESSION['message']?>
				</div>
				<?php
				}
				?>
				<div class="card ">
					<div class="card-title text-center">
						<h1>Profile Form</h1>
					</div>
					<div class="card-body">
						<form action="update-profile.php" method="post">
                            <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $username?>" >
							<div class="form-group">
								<label for="username">Nama Lengkap</label>
								<input type="text" name="nama" class="form-control" id="name" value="<?php echo $nama?>" aria-describedby="name" placeholder="Nama lengkap" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" disabled class="form-control" id="username" value="<?php echo $username?>" aria-describedby="username" placeholder="username" autocomplete="off">

							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" id="password" value="<?php echo $pass?>" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="password">Nomor Telepon</label>
								<input type="text" name="notelepon" class="form-control" id="notelepon" value="<?php echo $notel?>"  placeholder="Password">
							</div>

							<button type="submit" name="simpan" class="btn btn-primary">Update Data</button>
						</form>
						<a href="/index.php">Batal</a>
					</div>
				</div>
			</div>

		</div>

	</div>
</body>
<?php
unset($_SESSION['error']);
unset($_SESSION['message']);