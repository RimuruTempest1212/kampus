<?php
if ($this->session->flashdata('pesan')) :
	$data = $this->session->flashdata('pesan');
?>
	<script>
		Swal.fire(
			'<?= $data['caption']; ?>',
			'<?= $data['message']; ?>',
			'<?= $data['status']; ?>',
		)
	</script>
<?php
endif;
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="assets/css/background.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<!-- Custom CSS -->
	<style>
		/* .gambar {
            background-image: url('assets/img/bg2.png');
            background-size: 50%;
            background-repeat: no-repeat;
            background-position: center;
            border-radius: 80px; 
            overflow: hidden;
            
            height: 100vh; 
            display: flex;
            
            justify-content: center;
            align-items: center;
        } */

		.text-black {
			color: #000000;
			/* kode warna hitam */
		}

		.login {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.login-container {
			background-color: rgba(255, 255, 255, 0.8);
			/* Tambahkan warna latar belakang semi-transparan */
			padding: 20px;
			border-radius: 10px;
			width: 300px;
			margin-bottom: 10px;
		}

		.judul-sekolah {
			text-align: center;
			margin-bottom: 20px;
		}

		.logo-sekolah {
			width: 100px;
			/* Sesuaikan lebar logo sesuai kebutuhan */
			height: auto;
			/* Biarkan tinggi menyesuaikan proporsi */
			margin-top: 5px;
			/* Jarak antara judul dan logo */
		}
	</style>
</head>

<body>

	<?php
	if ($this->session->flashdata('pesan')) :
		$data = $this->session->flashdata('pesan');
	?>
		<script>
			Swal.fire(
				'<?= $data['caption']; ?>',
				'<?= $data['message']; ?>',
				'<?= $data['status']; ?>',
			)
		</script>
	<?php
	endif;
	?>

	<div class="judul-sekolah">
		<a href="<?= base_url('Beasiswa/home') ?>" class="btn btn-link text-black"><i class="fas fa-arrow-left"></i> Back to Home</a>
		<h1 class="text-center mb-4">Welcome</h1>
		<!-- <img src="assets/img/logo.png" alt="Logo Sekolah" class="logo-sekolah"> -->
	</div>

	<div class="login">
		<div class="login-container">
			<h2 class="text-center mb-4">Login</h2>
			<form method="POST" action="<?= base_url('Login/proses_login') ?>">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Login</button>
			</form>
		</div>
	</div>


</body>

</html>