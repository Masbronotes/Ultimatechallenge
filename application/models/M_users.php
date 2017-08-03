<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_users extends CI_Model{
    
    public function insert_user($data){
        $this->db->insert('tbl_users', $data);
    }

    public function update_unixcode($name,$unix_code,$datunix){
      $this->db->where('unix_code', $unix_code);
      $this->db->where('status', 0);

      $this->db->update('tbl_users', $datunix);
    }

    public function checkemail($emailfilter,$datefilter){
    	$id = $this->input->post('id');
        $sql = "SELECT email,COUNT(*) as jumlah
        from tbl_users 
        where email = '$emailfilter' and date(created) = date(now())";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function check(){

    }
}

?>