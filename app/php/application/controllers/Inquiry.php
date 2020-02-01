<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->helper('text');
        $this->load->library(['form_validation', 'email']);
        $this->load->database();
        $this->load->model('Inquiry_model');
        $this->load->library(['session']);
        $this->load->library('pagination');
    }



	public function index()
    {
         //check session
        $user_session = $this->session->userdata('user_id');

        if($user_session == 0)
        {    
            redirect('index.php/admin');
        } else {

             //ページネーション設定
            $config['base_url']             = base_url('index.php/Inquiry'); //URL
            $config['total_rows']           = count($this->Inquiry_model->get_inquiry_all()); //行数カウン
            $config['per_page']             = 20; //１ページあたりの表示数
            $config['page_query_string']    = TRUE; //クエリーストリング(getパラメータ有効化)
            $config['reuse_query_string']   = TRUE;
            $config['query_string_segment'] = 'page'; //getパラメータ名
            $config['num_links']            = 10; //リンク表示件数
    //        $config['cur_tag_open']         = '<span>';
    //        $config['cur_tag_close']        = '</span>';
            
            $config['first_tag_open']  = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_tag_open']   = '<li>';
            $config['last_tag_close']  = '</li>';

            $config['next_tag_open']   = '<li>';
            $config['next_tag_close']  = '</li>';

            $config['prev_tag_open']   = '<li>';
            $config['prev_tag_close']  = '</li>';

            $config['cur_tag_open']    = '<li class="current"><span>';
            $config['cur_tag_close']   = '</span></li>';

            $config['num_tag_open']    = '<li>';
            $config['num_tag_close']   = '</li>';         
            
            $this->pagination->initialize($config); //初期化
            
            //ページ番号取得
            $page_number = $this->input->get('page', TRUE);
            //NULLの場合（初期ページ）またはページ番号が数値でない場合0を指定
            if(!isset($page_number) || !ctype_digit(strval($page_number)))
            {
                $page_number = 0;
            }
        
            $contact = $this->Inquiry_model->get_inquiry_all($config['per_page'], $page_number);

        
            $data = [
                
                'all_new'          => $contact,
            ];
            $this->load->view('admin/inquiry', $data);
        }

    }

    //view data
    public function details($id = null)
    {
        //check session
        $user_session = $this->session->userdata('user_id');

        if($user_session == 0)
        {    
            redirect('admin');
        } else {

            $url_param  = $this->uri->uri_string();
        
            $query = $this->Inquiry_model->pulldown_details((int)$id);

            //Array
            $data  = [
                'inquire'    => $query['inquire']->row(),
            ];
            
            $this->load->view('admin/details', $data);
        }
    }

    // delete   
    public function delete($id = null)
    {
        $this->Inquiry_model->delete((int)$id);
        redirect(base_url() . 'index.php/inquiry');
    }

    public function logout()
    {
       $this->session->unset_userdata('log_user');
       redirect(base_url() . 'index.php/admin');
    }

}

?>
