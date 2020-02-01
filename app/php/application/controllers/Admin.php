<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function  __construct() {
        parent::__construct();
        $this->load->helper(['url', 'form', 'html', 'text', 'date']);
        $this->load->database();
        $this->load->model('Login_model');
        $this->load->library(['session', 'form_validation']);
    }    

    function index(){
        
        $this->load->view('admin/login');

    }

    //user: admin
    //pass: T98aYhK37e

    public function login_validation()
    {

        //validation
        $this->login_valid();
        
        if($this->form_validation->run())
        {
            
            //true
            redirect(base_url() . "index.php/inquiry");
        
        }
        else
        {
            //false
            redirect(base_url() . "index.php/admin");
        }

    }

     /**
    * 記事登録/更新のバリデーションセット
    * @access private
    * @return void
    */

    private function login_valid()
    {
        //ルールセット
        $this->form_validation->set_rules("username", "Username", "required|trim|callback_validate_credentials");
        $this->form_validation->set_rules("password", "Password", "required|trim");
        //エラーメッセージ設定
        $this->form_validation->set_message('required', 'Please fill the required fields.');
        return;
    }

    /**
    * ユーザーマスタ存在チェック
    * @access public
    * @return bool
    */

    public function validate_credentials()
    {

            //check admin
        $user_credentials = $this->Login_model->chk_admin_login();
        
        if($user_credentials->num_rows() == 1)
        {
            $this->session->set_userdata(
                [
                    'user_id'      => $user_credentials->row()->user_id,
                    'user_name'    => $user_credentials->row()->user_name,
                ]
            );
            return true;
        }
        else
        {
            $this->form_validation->set_message("validate_credentials", "Username or Password is invalid.");
            return false;
        }


    }

    
}