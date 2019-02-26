<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		$this->load->model('CommonModel');
	}

	public function index()
	{
		//just for pagination  (start)
	$this->load->library('pagination');
	$config['base_url'] = 'http://localhost/myprojects/Welcome/index/';
    $config['total_rows'] =$this->db->get('insert_table')->num_rows();

    $config['full_tag_open']="<ul class='pagination'>";
    $config['full_tag_close']="</ul>";

    $config['next_tag_open']="<li>";
    $config['next_tag_close']="</li>";

    $config['prev_tag_open']="<li>";
    $config['prev_tag_close']="</li>";

    $config['num_tag_open']="<li>";
    $config['num_tag_close']="</li>";

    $config['cur_tag_open']="<li class='active'><a>";
    $config['cur_tag_close']="</a></li>";

    $config['per_page'] = 3;
    $this->pagination->initialize($config);
    $store['datas']= $this->CommonModel->see_articles($config['per_page'],$this->uri->segment(3));
    $this->load->view('welcome_message',$store);
   // just for pagination  (End)
	}
    public function changeStatus()
    {
        $id = $this->input->post('userId');
        $changeStatus = $this->input->post('changeStatusTo');
        if(($id != '') && ($changeStatus != '')) {
           $whereCondition = array('id'=>$id);
           $tablename='insert_table';
           $data = array('status'=>$changeStatus);
           $data = $this->CommonModel->update($tablename,$data,$whereCondition);
        if($data == 1 || $data == '1') {
               echo "success";die;
         }
        else{
               echo "failed";die;
         }
      }
    }
}




