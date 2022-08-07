<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_grafik extends CI_Model {
    function get_data(){
        $query = $this->db->query("SELECT Jumlah_ikan,SUM(Kolam A)  FROM tb_kolam GROUP BY Jumlah_ikan");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}