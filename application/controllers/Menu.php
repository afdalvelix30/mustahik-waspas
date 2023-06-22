<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->model('Menu_model', 'menu');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function mustahik()
    {
        $data['title'] = 'Data Mustahik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mustahik'] = $this->db->get('dt_mustahik')->result_array();

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ttl', 'TTL', 'required');
        $this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('status_pernikahan', 'Status Pernikahan', 'required');
        $this->form_validation->set_rules('jml_tanggungan', 'Jumlah Tanggungan', 'required');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');
        $this->form_validation->set_rules('muallaf', 'Muallaf', 'required');
        $this->form_validation->set_rules('kader_non_kader', 'Kader Non Kader', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('kelurahan_desa', 'Kelurahan Desa', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kota_kabupaten', 'Kota Kabupaten', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/dt_mustahik', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nama_panggilan' => $this->input->post('nama_panggilan'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'ttl' => $this->input->post('ttl'),
                'alamat_rumah' => $this->input->post('alamat_rumah'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'agama' => $this->input->post('agama'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'status_pernikahan' => $this->input->post('status_pernikahan'),
                'jml_tanggungan' => $this->input->post('jml_tanggungan'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'muallaf' => $this->input->post('muallaf'),
                'kader_non_kader' => $this->input->post('kader_non_kader'),
                'no_hp' => $this->input->post('no_hp'),
                'kelurahan_desa' => $this->input->post('kelurahan_desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kota_kabupaten' => $this->input->post('kota_kabupaten'),
                'provinsi' => $this->input->post('provinsi'),
                'tgl_registrasi' => time()
            ];
            $this->db->insert('dt_mustahik', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kriteria berhasil ditambahkan!</div>');
            redirect('menu/mustahik');
        }
    }

    public function edit_mustahik()
    {
        $data['title'] = 'Data Mustahik';

        $id_mustahik = $this->input->post('id_mustahik');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mustahik'] = $this->db->get('dt_mustahik')->result_array();
        $data['m'] = $this->db->get_where('dt_mustahik', ['id_mustahik' => $id_mustahik])->row_array();

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ttl', 'TTL', 'required');
        $this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('status_pernikahan', 'Status Pernikahan', 'required');
        $this->form_validation->set_rules('jml_tanggungan', 'Jumlah Tanggungan', 'required');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required');
        $this->form_validation->set_rules('muallaf', 'Muallaf', 'required');
        $this->form_validation->set_rules('kader_non_kader', 'Kader Non Kader', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('kelurahan_desa', 'Kelurahan Desa', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kota_kabupaten', 'Kota Kabupaten', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/dt_kriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nama_panggilan' => $this->input->post('nama_panggilan'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'ttl' => $this->input->post('ttl'),
                'alamat_rumah' => $this->input->post('alamat_rumah'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'agama' => $this->input->post('agama'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'status_pernikahan' => $this->input->post('status_pernikahan'),
                'jml_tanggungan' => $this->input->post('jml_tanggungan'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'muallaf' => $this->input->post('muallaf'),
                'kader_non_kader' => $this->input->post('kader_non_kader'),
                'no_hp' => $this->input->post('no_hp'),
                'kelurahan_desa' => $this->input->post('kelurahan_desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kota_kabupaten' => $this->input->post('kota_kabupaten'),
                'provinsi' => $this->input->post('provinsi'),
                'tgl_registrasi' => time()
            ];
            $this->db->where('id_mustahik', $id_mustahik);
            $this->db->update('dt_mustahik', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kriteria berhasil diubah!</div>');
            redirect('menu/mustahik');
        }
    }

    public function delete_mustahik()
    {
        $id_mustahik = $this->input->post('id_mustahik');

        $data['mustahik'] = $this->db->get('dt_mustahik')->result_array();
        $this->menu->delete_mustahik($id_mustahik);
        redirect('menu/mustahik');
    }

    public function penilaianmustahik()
    {
        $data['title'] = 'Penilaian Mustahik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penilaian'] = $this->db->get('dt_mustahik_nilai')->result_array();
        $data['mustahik'] = $this->db->get('dt_mustahik')->result_array();
        // $data['m'] = $this->db->get_where('dt_mustahik', ['id_mustahik' => $id_mustahik])->row_array();

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/dt_mustahikpenilaian', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap')
            ];
            $this->db->insert('dt_mustahik', $data);
        }
    }


    public function kriteria()
    {
        $data['title'] = 'Data Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kriteria'] = $this->db->get('dt_kriteria')->result_array();

        $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required');
        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/dt_kriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'nama_kriteria' => $this->input->post('nama_kriteria')
            ];
            $this->db->insert('dt_kriteria', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kriteria berhasil ditambahkan!</div>');
            redirect('menu/kriteria');
        }
    }

    public function edit_kriteria()
    {
        $data['title'] = 'Data Kriteria';

        $id_kriteria = $this->input->post('id_kriteria');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kriteria'] = $this->db->get('dt_kriteria')->result_array();
        $data['k'] = $this->db->get_where('dt_kriteria', ['id_kriteria' => $id_kriteria])->row_array();

        $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required');
        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/dt_kriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'nama_kriteria' => $this->input->post('nama_kriteria')
            ];
            $this->db->where('id_kriteria', $id_kriteria);
            $this->db->update('dt_kriteria', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kriteria berhasil diubah!</div>');
            redirect('menu/kriteria');
        }
    }

    public function delete_kriteria()
    {
        $id_kriteria = $this->input->post('id_kriteria');

        $data['kriteria'] = $this->db->get('dt_kriteria')->result_array();
        $this->menu->delete_kriteria($id_kriteria);
        redirect('menu/kriteria');
    }

    public function subkriteria()
    {
        $data['title'] = 'Data Sub Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kriteria'] = $this->db->get('dt_kriteria')->result_array();

        $this->form_validation->set_rules('id_kriteria', 'Id Kriteria', 'required');
        $this->form_validation->set_rules('nama_sub_kriteria', 'Nama Sub Kriteria', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/dt_kriteriasub', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kriteria' => $this->input->post('id_kriteria'),
                'nama_sub_kriteria' => $this->input->post('nama_sub_kriteria'),
                'nilai' => $this->input->post('nilai')
            ];
            $this->db->insert('dt_kriteria_sub', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data sub kriteria berhasil ditambahkan!</div>');
            redirect('menu/subkriteria');
        }
    }

    public function edit_subkriteria()
    {
        $data['title'] = 'Data Sub Kriteria';

        $id_kriteria = $this->input->post('id_kriteria');
        $id_sub_kriteria = $this->input->post('id_sub_kriteria');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kriteria'] = $this->db->get('dt_kriteria')->result_array();
        $data['ks'] = $this->db->get_where('dt_kriteria_sub', ['id_sub_kriteria' => $id_kriteria])->row_array();

        $this->form_validation->set_rules('id_kriteria', 'Id Kriteria', 'required');
        $this->form_validation->set_rules('nama_sub_kriteria', 'Nama Sub Kriteria', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/dt_kriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kriteria' => $this->input->post('id_kriteria'),
                'nama_sub_kriteria' => $this->input->post('nama_sub_kriteria'),
                'nilai' => $this->input->post('nilai')
            ];
            $this->db->where('id_sub_kriteria', $id_sub_kriteria);
            $this->db->update('dt_kriteria_sub', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kriteria berhasil diubah!</div>');
            redirect('menu/subkriteria');
        }
    }

    public function delete_kriteria_sub()
    {
        $id_sub_kriteria = $this->input->post('id_sub_kriteria');

        $data['kriteria'] = $this->db->get('dt_kriteria')->result_array();
        $this->menu->delete_kriteria_sub($id_sub_kriteria);
        redirect('menu/subkriteria');
    }

    public function hasilperhitungan()
    {
        $data['title'] = 'Hasil Perhitungan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/dt_hasilperhitungan', $data);
        $this->load->view('templates/footer');
    }
}
