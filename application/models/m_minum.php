<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_minum extends CI_Model {
    public function tampil()
    {
        $tm_minum=$this->db
                      ->join('kategori','kategori.id_kategori=minum.id_kategori')
                      ->get('minum')
                      ->result();
        return $tm_minum;
    }
    public function data_kategori()
    {
        return $this->db->get('kategori')
                        ->result();
    }
    public function simpan_minum($file_cover)
    {
        if ($file_cover=="") {
             $object = array(
                'id_minum' => $this->input->post('id_minum'), 
                'nama_minum' => $this->input->post('nama_minum'),                 
                'id_kategori' => $this->input->post('id_kategori'), 
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok')
             );
        }else{
            $object = array(
                'id_minum' => $this->input->post('id_minum'), 
                'nama_minum' => $this->input->post('nama_minum'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'foto_cover' => $file_cover
             );
        }
        return $this->db->insert('minum', $object);
    }
    public function detail($a)
    {
        $tm_minum=$this->db
                      ->join('kategori', 'kategori.id_kategori=minum.id_kategori')
                      ->where('id_minum', $a)
                      ->get('minum')
                      ->row();
        return $tm_minum;
    }
    public function edit_minum()
    {
        $data = array(
                'id_minum' => $this->input->post('id_minum'), 
                'nama_minum' => $this->input->post('nama_minum'), 
                'id_kategori' => $this->input->post('id_kategori'), 
                'stok' => $this->input->post('stok'), 
                'harga' => $this->input->post('harga'), 
            );

        return $this->db->where('id_minum', $this->input->post('id_minum_lama'))
                        ->update('minum', $data);
    }
    public function edit_minum_dengan_foto($file_cover)
    {
        $data = array(
                'id_minum' => $this->input->post('id_minum'), 
                'nama_minum' => $this->input->post('nama_minum'),                 
                'id_kategori' => $this->input->post('id_kategori'), 
                'stok' => $this->input->post('stok'), 
                'harga' => $this->input->post('harga'),               
                'foto_cover' => $file_cover
            );

        return $this->db->where('id_minum', $this->input->post('id_minum_lama'))
                        ->update('minum', $data);
    }
    public function hapus_minum($id_minum='')
    {
        return $this->db->where('id_minum', $id_minum)
                    ->delete('minum');
    }
    

}

/* End of file M_minum.php */
/* Location: ./application/models/M_minum.php */