<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard';
		
		$this->load->model('model_agreements');
		$this->load->model('model_requests');
		$this->load->model('model_products');
		$this->load->model('model_orders');
		$this->load->model('model_users');
		$this->load->model('model_stores');
		$this->load->model('model_reminder');
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		

		$this->data['total_reminder']    = $this->model_reminder->countTotalReminder();
		$this->data['total_agreements']    = $this->model_agreements->countTotalAgreements();
		$this->data['total_requests']    = $this->model_requests->countTotalPaidRequests();
		$this->data['total_paid_orders'] = $this->model_orders->countTotalPaidOrders();
		$this->data['total_users']       = $this->model_users->countTotalUsers();
		$this->data['total_stores']      = $this->model_stores->countTotalStores();
		
		$this->data['total_products']   = $this->model_products->countTotalProducts();
		$this->data['total_brands']     = $this->model_products->countTotalbrands();
		$this->data['total_attribures'] = $this->model_products->countTotalattribures();
		$this->data['total_low']        = $this->model_products->countLowQty();
		$this->data['total_empty']      = $this->model_products->countEmptyQty();
		// $this->data['total_stores'] = $this->model_stores->countTotalStores();
		// if(!empty($this->groupWH) ){
		// 	print_r($this->groupWH);
		// }else{
			// print_r($this->groupWH);
		// }
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;
		$this->render_template('dashboard', $this->data);
	}
}