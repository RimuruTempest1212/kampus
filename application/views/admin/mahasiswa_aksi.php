<div class="container mt-2" align="center">
    <h2 class="mb-4">Tambah Mahasiswa</h2>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampus</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?=base_url("assets/css/contain.css")?>">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .btn-group {
            display: flex;
        }
        .btn-group .btn {
            flex-grow: 1;
        }
        .rh{
            width: 1500px;
            color: black;
        }
      
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- <a class="navbar-brand" href="#">Data Mahasiswa</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('beasiswa')?>">Pilihan Beasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('daftar')?>">Pendaftaran Beasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('hasil')?>">Cek Hasil</a>
                </li>
            </ul>
        </div> -->
        
    </nav>
    
<center>
        <br>
        <div class="container">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
    <?php if(!$this->session->userdata('nama')): ?>
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio1"><a class="nav-link " href="<?= base_url('Beasiswa/home')?>">Pilihan Beasiswa</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" >
        <label class="btn btn-outline-primary" for="btnradio2"><a class="nav-link" href="<?= base_url('Beasiswa/daftar')?>">Daftar</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Beasiswa/hasil')?>">Cek Hasil</a></label>
        <?php else:?>
        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Admin')?>">Beranda</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" checked>
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Admin/data_mahasiswa')?>">Data Mahasiswa</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Admin/list_pendaftar')?>">List Pendaftaran</a></label>
        <?php endif;?>
        
        <?php if(!$this->session->userdata('nama')): ?>
        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Login')?>">Login</a></label>
        <?php else:?>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Login/logout')?>">Logout</a></label>
        <?php endif;?>
        
    </div>
    </div>
    <div class="rh">
        <hr>
        <hr>
    </div>
    </center>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
	integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
	crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php if($mahasiswa): ?>
    <div class="container mt-3">
		<div class="container mt-3">
			<h2 class="mb-4">Update Data Mahasiswa</h2>
			<a href="<?= base_url('Admin/data_mahasiswa') ?>">
				<button class="btn btn-primary mb-4"><i class="fa fa-arrow-left"></i> Kembali</button>
			</a>
			<form id="form-tambah-mahasiswa" method="POST" action="<?= base_url('Admin/simpan_update') ?>">
                <input type="hidden" name="mahasiswaid" value="<?= $mahasiswa['pk_mahasiswa_id']?>">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama_mahasiswa']?>"  placeholder="Masukkan Nama">
				</div>
				<div class="form-group">
					<label for="nama">Nim</label>
					<input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim']?>"  placeholder="Masukkan nim">
				</div>
				<div class="form-group">
					<label for="jenis_kelamin">Jenis Kelamin</label>
					<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="<?= $mahasiswa['email']?>"  placeholder="Masukkan Email">
				</div>
				<div class="form-group">
					<label for="no_hp">No Hp</label>
					<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $mahasiswa['no_hp']?>"  placeholder="Masukkan No Hp">
				</div>
				<div class="form-row mb-4">
					<div class="col">
						<label for="semester1">Semester 1</label>
						<input type="text" class="form-control" id="semester1" value="<?= $mahasiswa['nilai_semester1']?>"  name="semester1"
							placeholder="IPK Semester 1">
					</div>
					<div class="col">
						<label for="semester2">Semester 2</label>
						<input type="text" class="form-control" id="semester2" name="semester2" value="<?= $mahasiswa['nilai_semester2']?>"
							placeholder="IPK Semester 2">
					</div>
					<div class="col">
						<label for="semester3">Semester 3</label>
						<input type="text" class="form-control" id="semester3" name="semester3" value="<?= $mahasiswa['nilai_semester3']?>"
							placeholder="IPK Semester 3">
					</div>
					<div class="col">
						<label for="semester4">Semester 4</label>
						<input type="text" class="form-control" id="semester4" name="semester4" value="<?= $mahasiswa['nilai_semester4']?>"
							placeholder="IPK Semester 4">
					</div>
				</div>
				<div class="form-row mb-4">
					<div class="col">
						<label for="semester5">Semester 5</label>
						<input type="text" class="form-control" id="semester5" name="semester5" value="<?= $mahasiswa['nilai_semester5']?>"
							placeholder="IPK Semester 5">
					</div>
					<div class="col">
						<label for="semester6">Semester 6</label>
						<input type="text" class="form-control" id="semester6" name="semester6" value="<?= $mahasiswa['nilai_semester6']?>"
							placeholder="IPK Semester 6">
					</div>
					<div class="col">
						<label for="semester7">Semester 7</label>
						<input type="text" class="form-control" id="semester7" name="semester7" value="<?= $mahasiswa['nilai_semester7']?>"
							placeholder="IPK Semester 7">
					</div>
					<div class="col">
						<label for="semester8">Semester 8</label>
						<input type="text" class="form-control" id="semester8" name="semester8" value="<?= $mahasiswa['nilai_semester8']?>"
							placeholder="IPK Semester 8">
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
</div>
<?php else:?>
<div class="container mt-3">
		<div class="container mt-3">
			<h2 class="mb-4">Tambah Data Mahasiswa</h2>
			<a href="<?= base_url('Admin/data_mahasiswa') ?>">
				<button class="btn btn-primary mb-4"><i class="fa fa-arrow-left"></i> Kembali</button>
			</a>
			<form id="form-tambah-mahasiswa" method="POST" action="<?= base_url('Admin/tambah_data')?>">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
				</div>
				<div class="form-group">
					<label for="nama">Nim</label>
					<input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan nim"required>
				</div>
				<div class="form-group">
					<label for="jenis_kelamin">Jenis Kelamin</label>
					<select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
				</div>
				<div class="form-group">
					<label for="no_hp">No Hp</label>
					<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No Hp" required>
				</div>
				<div class="form-row mb-4">
					<div class="col">
						<label for="semester1">Semester 1</label>
						<input type="text" class="form-control" id="semester1" name="semester1"
							placeholder="IPK Semester 1" required>
					</div>
					<div class="col">
						<label for="semester2">Semester 2</label>
						<input type="text" class="form-control" id="semester2" name="semester2"
							placeholder="IPK Semester 2" required>
					</div>
					<div class="col">
						<label for="semester3">Semester 3</label>
						<input type="text" class="form-control" id="semester3" name="semester3"
							placeholder="IPK Semester 3" required>
					</div>
					<div class="col">
						<label for="semester4">Semester 4</label>
						<input type="text" class="form-control" id="semester4" name="semester4"
							placeholder="IPK Semester 4" required>
					</div>
				</div>
				<div class="form-row mb-4">
					<div class="col">
						<label for="semester5">Semester 5</label>
						<input type="text" class="form-control" id="semester5" name="semester5"
							placeholder="IPK Semester 5" required> 
					</div>
					<div class="col">
						<label for="semester6">Semester 6</label>
						<input type="text" class="form-control" id="semester6" name="semester6"
							placeholder="IPK Semester 6" required>
					</div>
					<div class="col">
						<label for="semester7">Semester 7</label>
						<input type="text" class="form-control" id="semester7" name="semester7"
							placeholder="IPK Semester 7" required>
					</div>
					<div class="col">
						<label for="semester8">Semester 8</label>
						<input type="text" class="form-control" id="semester8" name="semester8"
							placeholder="IPK Semester 8" required> 
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
</div>


<?php endif;?>
