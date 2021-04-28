<?php

class Consts
{
    private $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->setConstants();
    }

    private function setConstants()
    {
        $this->CI->db->like('name', 'config');
        $query = $this->CI->db->get('options');
        foreach ($query->result() as $row) {
            define($row->name, $row->value);
        }

        $this->CI->db->like('name', 'email_footer');
        $query = $this->CI->db->get('options');
        foreach ($query->result() as $row) {
            define($row->name, $row->value);
        }
        return;
    }
}

?>