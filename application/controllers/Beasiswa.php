<?php

class Beasiswa extends CI_Controller {

    function home(){
        $data = [
            'beasiswa' => $this->db->get('jenis_beasiswa')->result_array()
        ];

        $this->load->view('template/header');
        $this->load->view('content/info', $data);
        $this->load->view('template/footer');
    }   

    function daftar(){
        $nim = $this->input->get('nim');
        
        $data = [
            'beasiswa' => $this->db->get('jenis_beasiswa')->result_array()
        ];

        $this->load->view('template/header');
        $this->load->view('content/daftar', $data);
        $this->load->view('template/footer');
    }

    function hasil(){
        $this->load->view('template/header');
        $this->load->view('content/hasil');
        $this->load->view('template/footer');
    }

    public function cek_hasil(){
        $nim = $this->input->get('nim');
        $hasil = $this->db
            ->join('jenis_beasiswa', 'jenis_beasiswa.pk_jenis_beasiswa_id = pendaftaran.fk_jenis_beasiswa_id')
            ->join('mahasiswa', 'mahasiswa.pk_mahasiswa_id = pendaftaran.fk_mahasiswa_id')
            ->get_where('pendaftaran', array('nim' => $nim))->row_array();

        $data = [
            'hasil' => $hasil
        ];

    
        $this->load->view('content/hasil', $data);
        $this->load->view('template/footer');
    }

    public function cek_ipk() {
        
        $semester = $this->input->post('semester');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        
        $nilai_semester_field = 'nilai_semester'.$semester;
        
        $this->db->select($nilai_semester_field . ', fk_mahasiswa_id');
        $this->db->from('mahasiswa');
        $this->db->join('transkrip_nilai', 'transkrip_nilai.fk_mahasiswa_id = mahasiswa.pk_mahasiswa_id');
        $this->db->where(array('nama_mahasiswa' => $nama, 'no_hp' => $no_hp));
        
        $query = $this->db->get();
        $result = $query->row_array();
        
        if($result){
            $response = array('success' => true, 'ipk' => $result[$nilai_semester_field], 'mhsid' => $result['fk_mahasiswa_id']);
        }else{
            $response = array('success' => false, 'ipk' => null); 
        }
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));        
        
    }

    public function simpan() {
        // Ambil data dari form
        $mahasiswaid    = $this->input->post('mahasiswaid');
        $semester       = $this->input->post('semester');
        $ipk            = $this->input->post('ipk');
        $jenis_beasiswa = $this->input->post('beasiswa');

        // Konfigurasi upload file
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'pdf|jpg|zip';
        $config['max_size']      = 5120; // 5 MB (dalam kilobita)
        $config['encrypt_name'] = TRUE;

        // Inisialisasi library upload
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            // Penanganan kesalahan jika upload gagal
            $error = $this->upload->display_errors();
            echo $error;
        } else {
            // File berhasil diunggah, proses selanjutnya
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

           
            // $this->load->library('encryption');
            // $file_contents = file_get_contents('./uploads/' . $file_name);
            // $encrypted_file_contents = $this->encryption->encrypt($file_contents);
            // file_put_contents('./uploads/' . $file_name, $encrypted_file_contents);

            // Data yang akan disimpan ke database
            $data = [
                'fk_mahasiswa_id'       => $mahasiswaid,
                'semester'              => $semester,
                'ipk'                   => $ipk,
                'fk_jenis_beasiswa_id'  => $jenis_beasiswa,
                'status_ajuan'          => "Belum di verifikasi",
                'berkas'             => $file_name
            ];

            // Panggil model atau metode untuk menyimpan data ke dalam database
            // cek juga apakah data sudah ada atau tidak
            $cek = $this->db->get_where('pendaftaran', array('fk_mahasiswa_id' => $mahasiswaid))->row_array();
            if(!$cek){
                $this->db->insert('pendaftaran', $data);
                $data = [
                    'caption' => 'Success',
                    'message' => 'Berhasil ditambahkan!',
                    'status'  => 'success'
                ];
            }else{
                $data = [
                    'caption' => 'error',
                    'message' => 'Data mahasiswa sudah terdaftar!',
                    'status'  => 'error'
                ];
            }

			$this->session->set_flashdata('pesan', $data);

            redirect('Beasiswa/daftar');
        }
    }

    function validasi($pendaftaranid){
        $data = [
            'infopendaftar' => $this->db
                                ->join('mahasiswa','mahasiswa.pk_mahasiswa_id = pendaftaran.fk_mahasiswa_id','left')
                                ->join('jenis_beasiswa','jenis_beasiswa.pk_jenis_beasiswa_id = pendaftaran.fk_jenis_beasiswa_id','left')
                                ->get_where('pendaftaran',array('pk_pendaftaran_id'=>$pendaftaranid))->row_array()
        ];

        $this->load->view('template/header');
        $this->load->view('admin/validasi',$data);
        $this->load->view('template/footer');
    }

    function update_status(){
        $pendaftaranid = $this->input->post('pendaftarid');
        $status = $this->input->post('status');

        $data = [
            'status_ajuan'=> $status,
           
        ];

        $where = [ 'pk_pendaftaran_id' => $pendaftaranid,];
        $this->db->update('pendaftaran', $data,$where);

        $info = [
            'caption' => 'success',
            'message' => 'Data Validasi Berhasil di Update!',
            'status' => 'success',
        ];

        $this->session->set_flashdata('pesan',$info);

        redirect('Admin/list_pendaftar');
    }

    function unduh_berkas($nama_berkas){
        $this->load->helper('download');
        $lokasi_berkas = FCPATH . 'uploads/' . $nama_berkas;
        force_download($lokasi_berkas,NULL);
    }

    function list_delete($pk_pendaftaran_id){
        if (!empty($pk_pendaftaran_id)) {
           
            $pendaftaran = $this->db->get_where('pendaftaran', array('pk_pendaftaran_id' => $pk_pendaftaran_id))->row();
            if ($pendaftaran) {
                $file = FCPATH . 'uploads/' . $pendaftaran->berkas;
                
                
                if (file_exists($file)) {
                    unlink($file);
                }
                
                
                $this->db->where('pk_pendaftaran_id', $pk_pendaftaran_id);
                $this->db->delete('pendaftaran');
        
                
                $data = [
                    'caption' => 'Success',
                    'message' => 'Data berhasil dihapus!',
                    'status'  => 'success'
                ];
            } else {
                
                $data = [
                    'caption' => 'Error',
                    'message' => 'Data pendaftaran tidak ditemukan.',
                    'status'  => 'error'
                ];
            }
        } else {
            
            $data = [
                'caption' => 'Error',
                'message' => 'ID pendaftaran tidak valid!',
                'status'  => 'error'
            ];
        }
        
       
        $this->session->set_flashdata('pesan', $data);
        
        
        redirect('Beasiswa/list_pendaftar');
    }
    
}
