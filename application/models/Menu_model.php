<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_id_kriteria($id_kriteria)
    {
        return $this->db->get_where('dt_kriteria', ['id_kriteria' => $id_kriteria])->row_array();
    }

    public function edit_kriteria()
    {
        $data = [
            'kode_kriteria' => $this->input->post('kode_kriteria'),
            'nama_kriteria' => $this->input->post('nama_kriteria')
        ];

        $this->db->where('id_kriteria', $this->input->post('id_kriteria'));
        $this->db->update('dt_kriteria', $data);
    }

    public function delete_mustahik($id_mustahik)
    {
        $this->db->where('id_mustahik', $id_mustahik);
        $this->db->delete('dt_mustahik');
    }

    public function delete_kriteria($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->delete('dt_kriteria');
    }

    public function getSubKriteria($id_kriteria)
    {
        $this->db->select('*');
        $this->db->from('dt_kriteria_sub');
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->order_by('nilai', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPenilaianMustahik($id_mustahik)
    {
        $this->db->select('*');
        $this->db->from('dt_mustahik_nilai');
        $this->db->where('id_mustahik', $id_mustahik);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_kriteria_sub($id_sub_kriteria)
    {
        $this->db->where('id_sub_kriteria', $id_sub_kriteria);
        $this->db->delete('dt_kriteria_sub');
    }
}
