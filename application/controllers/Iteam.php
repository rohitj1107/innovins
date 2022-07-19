<?php
class Iteam extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('IteamModel');
	}
	function index(){
		$this->load->view('listIteam');
	}
	function show(){
		$data=$this->IteamModel->IteamList();
		echo json_encode($data);
	}
	function save(){
		$data=$this->IteamModel->saveIteam();
		echo json_encode($data);
	}
	function update(){
		$data=$this->IteamModel->updateIteam();
		echo json_encode($data);
	}
	function delete(){
		$data=$this->IteamModel->deleteIteam();
		echo json_encode($data);
	}
}