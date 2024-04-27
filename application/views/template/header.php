<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?=base_url("assets/css/contain.css")?>">
<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh; 
    }
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

    footer {

        height: 50px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px 0;
        }
    
    .content {
        margin-bottom: 50px;
    }
    
    .container-transparent {
        
        border-radius: 10px; 
        padding: 20px; 
    }
    .carousel-item img {
        height: 500px; 
        object-fit: cover; 
    }
    .carousel-caption {
        
        border-radius: 10px; 
        padding: 10px; 
    }
    .container-scroll {
        max-height: 75vh; 
        overflow-y: auto; 
        margin-bottom: 50px; /
    }
    .form-container {
        margin-bottom: 20px; 
    }
    </style>
</head>
<body class="container mt-2 content" align="center">

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Beasiswa Kampus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
        </div>
    </nav>

    <center>
        <br>
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio1"><a class="nav-link " href="<?= base_url('Beasiswa/home')?>">Pilihan Beasiswa</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio2"><a class="nav-link" href="<?= base_url('Beasiswa/daftar')?>">Daftar</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Beasiswa/hasil')?>">Cek Hasil</a></label>
    </div>
    <div class="rh">
        <hr>
        <hr>
    </div>
    </center> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var radios = document.querySelectorAll('.btn-check');

            radios.forEach(function(radio) {
                radio.addEventListener('click', function() {
                    this.checked = true;
                });
            });
        });
    </script>

 