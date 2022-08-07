<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

    public function tambahjadwal($data_input)
    {
        $input = $this->db->insert('tb_jadwal', $data_input);
        if ($input) {
        	return 1;
        } else {
        	return false;
        }
        
    }
    public function tambahkolam($data)
    {
        $input = $this->db->insert('tb_kolam', $data);
        if ($input) {
        	return 1;
        } else {
        	return false;
        }
        
    }

    public function ubahjadwal($id_j,$data_ubah)
    {
    	$this->db->where('id_j', $id_j);
    	$ubah = $this->db->update('tb_jadwal', $data_ubah);
    	if ($ubah) {
        	return 1;
        } else {
        	return false;
        }
    }

    public function ubahkolam($nama_kolam,$data_ubah)
    {
    	$this->db->where('nama_kolam', $nama_kolam);
    	$ubah = $this->db->update('tb_kolam', $data_ubah);
    	if ($ubah) {
        	return 1;
        } else {
        	return false;
        }
    }

    public function ubahpasswordfarmer($email,$data)
    {
    	$this->db->where('email', $email);
    	$ubah = $this->db->update('tb_pemakai', $data);
    	if ($ubah) {
        	return 1;
        } else {
        	return false;
        }
    }

    public function inputagenda($object)
    {
        $insert = $this->db->insert('tb_agenda', $object);
        if ($insert) {
            return 1;
        } else {
            return false;
        }
        
    }

    public function ubahprofil($email,$data)
    {
        $this->db->where('email', $email);
        $ubah = $this->db->update('tb_pemakai', $data);
        if ($ubah) {
            return 1;
        } else {
            return false;
        }
        
    }

}

/* End of file M_data.php */
