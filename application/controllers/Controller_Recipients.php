<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Recipients extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Recipients';

		$this->load->model('model_recipients');
		$this->load->model('model_section');
	}

	/* 
    * It only redirects to the manage recipients page
    */
	public function index()
	{
		if(!in_array('viewRecipients', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->data['section'] = $this->model_section->getSectionData();

		$this->render_template('recipients/index', $this->data);	
	}

	/*
	* It retrieve the specific Recipients information via a Recipients id
	* and returns the data in json format.
	*/
	public function fetchRecipientsDataById($id) 
	{
		if($id) {
			$data = $this->model_recipients->getRecipientsData($id);
			echo json_encode($data);
		}
	}

	/*
	* It retrieves all the Recipients data from the database 
	* This function is called from the datatable ajax function
	* The data is return based on the json format.
	*/
	public function fetchRecipientsData()
	{
		$result = array('data' => array());

		$data = $this->model_recipients->getRecipientsData();

		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			if(in_array('updateRecipients', $this->permission)) {
				$buttons = '<button type="button" class="btn btn-warning btn-sm" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></button>';
			}

			if(in_array('deleteRecipients', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-danger btn-sm" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}

			$status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['name'],
				$value['email'],
				$value['section'],
				$status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
    * If the validation is not valid, then it provides the validation error on the json format
    * If the validation for each input is valid then it inserts the data into the database and 
    returns the appropriate message in the json format.
    */
	public function create()
	{
		if(!in_array('createRecipients', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'name'    => $this->input->post('name'),
        		'email'   => $this->input->post('email'),
        		'section' => $this->input->post('section'),
        		'active'  => $this->input->post('active'),
        	);

        	$create = $this->model_recipients->create($data);
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Succesfully created';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'Error in the database while creating the brand information';			
        	}
        }
        else {
        	$response['success'] = false;
        	foreach ($_POST as $key => $value) {
        		$response['messages'][$key] = form_error($key);
        	}
        }

        echo json_encode($response);
	}	

	/*
    * If the validation is not valid, then it provides the validation error on the json format
    * If the validation for each input is valid then it updates the data into the database and 
    returns a n appropriate message in the json format.
    */
	public function update($id)
	{
		if(!in_array('updateRecipients', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('edit_email', 'Email', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Active', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'name'    => $this->input->post('edit_name'),
	        		'email'   => $this->input->post('edit_email'),
	        		'section' => $this->input->post('edit_section'),
	        		'active'  => $this->input->post('edit_active'),
	        	);

	        	$update = $this->model_recipients->update($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	/*
	* If checks if the Recipients id is provided on the function, if not then an appropriate message 
	is return on the json format
    * If the validation is valid then it removes the data into the database and returns an appropriate 
    message in the json format.
    */
	public function remove()
	{
		if(!in_array('deleteRecipients', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$Recipients_id = $this->input->post('recipients_id');

		$response = array();
		if($Recipients_id) {
			$delete = $this->model_recipients->remove($Recipients_id);
			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Successfully removed";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the brand information";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}

}