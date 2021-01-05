<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        
        // Load the captcha helper
        $this->load->helper('captcha');
        $this->load->model('task_model');
    }

    public function index()
    {

     /*  $data = array();
        $data['metaDescription'] = 'Build Captcha in CodeIgniter using Captcha Helper';
        $data['metaKeywords'] = 'Build Captcha in CodeIgniter using Captcha Helper';
        $data['title'] = "Build Captcha in CodeIgniter using Captcha Helper - TechArise";
        $data['breadcrumbs'] = array('Build Captcha in CodeIgniter using Captcha Helper' => '#');
        // If captcha form is submitted
        if($this->input->post('submit')) {
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if($inputCaptcha === $sessCaptcha){
                $data['msg'] = '<div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Captcha code matched.
                </div>';
            }else{
                 $data['msg'] = '<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Failed!</strong> Captcha does not match, please try again.
                </div>  ';
            }
        }
        // Captcha configuration
        $config = array(
            'img_path'      => 'assets/uploads/captcha_images/',
            'img_url'       => base_url().'assets/uploads/captcha_images/',
            'font_path'     => 'index.php/system/fonts/texb.ttf',
            'img_width'     => 170,
            'img_height'    => 55,
            'expiration'    => 7200,
            'word_length'   => 6,
            'font_size'     => 25,
            'colors'        => array(
                'background' => array(171, 194, 177),
                'border' => array(10, 51, 11),
                'text' => array(0, 0, 0),
                'grid' => array(185, 234, 237)
            )
        );
       $captcha = create_captcha($config);
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        // Pass captcha image to view
        $data['captchaImg'] = $captcha['image'];
        // Load the view
        $this->load->view('index.php', $data);*/


       $data['tasks'] = $this->task_model->get_tasks();
        $this->load->view('index', $data);
    }
    
    


    public function create_task(){
        $this->task_model->create_task();
    }
   /*public function send_mail() { 
         $from_email = "kowsisamritha@gmail.com"; 
         $to_email = $this->input->post('email'); 
   
         //Load email library 
         $this->load->library('email', $config); 
   
         $this->email->from($from_email, 'Your Name'); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
         $this->email->message('Testing the email class.'); */

    public function update_task(){
        $this->task_model->update_task();
    }

    public function delete_task(){
        $this->task_model->delete_task();
    }



    
    private function sendEmail($mailData){
        $this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');
        $to = $this->input->post('to');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        // Send email & return status
        return $this->email->send()?true:false;
    }
    
}

            




