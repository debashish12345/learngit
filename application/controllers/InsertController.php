<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertController extends CI_Controller {
	
    public function __construct()
	{
		parent::__construct();
		$this->load->model('CommonModel');
	}


	public function index()
	{
		$this->load->view('form.php');

	}
    
    public function Insert()
	{
	    $submit = $this->input->post('submit');
		if($submit == 'Submit') {
        $config['upload_path']          = './add_mypic/';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
         if ( ! $this->upload->do_upload('image'))
                {
                    echo "You must be fixed the erroe problem!!!";
                }
                else
                {
                   $image_path_include =$this->upload->data();
                   $image_path=base_url("add_mypic/".$image_path_include['file_name']);
		$data=array(
                     
                     'name'=>$this->input->post('name'),
                     'email'=>$this->input->post('email'),
                     'phone'=>$this->input->post('phone'),
                     'image'=> $image_path
		);
		
        $tableName='insert_table';
        $received=$this->CommonModel->insert($tableName,$data);
        if($received)
        {

        //$this->load->view('welcome_message');
        $this->session->set_flashdata("addcategory_success", "Added Successfully.");
        redirect('Welcome/index','refresh');
        }
        else
        {
        	$this->load->view('form');
        }
	}
  }
 }

        public function Update($user_data) {

	 	$user_data=$this->uri->segment(2);
	 	$this->db->where('id',$user_data);
	    $sql=$this->db->get('insert_table')->result();
	    $received['datas'] = json_decode(json_encode($sql), True);
		$this->load->view('updateForm',$received);

	    $submit = $this->input->post('submit');
	 	if($submit == 'Submit') {

	 	$config['upload_path']          = './update_mypic/';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
         if ( ! $this->upload->do_upload('image'))
                {
                    echo "You must be fixed the error problem!!!";
                }
                else
                {
                   $image_path_include =$this->upload->data();
                   $image_path=base_url("update_mypic/".$image_path_include['file_name']);
		$data=array(
                     
                     'name'=>$this->input->post('name'),
                     'email'=>$this->input->post('email'),
                     'phone'=>$this->input->post('phone'),
                     'image'=> $image_path
		);
		// echo "<pre>";
		// print_r($data);
		// exit();
        $tableName='insert_table';
        $whereCondition=array('id'=>$user_data);
        $received=$this->CommonModel->update($tableName, $data ,$whereCondition);
        if($received)
        {
              $this->session->set_flashdata("editcategory_success", "Updated Successfully.");
              redirect('Welcome/index','refresh');
          }
        }
	}
}
      
       	public function delete($user_id)
	{
		$user_id=$this->uri->segment(3);
		$tableName='insert_table';
        $whereCondition=array('id'=>$user_id);
        $received=$this->CommonModel->delete($tableName,$whereCondition);
        if($received)
        {
              $this->session->set_flashdata("deletecategory_success", "Deleted Successfully.");
              redirect('Welcome/index','refresh');
        }
	}

	   	public function view($user_id)
	{
		$user_id=$this->uri->segment(2);
        // print_r($user_id);
        // exit();
        $this->db->where('id',$user_id);
        $sql=$this->db->get('insert_table')->result();
        $received['datas'] = json_decode(json_encode($sql), True);
        $this->load->view('view_message',$received);
	}
}
