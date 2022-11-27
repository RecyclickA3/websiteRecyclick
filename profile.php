<?php
session_start();
include "koneksi.php";
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $nama = $_POST['nama'];
    $notel = $_POST['notelepon'];
    $query = "UPDATE pembeli SET Username_pbl = '$username', password_pbl = '$pass', nama_pbl = '$nama', noTelp_pbl = '$notel' WHERE Username_pbl = '$id'";
    $result = mysqli_query($koneksi, $query);
    header('Location: index.html');
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!--Font Google-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<!-- Style -->
<link rel="icon" href="assets/img/logo.png" type="image/x-icon">
<!-- <link rel="stylesheet" href="https://cdn.js.clouldflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
<link rel="stylesheet" href="https://cdn.js.clouldflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
    <title> Profile-RecyClick</title>
  </head>
  
  <body>

<!-- Navbar Fren -->

<nav class="navbar navbar-expand-lg navbar-light bg-light py-2 fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="assets/img/logo.png" alt="" width="90" 
      class="d-inline-block align-text-top me-3">
      </a>
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       

        <span ><i id="bar" class="navbar-toggler-icon"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active " aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="barang.html">Barang</a>
          </li><li class="nav-item">
            <a class="nav-link" href="#">Riwayat</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">Kontak</a>
        </li>
      </li>
      <a class="nav-link" href="#">
        <img src="assets/img/search (1).png" alt="" class="me-3">
        <img src="assets/img/search (2).png" alt="" class="me-3">
      </a>
    </li>  
        </ul>
        <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>
 <section id="pp" class="pt-5 mt-5 container ">
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
								<input type="password" name="password_confirmation" class="form-control" id="" value="<?php echo $notel?>"  placeholder="Nomor Telepon">
							</div>

							<button type="submit" class="btn btn-primary">Update Data</button>
						</form>

						<a href="/index.php">Batal</a>
					</div>
				</div>
			</div>

		</div>

	</div>
 </section>
  



  <section id="contact">
  <div class="contrainer-fluid overlay h-100">
    <div class="contrainer">
      <div class="row">
        <div class="col-md-6">
          <h3>Dapatkan Informasi Mengenai Kami Melalui : </h3>
          <div class="kontak">
            <h6>Kontak</h6>
            <div class="mb-lg-3 me-1 d-flex align-items-center"><img src="assets/img/lmt.png" alt="">
              <a href="#">Rumah Akhdan Robbani No 54 Blok 89 Nganjuk</a>
            </div>
            <div class="mb-lg-3 me-1"><img src="assets/img/tlp.png" alt="">
              <a href="#">022-6789-7778</a>
            </div>
            <div class="mb-lg-3 me-1"><img src="assets/img/eml.png" alt="">
              <a href="#">Recyclick@gmail.com</a>
            </div>
            <h6>Sosial Media</h6>
            <a href="#" class="linksosmed"><img src="assets/img/sosomed.png" alt="">RecyclickNganjuk</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card-contact w-100">
            <form>
              <h2>Ada Pertanyaan?</h2>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="d-flex align-items-center">Masukkan E-mail Anda</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="d-flex align-items-center">Masukkan Komentar Anda</label>
              </div>
              <button type="submit"class="button-kirim">Kirim</button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  
  </div>
  </section>




  <footer class="d-flex align-items-center position-relative">
  <div class="container-fluid">
    <div class="container">
    <div class="row">
      <div class="col-md-7 d-flex align-items-center justify-content-lg-start justify-content-center">
        <img src="assets/img/imgfooter.png" alt="">
      </div>
      <div class="col-md-5 d-flex justify-content-evenly justify-content-center">
      
    </div>
    </div>
    <div class="row position-absolute copyright start-50 translate-middle">
      <div class="col-12 ">
        <p class="text-center">Copyright bg A3 Teheroam all right reserved</p>
      </div>
    </div>
    </div>
    
  </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <script src="js/slider.js"></script>
  </body>
  

</html>   