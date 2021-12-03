<?php 

class Model_Reminder extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getReminderData($id = null)
	{
		if($id) {
			$this->db->where_in('section',$this->groupDept);
			$this->db->where('id',$id);
			// $sql = "SELECT * FROM reminder where id = ?";
			// $query = $this->db->query($sql, array($id));
			$query = $this->db->get('reminder');
			return $query->row_array();
		}
		
		$this->db->where_in('section',$this->groupDept);
			// $sql = "SELECT * FROM reminder where id = ?";
			// $query = $this->db->query($sql, array($id));
		$query = $this->db->get('reminder');
		return $query->result_array();
	}

	public function getActiveProductData()
	{
		$sql = "SELECT * FROM reminder WHERE status = ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getReminderDay()
	{
		$sql = "SELECT * FROM master_day ORDER BY value asc";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getFreq()
	{
		$sql = "SELECT * FROM master_freq ORDER BY value asc";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function create($upload_file)
	{

		$no_agreement = 'RE-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));
		print_r($upload_file);
        $data = array(
        		'no_reminder' => $no_agreement,
        		'title'       => $this->input->post('title'),
        		'date_create' => date('Y-m-d H:i:s'),
        		'file'        => $upload_file,
        		'description' => $this->input->post('description'),
        		'freq'        => $this->input->post('freq'),
        		'reminder'    => $this->input->post('reminder'),
        		'status'      => $this->input->post('status'),
        		'section'      => $this->input->post('section'),
        );
		$insert = $this->db->insert('reminder', $data);
		$reminder_id = $this->db->insert_id();

		$count_product = count($this->input->post('frequent_date'));
    	for($x = 0; $x < $count_product; $x++) {
    		$items = array(
    			'REMINDER_ID'   => $reminder_id,
    			'REMINDER_DT' => $this->input->post('frequent_date')[$x]
    		);

    		$this->db->insert('frequent_dt', $items);

    	}
		$recep = count($this->input->post('recipients'));
    	for($x = 0; $x < $recep; $x++) {
    		$items = array(
    			'REMINDER_ID'   => $reminder_id,
    			'RECEPIENT_ID' => $this->input->post('recipients')[$x]
    		);

    		$this->db->insert('reminder_recepient', $items);

    	}

		return ($insert == true) ? true : false;
		
	}

	public function updateFile($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('reminder', $data);
			return ($update == true) ? true : false;
		}
	}

	public function update( $id)
	{
		$data = array(
			'title'       => $this->input->post('title'),
			'date_create' => date('Y-m-d H:i:s'),
			'description' => $this->input->post('description'),
			'freq'        => $this->input->post('freq'),
			'reminder'    => $this->input->post('reminder'),
			'status'      => $this->input->post('status'),
			'section'      => $this->input->post('section'),
		);
		$this->db->where('id', $id);
		$update = $this->db->update('reminder', $data);

		$this->db->where('REMINDER_ID', $id);
		$delete = $this->db->delete('frequent_dt');
		$count_product = count($this->input->post('frequent_date'));
    	for($x = 0; $x < $count_product; $x++) {
    		$items = array(
    			'REMINDER_ID'   => $id,
    			'REMINDER_DT' => $this->input->post('frequent_date')[$x]
    		);

    		$this->db->insert('frequent_dt', $items);

    	}

		$this->db->where('REMINDER_ID', $id);
		$delete = $this->db->delete('reminder_recepient');
		$recep = count($this->input->post('recipients'));
    	for($x = 0; $x < $recep; $x++) {
    		$items = array(
    			'REMINDER_ID'   => $id,
    			'RECEPIENT_ID' => $this->input->post('recipients')[$x]
    		);

    		$this->db->insert('reminder_recepient', $items);

    	}

		
		return ($update == true) ? true : false;
		
	}

	public function getRecepients($id)
	{
		$query="SELECT id,t.name,email,COUNT(REMINDER_ID) AS CN FROM
		(
		SELECT  a.id,a.name,a.email,b.REMINDER_ID FROM recipients a
		LEFT JOIN `reminder_recepient` b ON b.RECEPIENT_ID=a.id
		WHERE a.active=1 AND REMINDER_ID='".$id."'
		UNION 
		SELECT  a.id,a.name,a.email,'' AS REMINDER_ID FROM recipients a
		WHERE a.active=1
		) t
		GROUP BY id,t.name,email";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function getFrequen($id)
	{
		$sql = $this->db->query("SELECT  * FROM frequent_dt where REMINDER_ID='".$id."' order by REMINDER_DT asc");
		return $sql->result();
	}

	public function getSection()
	{
		$sql = $this->db->query('SELECT  DISTINCT(section) AS section FROM recipients');
		return $sql->result();
	}

	public function remove($id)
	{
		if($id) {
			
			$this->db->where('REMINDER_ID', $id);
			$delete = $this->db->delete('frequent_dt');

			$this->db->where('REMINDER_ID', $id);
			$delete = $this->db->delete('reminder_recepient');

			$this->db->where('id', $id);
			$delete = $this->db->delete('reminder');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalReminder()
	{
		// $sql = "SELECT * FROM reminder";
		// $query = $this->db->query($sql);
		$this->db->where_in('section',$this->groupDept);
		$query = $this->db->get('reminder');
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

}
