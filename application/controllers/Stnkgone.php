<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stnkgone extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'STNK Hilang';
        $data['data'] = $this->db->get('tbl_stnkhilang')->result_array();
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/stnkHilang/index');
        $this->load->view('layouts/footer');
    }

    public function addstnkgone()
    {
        $data['title'] = 'STNK Hilang';
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/stnkHilang/tambah');
        $this->load->view('layouts/footer');
    }

    public function savestnkgone()
    {

        $validtions = [
            [
                'field' => 'a/n_stnk',
                'rules' => 'required',
                'errors' => [
                    'required' => 'A/N STNK tidak boleh kosong'
                ]
            ],
            [
                'field' => 'alamat_stnk',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat STNK tidak boleh kosong'
                ]
            ],
            [
                'field' => 'type_kendaraan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tipe kendaraan tidak boleh kosong'
                ]
            ],
            [
                'field' => 'nomor_mesin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor mesin tidak boleh kosong'
                ]
            ],
            [
                'field' => 'nomor_rangka',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor rangka tidak boleh kosong'
                ]
            ],
        ];

        $this->form_validation->set_rules($validtions);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'STNK Hilang';
            $this->load->view('layouts/header', $data);
            $this->load->view('admin/stnkHilang/tambah');
            $this->load->view('layouts/footer');
        } else {
            // id pendaftaran
            $tahun = date('Y');
            $cekIsi = $this->db->get('tbl_stnkhilang');
            if ($cekIsi->num_rows() >= 1) {
                $this->db->select_max('id_stnkhilang');
                $queryLast = $this->db->get('tbl_stnkhilang');
                $getLastId = $queryLast->row_array();
                $lastId = intval(substr($getLastId['id_stnkhilang'], -1));
                $newNumber = $lastId + 1;
                $idDaftar = substr($getLastId['id_stnkhilang'], 0, -1) . $newNumber;
            } else {
                $idDaftar = "SG" . $tahun . "001";
            }

            $data = [
                'id_stnkhilang' => $idDaftar,
                'a/n_stnk' => $this->input->post('a/n_stnk'),
                'alamat_stnk' => $this->input->post('alamat_stnk'),
                'jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
                'type_kendaraan' => $this->input->post('type_kendaraan'),
                'nomor_mesin' => $this->input->post('nomor_mesin'),
                'nomor_rangka' => $this->input->post('nomor_rangka'),
                'status' => 'proses',
            ];

            $this->db->insert('tbl_stnkhilang', $data);
            $this->session->set_flashdata('message', 'success');
            redirect('sg');
        }
    }

    public function showstnkgone()
    {
        $id = $this->input->post('id');
        $query = $this->db->get_where('tbl_stnkhilang', ['id_stnkhilang' => $id])->row_array();
        $data = [
            'an_stnk' => $query['a/n_stnk'],
            'alamat_stnk' => $query['alamat_stnk'],
            'jenis_kendaraan' => $query['jenis_kendaraan'],
            'type_kendaraan' => $query['type_kendaraan'],
            'nomor_mesin' => $query['nomor_mesin'],
            'nomor_rangka' => $query['nomor_rangka'],
            'status' =>    $query['status'],
        ];
        echo json_encode($data);
    }

    public function changePlat($id)
    {
        var_dump($id);
        die;
        $data['title'] = 'Edit Plat';
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/plat/edit');
        $this->load->view('layouts/footer');
    }

    public function destroy()
    {
        $id = $this->input->post('id');
        $this->db->delete('tbl_stnkhilang', ['id_stnkhilang' => $id]);
        echo json_encode('success');
    }
}
