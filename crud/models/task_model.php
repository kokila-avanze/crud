<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

        public $name;
        public $description;
        public $language_known;
        public $qualification;
        public $email;
        public $file_upload;




        public function get_tasks()
        {
                $query = $this->db->get('tasks');
                return $query->result();
        }


         /*public function index(){
        $data = array();
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
        $this->load->view('index.php', $data);
    }
    // refresh
    public function refresh(){
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
                'background' => array(171, 194, 177 ),
                'border' => array(10, 51, 115),
                'text' => array(0, 0, 0),
                'grid' => array(185, 234, 237)
            )
        );
        $captcha = create_captcha($config);
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        // Display captcha image
        echo $captcha['image'];
    }*/



       


       
        public function create_task()
        {
                $json = array();
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');
               // $this->form_validation->set_rules('language_known', 'Languages known', 'required');
               //$this->form_validation->set_rules('qualification', 'Qualification', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

                
            if($this->form_validation->run()){
                        $this->name  = $this->input->post('name'); // please read the below note
                        $this->description  = $this->input->post('description');
                       $this->language_known = $this->input->post('language_known');
                     /*   $this->java  = $this->input->post('java');
                        $this->c  = $this->input->post('c');
                        $this->html  = $this->input->post('html');*/


                        $this->email  = $this->input->post('email');


 

                        $this->qualification  = $this->input->post('quali');
                        $this->file_upload  = $this->input->post('file_upload');
                        // $this->task_model->send($this->input->post('email'));
                           //$send = $this->sendEmail($mailData);

                          $res = $this->db->insert('tasks', $this);
                        if($res){
                                $insert_id = $this->db->insert_id(); 
                                $json = array(
                                        'type' => 'success',
                                        'message' => $this->db->get_where('tasks', ['id' => $insert_id])->row_array()
                                );
                        } else {
                                $json = array(
                                        'type' => 'error',
                                        'message' => 'Sorry! Cannot Insert the Task'
                                );
                        }
                } else{
                        $json = array(
                                'type' => 'error',
                                'message' => validation_errors()
                        );
                }
                header('Content-Type: application/json');
                echo json_encode($json);
        }

        public function update_task()
        {
                $json = array();
              /*  $this->form_validation->set_rules('task_id', 'ID', 'required');
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');*/
                




             if($this->form_validation->run()){
                        $id                    = $this->input->post('task_id');
                        $data['name']          = $this->input->post('name');
                        $data['description']   = $this->input->post('description');
                        $data['language_known']   = $this->input->post('language_known');
                       
                        $data['qualification']   = $this->input->post('quali');
                        $data['email']   = $this->input->post('email');
                        $data['file_upload']   = $this->input->post('file');

                        $update_id = $this->db->update('tasks', $data, array('id' => $id));
                        if($update_id){
                                $json = array(
                                        'type' => 'success',
                                        'message' => $this->db->get_where('tasks', ['id' => $id])->row_array()
                                );
                        } else {
                                $json = array(
                                        'type' => 'error',
                                        'message' => 'Sorry! Cannot Update the Task'
                                );
                        }
                } else{
                        $json = array(
                                'type' => 'error',
                                'message' => validation_errors()
                        );
                }
                header('Content-Type: application/json');
                echo json_encode($json);
        }

        public function delete_task(){
                $json = array();
                $id = $this->input->post('id');
                if($id > 0){
                        $res = $this->db->delete('tasks', ['id' => $id]);
                        if($res != FALSE){
                                $json = array(
                                        'type' => 'success',
                                        'message' => 'Task Deleted Successfully'
                                );   
                        } else {
                                $json = array(
                                        'type' => 'error',
                                        'message' => 'Sorry! Cannot Delete the Task'
                                );                                  
                        }    
                } else{
                        $json = array(
                                'type' => 'error',
                                'message' => 'Invalid ID'
                        );   
                }
                header('Content-Type: application/json');
                echo json_encode($json);
        }


}