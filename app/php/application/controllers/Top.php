<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Top extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library(['form_validation', 'email']);
        $this->load->database();
        $this->load->model('Inquiry_model');
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('top');
		$this->load->view('footer');
	}

	public function send()
    {
        $data = [
            'name' 		=> $this->input->post('name'),
            'email' 	=> $this->input->post('email'),
            'msg' 		=> $this->input->post('msg'),
        ];
        $this->load->library('parser');
        $message = $this->parser->parse('template/inquiry', $data, TRUE);
        $cs_mail = $this->parser->parse('template/customer_inquiry', $data, TRUE);

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['wordwrap'] = TRUE;

        $customer_mail = $this->input->post('email');
        $this->email->from('no_reply@ad-kit.co.jp');
        $this->email->to('kim.a.villar@ad-kit.co.jp');
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc($customer_mail);
        $this->email->subject('CareerDirect');
        $this->email->message($message);
        $email = $this->email->send();

        if ($email == TRUE)
        {
            //問合せ者への受け付け確認メール
            $this->email->from('no-reply@ad-kit.co.jp');
            $this->email->to($customer_mail);
            $this->email->subject(' Inquiry from ' . $this->input->post('name'));
            $this->email->message($cs_mail);
            $this->email->send();
            $this->Inquiry_model->inquiry_insert();
            redirect('index.php/top');

       	}
   	}
}
