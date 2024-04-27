<?php

class Admin extends CI_Controller {
    public function __construct()
	{
        parent:: __construct();
        
        if(!($this->session->userdata['nama'])) {
			$data = [
				'caption' => 'Akses Ditolak',
				'message' => 'Harap Login Kembali',
				'status'  => 'error'
			];

			$this->session->set_flashdata('pesan', $data);
			redirect('Login');
		}

	}

    function index(){
        $this->load->view('template/header');
        $this->load->view('admin/dashboard');
        $this->load->view('template/footer');
    }

    function data_mahasiswa() {
        $mhs = $this->db
            ->get_where('mahasiswa')->result_array();

        $data = [
            'mahasiswa' => $mhs
        ];
        $this->load->view('template/header');
        $this->load->view('admin/mahasiswa', $data);
        $this->load->view('template/footer');
    }

    function list_pendaftar(){
        $mhs = $this->db
                ->join('mahasiswa', 'mahasiswa.pk_mahasiswa_id = pendaftaran.fk_mahasiswa_id','left')
                ->join('jenis_beasiswa', 'jenis_beasiswa.pk_jenis_beasiswa_id = pendaftaran.fk_jenis_beasiswa_id','left')
                ->get_where('pendaftaran')->result_array();
        $data = [
            'mahasiswa' => $mhs
        ];
        $this->load->view('template/header');
        $this->load->view('admin/list_pendaftar', $data);
        $this->load->view('template/footer');
    }

    function delete_pendaftar(){
        $item_id = $this->input->post('id');
        $delete = $this->db->delete('pendaftaran', array('pk_pendaftaran_id' => $item_id));
        if($delete){
            $response = array('success' => true);
        }else{
            $response = array('success' => false);
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function delete_mahasiswa()
{
    $item_id = $this->input->post('id');
    
    // Hapus entri mahasiswa dari tabel mahasiswa
    $this->db->where('pk_mahasiswa_id', $item_id);
    $delete_mahasiswa = $this->db->delete('mahasiswa');
    
    // Hapus semua entri terkait dalam tabel pendaftaran berdasarkan fk_mahasiswa_id
    $this->db->where('fk_mahasiswa_id', $item_id);
    $delete_pendaftaran = $this->db->delete('pendaftaran');
    
    if($delete_mahasiswa && $delete_pendaftaran) {
        $response = array('success' => true);
    } else {
        $response = array('success' => false);
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
}

    function aksi_mahasiswa($id = null){

        if($id != null){
            $tampil = $this->db
            ->join('transkrip_nilai','transkrip_nilai.fk_mahasiswa_id = mahasiswa.pk_mahasiswa_id','left')
            ->get_where('mahasiswa', array('pk_mahasiswa_id' => $id))->row_array();
        }else{
            $tampil = "";
        }

        $data   = [
            'mahasiswa' => $tampil
        ];
        $this->load->view('template/header');
        $this->load->view('admin/mahasiswa_aksi', $data);
        $this->load->view('template/footer');
    }

    function tambah_data(){
        $data = [
            'nama_mahasiswa' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp')
        ];

        $this->db->insert('mahasiswa', $data);
        $last_insert_id = $this->db->insert_id();

        $datanilai = [
            'fk_mahasiswa_id' => $last_insert_id,
            'nilai_semester1' => $this->input->post('semester1'),
            'nilai_semester2' => $this->input->post('semester2'),
            'nilai_semester3' => $this->input->post('semester3'),
            'nilai_semester4' => $this->input->post('semester4'),
            'nilai_semester5' => $this->input->post('semester5'),
            'nilai_semester6' => $this->input->post('semester6'),
            'nilai_semester7' => $this->input->post('semester7'),
            'nilai_semester8' => $this->input->post('semester8'),
        ];

        $this->db->insert('transkrip_nilai', $datanilai);
        $data = [
            'caption' => 'Success',
            'message' => 'Data Berhasil Ditambahkan',
            'status'  => 'success'
        ];

        $this->session->set_flashdata('pesan', $data);
        redirect('Admin/data_mahasiswa');
    }

    function simpan_update(){
        $where = [ 'pk_mahasiswa_id' => $this->input->post('mahasiswaid')];
        $where_update = [ 'fk_mahasiswa_id' => $this->input->post('mahasiswaid')];
        $data = [
            'nama_mahasiswa' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp')
        ];

        $this->db->update('mahasiswa', $data, $where);

        $datanilai = [
            'nilai_semester1' => $this->input->post('semester1'),
            'nilai_semester2' => $this->input->post('semester2'),
            'nilai_semester3' => $this->input->post('semester3'),
            'nilai_semester4' => $this->input->post('semester4'),
            'nilai_semester5' => $this->input->post('semester5'),
            'nilai_semester6' => $this->input->post('semester6'),
            'nilai_semester7' => $this->input->post('semester7'),
            'nilai_semester8' => $this->input->post('semester8'),
        ];

        $this->db->update('transkrip_nilai', $datanilai, $where_update);

        $data = [
            'caption' => 'Success',
            'message' => 'Data Berhasil Diupdate',
            'status'  => 'success'
        ];

        $this->session->set_flashdata('pesan', $data);
        redirect('Admin/data_mahasiswa');
    }

}