<div class="container mt-2" align="center">
    <h2 class="mb-4">Data Mahasiswa</h2>
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
    <h2 class="mb-4">Data Mahasiswa</h2>
    <a href="<?= base_url('Admin/aksi_mahasiswa/')?>">
        <button class="btn btn-primary mb-4"><i class="fa fa-plus"></i> Tambah</button>
    </a>
    <table id="pendaftar-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($mahasiswa as $mhs): ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $mhs['nama_mahasiswa'] ?></td>
                <td><?= $mhs['nim'] ?></td>
                <td><?= $mhs['jenis_kelamin'] ?></td>
                <td><?= $mhs['email'] ?></td>
                <td><?= $mhs['no_hp'] ?></td>
                <td class="text-center">
                    <a href="<?= base_url('Admin/aksi_mahasiswa/'.$mhs['pk_mahasiswa_id'])?>">
                        <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </a>
                    
                    <button class="btn btn-sm btn-danger btndelete" onclick="delete_data(<?= $mhs['pk_mahasiswa_id']?>)">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $('#pendaftar-table').DataTable({
        "paging": true,
        "searching": true
    });

    $('#pendaftar-table tbody').on('click', 'tr td button.btndelete', function () {
        var id = this.id;
        delete_data(id);
    });
});

    function delete_data(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Akan menghapus data ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Hapus Data!'
        }).then((result) => {
            if (result.isConfirmed) {
				deleteData(id);
            } else {
                Swal.fire('Cancel', 'Data gagal dihapus :)', 'info');
            }
        });
    };


    function deleteData(id) {
        $.ajax({
            type: 'POST',
			url: "<?= base_url('Admin/delete_mahasiswa')?>",
            data: { 
				id: id 
			},
            success: function(response) {
                if (response.success) {
                    Swal.fire('Deleted!', 'Data berhasil dihapus.', 'success')
                    .then(() => {
                        // Redirect ke halaman tertentu setelah menghapus data
                        window.location.href = "<?= base_url('Admin/data_mahasiswa')?>";
                    });
                } else {
                    Swal.fire('Error', 'Gagal menghapus data', 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Gagal menghapus data. Coba lagi beberapa saat.', 'error');
            }
        });
	}

</script>

</body>
</html>
