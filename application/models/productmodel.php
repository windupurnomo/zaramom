<?php

class ProductModel extends CI_Model{
	function getProducts($categoryId){
		$q = $this->db->query("select * from product_detail where id_group = $categoryId");
		if($q->num_rows() > 0):
			foreach($q->result() as $row):
					$data[] = $row;
			endforeach;
			return $data;
		else:
			return false;
		endif;
	}
	
	function getMainGallery(){
		$q = $this->db->query("select * from product_picture");
		if($q->num_rows() > 0){
			foreach($q->result() as $row)
					$data[] = $row;
			return $data;
		}
		else return false;
	}
	
	
}

?>
