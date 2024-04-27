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
       
        .sub-title{
            color: Black;
            font-family: "Times New Roman", Times, serif;
            margin-left: 20px; 
            font-weight: bold;
            font-size: 35px;
        }
        .card{
                margin-bottom: 20px; 
                margin-top: 20px; 
                margin-right: 10px; 
                margin-left: 20px; 
                height: 200px;
        }
        .card-title{
            color: aqua;
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
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"checked>
        <label class="btn btn-outline-primary" for="btnradio1"><a class="nav-link " href="<?= base_url('Beasiswa/home')?>">Pilihan Beasiswa</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" >
        <label class="btn btn-outline-primary" for="btnradio2"><a class="nav-link" href="<?= base_url('Beasiswa/daftar')?>">Daftar</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
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
        
    </div>
    </div>
    <div class="rh">
        <hr>
        <hr>
    </div>
    </center>

    <section id="center" class="center_home">
    <div class="container container-transparent">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/')?>img/bg_1.jpg" class="d-block w-100 img-fluid" alt="Slide 1">
            
                </div>
                <div class="carousel-item">
                <img src="<?= base_url('assets/')?>img/bg_2.jpg" class="d-block w-100 img-fluid" alt="Slide 3">
                
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/')?>img/bg_3.png" class="d-block w-100 img-fluid" alt="Slide 2">
               
            </div>

            <div class="carousel-item">
                <img src="<?= base_url('assets/')?>img/bg_5.png" class="d-block w-100 img-fluid" alt="Slide 2">
               
            </div>
        
             
            
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<h4 class="sub-title">
           
                Pilihan Beasiswa
            
</h4>
<!-- 
<section id="list-topics" class="list-topics">
			<div class="container">
				<div class="list-topics-content">
					<ul>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-restaurant"></i>
								</div>
								<h2><a href="#">resturent</a></h2>
								<p>150 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-travel"></i>
								</div>
								<h2><a href="#">destination</a></h2>
								<p>214 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-building"></i>
								</div>
								<h2><a href="#">hotels</a></h2>
								<p>185 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-pills"></i>
								</div>
								<h2><a href="#">healthcaree</a></h2>
								<p>200 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-transport"></i>
								</div>
								<h2><a href="#">automotion</a></h2>
								<p>120 listings</p>
							</div>
						</li>
					</ul>
				</div>
			</div>/.container -->

		<!-- </section>/.list-topics -->

    <div class="row">
        <?php foreach($beasiswa as $bs) : ?>
            <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body" style="overflow-y: auto;">
                <h5 class="card-title">Beasiswa<?= $bs['jenis_beasiswa']?></h5>
                <p class="card-text" style="max-height: 200px; overflow-y: auto;">Keterangan: <?= $bs['keterangan']?></p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
            </div>
        <?php endforeach;?>
        </div>
  <!-- <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div> -->
    
<!-- <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card w-100">
                    <div class="card-header">
                        Dashboard - Info Beasiswa
                    </div>
                    <div class="card-body">
                        <p>Berikut ini adalah beberapa informasi terkait beasiswa yang tersedia:</p>
                        <ul>
                            <?php foreach($beasiswa as $bs) : ?>
                            <li><h5>Beasiswa<?= $bs['jenis_beasiswa']?></h5></li>
                            <p> ket : <?= $bs['keterangan']?></p>
                             <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->