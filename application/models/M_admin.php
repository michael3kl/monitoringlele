<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function ubahstatus($id_p)
    {
        $query = $this->db->get_where('tb_pemakai',['id_p' =>$id_p])->row_array();
        $status_pemakai = $query['status'];

        if ($status_pemakai == 1) {
            $object = ['status' => '0'];
            $this->db->where('id_p', $id_p);
            $update = $this->db->update('tb_pemakai', $object);
            
        } else {
            $object = ['status' => '1'];
            $this->db->where('id_p', $id_p);
            $update = $this->db->update('tb_pemakai', $object);
        }
        if ($update) {
            return 1;
        } else {
            return false;
        }
    }

    public function hapuspengguna($id_p)
    {
        $this->db->where('id_p', $id_p);
        $hapus = $this->db->delete('tb_pemakai');
        if ($hapus) {
            return 1;
        } else {
            return false;
        }
    }

    public function ubahpengguna($id_p,$data)
    {
        $this->db->where('id_p', $id_p);
        $ubah = $this->db->update('tb_pemakai', $data);
        if ($ubah) {
            return 1;
        } else {
            return false;
        }
    }

    public function tambahpengguna($data)
    {
        
        $ubah = $this->db->insert('tb_pemakai', $data);
        
        if ($ubah) {
            return 1;
        } else {
            return false;
        }
    }

    public function tambahkelas($data)
    {
        
        $ubah = $this->db->insert('tb_kelas', $data);
        
        if ($ubah) {
            return 1;
        } else {
            return false;
        }
    }

    public function hapuskelas($id_k)
    {
        $this->db->where('id_k', $id_k);
        $hapus = $this->db->delete('tb_kelas');
        if ($hapus) {
            return 1;
        } else {
            return false;
        }
    }

    public function ubahkelas($id_k,$data)
    {
        $this->db->where('id_k', $id_k);
        $ubah = $this->db->update('tb_kelas', $data);
        if ($ubah) {
            return 1;
        } else {
            return false;
        }
    }

    public function ubahsiswa($id_s,$data)
    {
        $this->db->where('id_s', $id_s);
        $ubah = $this->db->update('tb_siswa', $data);
        if ($ubah) {
            return 1;
        } else {
            return false;
        }
    }

    public function ubahmapel($id_m,$data)
    {
        $this->db->where('id_m', $id_m);
        $ubah = $this->db->update('tb_mapel', $data);
        if ($ubah) {
            return 1;
        } else {
            return false;
        }
    }

    public function tambahsiswa($data)
    {
        
        $ubah = $this->db->insert('tb_siswa', $data);
        
        if ($ubah) {
            return 1;
        } else {
            return false;
        }
    }

    public function genpass($id_p,$data)
    {
        $this->db->where('id_p', $id_p);
        $ubah = $this->db->update('tb_pemakai', $data);
        if ($ubah) {
            return 1;
        } else {
            return false;
        }
    }
    
    
    public function ubahjampel($id_jp,$data)
    {
        $this->db->where('id_jp', $id_jp);
        $ubah = $this->db->update('tb_jampel', $data);
        if ($ubah) {
            return 1;
        } else {
            return false;
        }
    }

    public function hapusjampel($id_jp)
    {
        $this->db->where('id_jp', $id_jp);
        $hapus = $this->db->delete('tb_jampel');
        if ($hapus) {
            return 1;
        } else {
            return false;
        }
    }

    public function hapussatumapel($id_m)
    {
        $this->db->where('id_m', $id_m);
        $hapus = $this->db->delete('tb_mapel');
        if ($hapus) {
            return 1;
        } else {
            return false;
        }
    }

    public function tambahjampel($data)
    {
        
        $tambah = $this->db->insert('tb_jampel', $data);
        
        if ($tambah) {
            return 1;
        } else {
            return false;
        }
    }

    public function tambahmapel($data)
    {
        
        $tambah = $this->db->insert('tb_mapel', $data);
        
        if ($tambah) {
            return 1;
        } else {
            return false;
        }
    }

    public function hapussiswa($id_s)
    {
        $this->db->where('id_s', $id_s);
        $hapus = $this->db->delete('tb_siswa');
        if ($hapus) {
            return 1;
        } else {
            return false;
        }
    }

    public function ubahinstansi($data)
    {
        
        $ubah = $this->db->update('tb_instansi', $data);
        if ($ubah) {
            return 1;
        } else {
            return false;
        }
    }


}

/* End of file M_admin.php */
