<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 問い合わせフォームからのデータを処理
*
* @access public
* @author Kim Villar
* @copyright ad-kit All Rights Reserved
* @category Career Direct
* @package model
*/

class Inquiry_model extends CI_Model {

    /*
    * 問い合わせ情報の登録
    */

    public function inquiry_insert()
    {
        $data = [
            'inquiry_address'       => $this->input->post('address'),
            'inquiry_name'          => $this->input->post('name'),
            'inquiry_furi'          => $this->input->post('furi'),
            'inquiry_birth'         => $this->input->post('birth'),
            'inquiry_gender'        => $this->input->post('gender'),
            'inquiry_email'         => $this->input->post('email'),
            'inquiry_line'          => $this->input->post('line'),
            'inquiry_phone'         => $this->input->post('phone'),
            'inquiry_job'           => $this->input->post('job'),
            'inquiry_qualification' => $this->input->post('nursery'),
            'inquiry_others'        => $this->input->post('other'),
            'inquiry_question'      => $this->input->post('question'),
            'inquiry_date'          => date('Y-m-d'),
        ];
        $this->db->insert('inquiry', $data);
        return $this->db->insert_id();
    }

    //retrieve all approve data
    public function get_inquiry_all($limit = null, $offset = null)
    {
        //記事一覧取得
        $this->db->select('*');
        $this->db->from('inquiry');
        $this->db->order_by('inquiry_id', 'DESC');
        $this->db->limit($limit);        
        $this->db->offset($offset);        
        $query_result = $this->db->get();
        return $query_result->result();
    }

    // retrieve specific data
    public function pulldown_details($id = null)
    {

        $this->db->select('*');
        $this->db->from('inquiry');
        $this->db->where('inquiry_id', $id);        
        $query['inquire'] =  $this->db->get();
        
        return $query;
    }

    // delete
    public function delete($id = null)
    {
        //delete
        $this->db->where('inquiry_id', $id)->delete('inquiry');
    }
}
