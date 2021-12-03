<?php 

class Model_products extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getProductData($id = null)
	{
		
		if($id) {
			$this->db->where('id',$id);
			$this->db->where_in('store_id',$this->groupWH);
			
			$query = $this->db->get("products");
			return $query->row_array();
		}

		
		$this->db->where_in('store_id',$this->groupWH);		
		$query = $this->db->get('products');
		return $query->result_array();
	}

	public function getCurrentStock($id = null)
	{
		
		if($id) {
			$this->db->where('id',$id);
			$this->db->where('availability','1');
			$this->db->where_in('store_id',$this->groupWH);
			// $sql = "SELECT * FROM products where id = ? and availability = 1";
			$query = $this->db->get('products');
			return $query->row_array();
		}

		$this->db->where('availability','1');
		$this->db->where_in('store_id',$this->groupWH);
		// $sql = "SELECT * FROM products where id = ? and availability = 1";
		// $query = $this->db->get('products');
		// $sql = "SELECT * FROM products where availability = 1 ORDER BY id DESC";
		$query = $this->db->get('products');
		return $query->result_array();
	}

	public function getActiveProductData()
	{
		$sql = "SELECT * FROM products WHERE availability = ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('products', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('products', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('products');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalProducts()
	{
		$this->db->where_in('store_id',$this->groupWH);
		$sql = "SELECT * FROM products";
		$query = $this->db->get('products');
		return $query->num_rows();
	}


	public function countTotalbrands()
	{
		$sql = "SELECT * FROM brands";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function countTotalcategory()
	{
		$sql = "SELECT * FROM categories";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}


	public function countTotalattribures()
	{
		$sql = "SELECT * FROM attributes";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function countLowQty()
	{
		// $this->db->where_in('store_id',$this->groupWH);	
		$string = implode(',', $this->groupWH);
		
		$sql = 'SELECT * FROM products where qty <= min_qty+1 and qty > 0 and availability = 1 and store_id IN ('.$string.')';
		$query = $this->db->query($sql,$this->groupWH);
		return $query->num_rows();
	}

	public function countEmptyQty()
	{
		$string = implode(',', $this->groupWH);

		$sql = "SELECT * FROM products where qty =0 and availability = 1 and store_id IN (".$string.")";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

}