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

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" checked>
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
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Registrasi Beasiswa
                    </div>
                    <div class="card-body">
                        <form id="registration_form" method="POST" action="<?= base_url('Beasiswa/simpan')?>" enctype="multipart/form-data">
                            <input type="hidden" name="mahasiswaid" id="mahasiswaid">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No Hp">
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester Saat Ini</label>
                                <select name="semester" id="semester" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ipk">IPK Terakhir</label>
                                <input type="text" name="ipk" id="ipk" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="beasiswa">Pilihan Beasiswa</label>
                                <select name="beasiswa" id="beasiswa" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php foreach($beasiswa as $tampil):?>
                                        <option value="<?= $tampil['pk_jenis_beasiswa_id']?>"><?= $tampil['jenis_beasiswa']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">Upload Berkas Syarat (format: pdf/jpg/zip, max 5 MB)</label>
                                <input type="file" class="form-control" id="file" name="file" accept=".pdf,.jpg,.jpeg,.zip" required>
                            </div>

                            <button type="submit" id="submit_button" class="btn btn-primary" style="display: none;">Daftar</button>
                                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function () {
        $('#submit_button').hide(); 

        // Ketika pilihan semester berubah
        $('#semester').change(function () {
            var semester = $(this).val(); // Ambil nilai semester yang dipilih
            var nama = $('#nama').val(); // Ambil nilai nama
            var email = $('#email').val(); // Ambil nilai email
            var no_hp = $('#no_hp').val(); // Ambil nilai nomor HP
            if (semester != '') { // Jika semester tidak kosong
            //     // Kirim permintaan AJAX ke server
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('Beasiswa/cek_ipk') ?>",
                    data: { 
                        semester: semester,
                        nama: nama,
                        email: email,
                        no_hp: no_hp
                    },
                    success: function(response) {
                        if (response.success) {
                            // Perbarui nilai IPK di dalam elemen dengan id 'ipk'
                            $('#ipk').val(response.ipk);
                            $('#mahasiswaid').val(response.mhsid);
                            if (parseFloat(response.ipk) >= 3) {
                                $('#submit_button').show();
                                $('#beasiswa').prop('disabled', false); // Aktifkan form jenis beasiswa
                            } else {
                                $('#submit_button').hide();
                                $('#beasiswa').val(''); 
                                $('#beasiswa').prop('disabled', true); // Nonaktifkan form jenis beasiswa
                                Swal.fire('Error', 'IPK Kurang dari 3', 'error');
                            } 
                        } else {
                            // Tampilkan pesan kesalahan jika query tidak berhasil
                            $('#submit_button').hide(); 
                            Swal.fire('Error', 'Gagal mendapatkan nilai IPK. Masukan nama, no hp yang sesuai.', 'error');
                        }
                    },
                    error: function() {
                        // Tampilkan pesan kesalahan jika terjadi kesalahan dalam permintaan AJAX
                        Swal.fire('Error', 'Gagal mengirim permintaan. Coba lagi beberapa saat.', 'error');
                    }
                });
            }
        });
    });
</script>
    
</body>

</html>
