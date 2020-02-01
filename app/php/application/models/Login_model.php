<?php

class Login_model extends CI_Model{
    
    /**
    * ログインチェック
    * @access public
    * @return obj
    */
    public function chk_admin_login()
    {
        //POSTされたユーザーIDとパスワードを照合する
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where("user_name", $this->input->post("username"));
        $this->db->where("user_pass", md5($this->input->post("password")));
        $query = $this->db->get();
        return $query;
    }
    
    
}