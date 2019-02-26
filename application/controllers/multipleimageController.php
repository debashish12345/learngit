<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class multipleimageController extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		$this->load->model('CommonModel');
	}

	public function index()
	{
        $submit=$this->input->post('submit');
        if($submit == 'Submit')
        {
        	$filesCount = count($_FILES['files']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                
                $config['upload_path'] = './multiple_images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('file')){
                    $fileData = $this->upload->data();
                    $status=1;
                    $image_path=base_url("multiple_images/".$fileData['file_name']);
                    $data=array(
                       'image'=>$image_path,
                       'status'=>$status
                    );
                    $tableName='multiple_image';
                    $this->CommonModel->insert($tableName,$data);
          }
            
             }
	             }
	$this->load->view('multipleimage');
}
}
