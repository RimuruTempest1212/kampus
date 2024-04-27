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
        <h2 class="navbar-brand">Beasiswa Kampus</h2>
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

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off"checked>
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Beasiswa/hasil')?>">Cek Hasil</a></label>
        <?php else:?>
        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Admin')?>">Beranda</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
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
        <!-- <ul>
        <li class="nav-item active">
                    <?php if(!$this->session->userdata('nama')): ?>
                    <a class="nav-link" href="<?= base_url('Login') ?>">Login</a>
                    <?php else:?>
                    <a class="nav-link" href="<?= base_url('Login/logout') ?>">Logout</a>
            <?php endif;?>
         </li>
        </ul> -->
        
    </div>
    </div>
    <div class="rh">
        <hr>
        <hr>
    </div>
    </center>


    
    <?php 
	if ($this->session->flashdata('pesan')):
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
<div class="container mt-4">
        <form action="<?= base_url('Beasiswa/cek_hasil') ?>" method="GET">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="nim" class="form-control" placeholder="Masukan NIM" aria-label="Masukan NIM"
                            aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <input type="submit" value="Cari" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php 
    $nim = $this->input->get('nim');
    if($nim && $hasil != ""): ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Informasi Pendaftaran Beasiswa
                    </div>
                    <div class="card-body">
                        <p>Nama: <?= $hasil['nama_mahasiswa'] ?></p>
                        <p>NIM: <?= $hasil['nim'] ?></p>
                        <p>Semester Saat ini: <?= $hasil['semester'] ?></p>
                        <p>IPK: <?= $hasil['ipk'] ?></p>
                        <p>Jenis Beasiswa: <?= $hasil['jenis_beasiswa'] ?></p>
                        <p>Status Ajuan : <?= $hasil['status_ajuan'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                            Tidak ada data! Masukan NIM dan Klik Cari
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>