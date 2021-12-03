<?php 

class Model_agreements extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getAgreementData($id = null)
	{
		
		if($id) {
			$this->db->where_in('section',$this->groupDept);
			$this->db->where('id',$id);
			// $sql = "SELECT * FROM agreements where id = ?";
			// $query = $this->db->query($sql, array($id));
			$query=$this->db->get('agreements');
			return $query->row_array();
		}

		$this->db->where_in('section',$this->groupDept);
		$query=$this->db->get('agreements');
		return $query->result_array();
	}

	public function getActiveProductData()
	{
		$this->db->where_in('section',$this->groupDept);
		$this->db->where('status','1');
		// $sql = "SELECT * FROM agreements WHERE status = ? ORDER BY id DESC";
		$query = $this->db->get('agreements');
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('agreements', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('agreements', $data);
			return ($update == true) ? true : false;
		}
	}

	public function getSection()
	{
		$sql = $this->db->query('SELECT  DISTINCT(section_cd) AS section FROM section');
		return $sql->result();
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('agreements');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalAgreements()
	{
		$this->db->where_in('section',$this->groupDept);
		$query=$this->db->get('agreements');
		// $sql = "SELECT * FROM agreements";
		// $query = $this->db->query($sql);
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
