<?php

class Login extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('email')) {

			redirect('admin/dashboard');
		} else {
			//
			$this->load->view('template/header');
			$this->load->view('login');
		}
	}


	function proses_login()
	{
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');

		//cek data
		$getUserData = $this->db->select('')
			->get_where('login', array('login.username' => $username))->row_array();

		if ($getUserData && password_verify($password, $getUserData['password'])) {
			//save data ke session
			$this->session->set_userdata('loginid', $getUserData['pk_login_id']);
			$this->session->set_userdata('username', $getUserData['username']);
			$this->session->set_userdata('nama', $getUserData['nama']);

			$data = [
				'caption' => 'Login Berhasil',
				'message' => 'Selamat Datang' . $getUserData['nama'],
				'status'  => 'success'
			];

			$this->session->set_flashdata('pesan', $data);
			redirect('Admin');
		} else {
			$data = [
				'caption' => 'Login Gagal',
				'message' => 'Username atau Password Salah!',
				'status'  => 'error'
			];

			$this->session->set_flashdata('pesan', $data);
			redirect('Login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();

		$data = [
			'caption' => 'Berhasil Logout',
			'message' => 'Thanks You, See u later!',
			'status'  => 'success'
		];

		$this->session->set_flashdata('pesan', $data);
		redirect('Beasiswa/home');
	}
}
