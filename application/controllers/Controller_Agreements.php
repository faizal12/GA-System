<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Agreements extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Agreements';

		$this->load->model('model_agreements');
		$this->load->model('model_brands');
		$this->load->model('model_category');
		$this->load->model('model_stores');
		$this->load->model('model_attributes');
	}

    /* 
    * It only redirects to the manage product page
    */
	public function index()
	{
        if(!in_array('viewProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->render_template('agreements/index', $this->data);	
	}

    /*
    * It Fetches the products data from the product table 
    * this function is called from the datatable ajax function
    */
	public function fetchAgreementData()
	{
		$result = array('data' => array());

		$data = $this->model_agreements->getAgreementData();

		foreach ($data as $key => $value) {

            // $store_data = $this->model_stores->getStoresData($value['store_id']);
			// button
            $buttons = '';
            if(in_array('updateAgreement', $this->permission)) {
    			$buttons .= '<a href="'.base_url('Controller_Agreements/update/'.$value['id']).'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>';
            }

            if(in_array('deleteAgreement', $this->permission)) { 
    			$buttons .= ' <button type="button" class="btn btn-danger btn-sm" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }
			

			// $img = '<img src="'.base_url($value['image']).'" alt="'.$value['name'].'" class="img-circle" width="50" height="50" />';
            $file = '<a href="'.base_url($value['file']).'" target="_blank" >'.$value['name'].'</a>';

            $status = ($value['status'] == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>';

            // $qty_status = '';
            // if($value['qty'] <= 0) {
            //     $qty_status = '<span class="badge badge-danger">Out of stock !</span>';
            // } else if($value['qty'] <= 10) {
            //     $qty_status = '<span class="badge badge-warning">Low !</span>';
            // }


			$result['data'][$key] = array(
				$file,
				$value['name'],
				$value['supplier'],
				$value['start'],
				$value['end'],
                $value['section'],
				$status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}	

    /*
    * If the validation is not valid, then it redirects to the create page.
    * If the validation for each input field is valid then it inserts the data into the database 
    * and it stores the operation message into the session flashdata and display on the manage product page
    */
	public function create()
	{
        // echo 'came';
        // exit();
		if(!in_array('createAgreement', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('agreement_name', 'Agreement name', 'trim|required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {
            // true case
        	$upload_file = $this->upload_file();

        	$data = array(
        		'name'        => $this->input->post('agreement_name'),
        		'supplier'    => $this->input->post('supplier'),
        		'file'        => $upload_file,
        		'description' => $this->input->post('description'),
        		'start'       => $this->input->post('start'),
        		'end'         => $this->input->post('end'),
        		'reminder'    => $this->input->post('reminder'),
        		'section'     => $this->input->post('section'),
        		'status'      => $this->input->post('status'),
        	);

        	$create = $this->model_agreements->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('Controller_Agreements/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('Controller_Agreements/create', 'refresh');
        	}
        }
        else {
            // false case

        	// attributes 
        	$attribute_data = $this->model_attributes->getActiveAttributeData();

        	$attributes_final_data = array();
        	foreach ($attribute_data as $k => $v) {
        		$attributes_final_data[$k]['attribute_data'] = $v;

        		$value = $this->model_attributes->getAttributeValueData($v['id']);

        		$attributes_final_data[$k]['attribute_value'] = $value;
        	}

        	$this->data['attributes'] = $attributes_final_data;
			$this->data['brands'] = $this->model_brands->getActiveBrands();        	
			$this->data['category'] = $this->model_category->getActiveCategroy();        	
			$this->data['stores'] = $this->model_stores->getActiveStore(); 
            
            $this->data['section'] = $this->model_agreements->getSection();     

            $this->render_template('agreements/create', $this->data);
        }	
	}

    /*
    * This function is invoked from another function to upload the image into the assets folder
    * and returns the image path
    */
	public function upload_file()
    {
    	// assets/images/product_image
        $config['upload_path'] = 'assets/images/agreement_file';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '10000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('agreement_file'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['agreement_file']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }

    /*
    * If the validation is not valid, then it redirects to the edit product page 
    * If the validation is successfully then it updates the data into the database 
    * and it stores the operation message into the session flashdata and display on the manage product page
    */
	public function update($agreement_id)
	{      
        if(!in_array('updateProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        if(!$agreement_id) {
            redirect('dashboard', 'refresh');
        }
        $this->form_validation->set_rules('agreement_name', 'Agreement name', 'trim|required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            
            $data = array(
        		'name'        => $this->input->post('agreement_name'),
        		'supplier'    => $this->input->post('supplier'),
        		'description' => $this->input->post('description'),
        		'start'       => $this->input->post('start'),
        		'end'         => $this->input->post('end'),
        		'reminder'    => $this->input->post('reminder'),
        		'section'     => $this->input->post('section'),
        		'status'      => $this->input->post('status'),
        	);

            
            if($_FILES['agreement_file']['size'] > 0) {
                $upload_file = $this->upload_file();
                $upload_file = array('file' => $upload_file);
                print_r($upload_file);
                $this->model_agreements->update($upload_file, $agreement_id);
            }

            $update = $this->model_agreements->update($data, $agreement_id);
            if($update == true) {
                $this->session->set_flashdata('success', 'Successfully updated');
                redirect('Controller_Agreements/', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('Controller_Agreements/update/'.$agreement_id, 'refresh');
            }
        }
        else {
            // attributes 
            $attribute_data = $this->model_attributes->getActiveAttributeData();

            $attributes_final_data = array();
            foreach ($attribute_data as $k => $v) {
                $attributes_final_data[$k]['attribute_data'] = $v;

                $value = $this->model_attributes->getAttributeValueData($v['id']);

                $attributes_final_data[$k]['attribute_value'] = $value;
            }
            
            // false case
            $this->data['attributes'] = $attributes_final_data;
            $this->data['brands']     = $this->model_brands->getActiveBrands();
            $this->data['category']   = $this->model_category->getActiveCategroy();
            $this->data['stores']     = $this->model_stores->getActiveStore();

            $this->data['section'] = $this->model_agreements->getSection();   

            $agreement_data               = $this->model_agreements->getAgreementData($agreement_id);
            $this->data['agreement_data'] = $agreement_data;
            $this->render_template('agreements/edit', $this->data); 
        }   
	}

    /*
    * It removes the data from the database
    * and it returns the response into the json format
    */
	public function remove()
	{
        if(!in_array('deleteProduct', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
        $product_id = $this->input->post('product_id');

        $response = array();
        if($product_id) {
            $delete = $this->model_agreements->remove($product_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed"; 
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the product information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response);
	}

}