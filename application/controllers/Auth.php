<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    

    public function index()
    {
        if ($this->session->userdata('admin')) {
            redirect('/');
        }
        $this->load->view('login.php');
    }
    
    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect('login');
    }

    public function signIn()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $getUsernameDB = $this->db->get_where('tbl_admin', ['username' => $username]);        
        if($getUsernameDB->num_rows() >= 1){
            $getRow = $getUsernameDB->row_array();
            if($password == $getRow['password']){                
                $this->session->set_userdata('admin', $getRow['username']);                    
                redirect('/');                
            }else{
                $this->session->set_flashdata('message', 'loginFailed');
                redirect('login');                
            }
        }else{
            $this->session->set_flashdata('message', 'loginFailed');
            redirect('login'); 
        }
    }

    public function signUp()
    {
        $this->load->view('login/daftar.php');
    }

    public function daftar()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');

        $data =[
            'username' => $username,
            'password' => $pass,
            'nama' => $nama,
            'alamat' => $alamat,
            'alamat' => $alamat,
            'email' => $email,
            'gender' => '',
            'foto' => '',
            'level' => '1',
        ];

        $this->db->insert('login', $data);
        $this->session->set_flashdata('pesan', 'Pendaftaran Berhasil, Silahkan Login');
        redirect('');        
    }
}
