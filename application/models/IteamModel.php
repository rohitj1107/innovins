<?php
class IteamModel extends CI_Model{
	function iteamList(){
		$hasil=$this->db->get('iteam');
		return $hasil->result();
	}
	function saveIteam(){
		$data = array(				
				'product_name' 	=> $this->input->post('product_name'), 
				'price' 		=> $this->input->post('price'), 
				'description' 	=> $this->input->post('description')
			);
		$result=$this->db->insert('iteam',$data);
		return $result;
	}
	function updateIteam(){
		$id=$this->input->post('id');
		$product_name=$this->input->post('product_name');
		$price=$this->input->post('price');
		$description=$this->input->post('description');
		$this->db->set('product_name', $product_name);
		$this->db->set('price', $price);
		$this->db->set('description', $description);
		$this->db->where('id', $id);
		$result=$this->db->update('iteam');
		return $result;	
	}
	function deleteIteam(){
		$id=$this->input->post('id');
		$this->db->where('id', $id);
		$result=$this->db->delete('iteam');
		return $result;
	}	
}