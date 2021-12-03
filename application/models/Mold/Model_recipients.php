<?php 

class Model_recipients extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the active store data */
	public function getActiveStore()
	{
		$sql = "SELECT * FROM recipients WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the brand data */
	public function getRecipientsData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM recipients where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM recipients";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('recipients', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('recipients', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('recipients');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalRecipients()
	{
		$sql = "SELECT * FROM recipients WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

}