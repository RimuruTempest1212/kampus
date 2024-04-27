<div class="container mt-1" align="center">
    <h2 class="mb-4">Form Validasi</h2>
</div>

<center>
        <br>
        <div class="container">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
    <?php if(!$this->session->userdata('nama')): ?>
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio1"><a class="nav-link " href="<?= base_url('Beasiswa/home')?>">Pilihan Beasiswa</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio2"><a class="nav-link" href="<?= base_url('Beasiswa/daftar')?>">Daftar</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Beasiswa/hasil')?>">Cek Hasil</a></label>
        <?php else:?>
        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" >
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Admin')?>">Beranda</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio3"><a class="nav-link" href="<?= base_url('Admin/data_mahasiswa')?>">Data Mahasiswa</a></label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" checked>
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

<div class="container mt-2">
    <h2 class="mb-4">Validasi Pendaftar Beasiswa</h2>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <a href="<?= base_url('Admin/list_pendaftar') ?>">
		<button class="btn btn-primary mb-4"><i class="fa fa-arrow-left"></i> Kembali</button>
	</a>
    <!-- Card Info Mahasiswa -->
    <div class="card mb-4">
        <div class="card-header">
            Info Mahasiswa
        </div>
        <div class="card-body">
            <!-- Isi info mahasiswa disini -->
            <p>Nama: <?= $infopendaftar['nama_mahasiswa']?></p>
            <p>Semester: <?= $infopendaftar['semester']?></p>
            <p>IPK: <?= $infopendaftar['ipk']?></p>
            <p>Jenis Beasiswa : <?= $infopendaftar['jenis_beasiswa']?></p>
            <!-- Dan lain-lain -->
        </div>
    </div>

    <!-- Card Validasi -->
    <div class="card form-container">
        <div class="card-header">
            Status Ajuan Beasiswa
        </div>
        
        <div class="card-body">
            <!-- Form untuk validasi status ajuan -->
            <form method="POST" action="<?= base_url('Beasiswa/update_status') ?>">
                <input type="hidden" name="pendaftarid" value="<?= $infopendaftar['pk_pendaftaran_id']?>">
                <div class="form-group ">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="Belum di verifikasi" <?php if($infopendaftar['status_ajuan'] == "Belum di Verifikasi"){echo "selected";} ?>>Belum di verifikasi</option>
                        <option value="Diverifikasi" <?php if($infopendaftar['status_ajuan'] == "Diverifikasi"){echo "selected";} ?>>Diverifikasi</option>
                        <option value="Lulus" <?php if($infopendaftar['status_ajuan'] == "Lulus"){echo "selected";} ?>>Lulus</option>
                        <option value="Gagal" <?php if($infopendaftar['status_ajuan'] == "Gagal"){echo "selected";} ?>>Gagal</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        
    </div>
</div>

</body>
</html>
