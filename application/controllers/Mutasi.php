<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect('/');
        }
    }


    public function index()
    {
        $data['title'] = 'Mutasi';
        $data['data'] = $this->db->get('tbl_mutasi')->result_array();
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/mutasi/index');
        $this->load->view('layouts/footer');
    }

    public function addmutasi()
    {
        $data['title'] = 'Mutasi';
        $this->load->view('layouts/header', $data);
        $this->load->view('admin/mutasi/tambah');
        $this->load->view('layouts/footer');
    }

    public function savemutasi()
    {

        $validtions = [
            [
                'field' => 'nama_stnk',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama STNK tidak boleh kosong'
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
                'field' => 'alamat_baru',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat baru tidak boleh kosong'
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
            $data['title'] = 'Mutasi';
            $this->load->view('layouts/header', $data);
            $this->load->view('admin/mutasi/tambah');
            $this->load->view('layouts/footer');
        } else {
            // id pendaftaran
            $tahun = date('Y');
            $cekIsi = $this->db->get('tbl_mutasi');
            if ($cekIsi->num_rows() >= 1) {
                $this->db->select_max('id_mutasi');
                $queryLast = $this->db->get('tbl_mutasi');
                $getLastId = $queryLast->row_array();
                $lastId = intval(substr($getLastId['id_mutasi'], -1));
                $newNumber = $lastId + 1;
                $idDaftar = substr($getLastId['id_mutasi'], 0, -1) . $newNumber;
            } else {
                $idDaftar = "MT" . $tahun . "001";
            }

            $data = [
                'id_mutasi' => $idDaftar,
                'nama_stnk' => $this->input->post('nama_stnk'),
                'alamat_stnk' => $this->input->post('alamat_stnk'),
                'alamat_baru' => $this->input->post('alamat_baru'),
                'jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
                'type_kendaraan' => $this->input->post('type_kendaraan'),
                'nomor_mesin' => $this->input->post('nomor_mesin'),
                'nomor_rangka' => $this->input->post('nomor_rangka'),
                'status' => 'proses',
            ];

            $this->db->insert('tbl_mutasi', $data);
            $this->session->set_flashdata('message', 'success');
            redirect('mt');
        }
    }

    public function showmutasi()
    {
        $id = $this->input->post('id');
        $query = $this->db->get_where('tbl_mutasi', ['id_mutasi' => $id])->row_array();
        $data = [
            'nama_stnk' => $query['nama_stnk'],
            'alamat_stnk' => $query['alamat_stnk'],
            'alamat_baru' => $query['alamat_baru'],
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
        $this->db->delete('tbl_mutasi', ['id_mutasi' => $id]);
        echo json_encode('success');
    }
}
