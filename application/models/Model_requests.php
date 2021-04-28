<?php 

class Model_requests extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the requests data */
	public function getRequestsData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM requests WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM requests ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// get the requests item data
	public function getRequestsItemData($requests_id = null)
	{
		if(!$requests_id) {
			return false;
		}

		$sql = "SELECT * FROM requests_item WHERE requests_id = ?";
		$query = $this->db->query($sql, array($requests_id));
		return $query->result_array();
	}

	public function create()
	{
		$user_id = $this->session->userdata('id');
		$req     = 'REQ-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
		$data    = array(
    		'request_no'  => $req,
    		'date_time'   => strtotime(date('Y-m-d h:i:s a')),
    		'paid_status' => 2,
			'user_id'     => $user_id,
    		'remark'      => $this->input->post('remark')
    	);

		$insert = $this->db->insert('requests', $data);
		$requests_id = $this->db->insert_id();

		$this->load->model('model_products');

		$count_product = count($this->input->post('product'));
    	for($x = 0; $x < $count_product; $x++) {
    		$items = array(
    			'requests_id' => $requests_id,
    			'product_id'  => $this->input->post('product')[$x],
    			'qty'         => $this->input->post('qty')[$x],
    			// 'rate'        => $this->input->post('rate_value')[$x],
    			// 'amount'      => $this->input->post('amount_value')[$x],
    		);

    		$this->db->insert('requests_item', $items);

    		// now decrease the stock from the product
    		$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
    		$qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];

    		$update_product = array('qty' => $qty);


    		$this->model_products->update($update_product, $this->input->post('product')[$x]);
    	}

		return ($requests_id) ? $requests_id : false;
	}

	public function countRequestItem($requests_id)
	{
		if($requests_id) {
			$sql = "SELECT * FROM requests_item WHERE requests_id = ?";
			$query = $this->db->query($sql, array($requests_id));
			return $query->num_rows();
		}
	}

	public function update($id)
	{
		if($id) {
			$user_id = $this->session->userdata('id');
			// fetch the order data 

			$data = array(
	    		'paid_status' => $this->input->post('paid_status'),
	    		'user_id'     => $user_id,
	    		'remark'      => $this->input->post('remark')
	    	);

			$this->db->where('id', $id);
			$update = $this->db->update('requests', $data);

			// now the order item 
			// first we will replace the product qty to original and subtract the qty again
			$this->load->model('model_products');
			$get_order_item = $this->getRequestsItemData($id);
			foreach ($get_order_item as $k => $v) {
				$product_id = $v['product_id'];
				$qty        = $v['qty'];
				// get the product 
				$product_data        = $this->model_products->getProductData($product_id);
				$update_qty          = $qty + $product_data['qty'];
				$update_product_data = array('qty' => $update_qty);
				
				// update the product qty
				$this->model_products->update($update_product_data, $product_id);
			}

			// now remove the order item data 
			$this->db->where('requests_id', $id);
			$this->db->delete('requests_item');

			// now decrease the product qty
			$count_product = count($this->input->post('product'));
	    	for($x = 0; $x < $count_product; $x++) {
	    		$items = array(
	    			'requests_id' => $id,
	    			'product_id'  => $this->input->post('product')[$x],
	    			'qty'         => $this->input->post('qty')[$x],
	    			// 'rate'        => $this->input->post('rate_value')[$x],
	    			// 'amount'      => $this->input->post('amount_value')[$x],
	    		);
	    		$this->db->insert('requests_item', $items);

	    		// now increase the stock from the product
	    		$product_data = $this->model_products->getProductData($this->input->post('product')[$x]);
	    		$qty = (int) $product_data['qty'] - (int) $this->input->post('qty')[$x];

	    		$update_product = array('qty' => $qty);
	    		$this->model_products->update($update_product, $this->input->post('product')[$x]);
	    	}

			return true;
		}
	}

	public function remove($id)
	{
		if($id) {
			$a=0;
			$this->load->model('model_products');
			$get_order_item = $this->getRequestsItemData($id);

			foreach ($get_order_item as $k => $v) {
				$product_id = $v['product_id'];
				$qty        = $v['qty'];
				// get the product 
				$product_data        = $this->model_products->getProductData($product_id);
				$update_qty          = $qty + $product_data['qty'];				
				if($update_qty >= 0){
					$a=$a;
					$update_product_data = array('qty' => $update_qty);
					
					// update the product qty
					$this->model_products->update($update_product_data, $product_id);
				}else{
					$a=$a+1;
				}
			}
			if($a==0){
				$this->db->where('id', $id);
				$delete = $this->db->delete('requests');

				$this->db->where('requests_id', $id);
				$delete_item = $this->db->delete('requests_item');
				$result= ($delete == true && $delete_item) ? true : false;
			}else{
				$result=false;
			}
			
			return $result;
		}
	}

	public function countTotalPaidRequests()
	{
		$sql = "SELECT * FROM requests WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

}