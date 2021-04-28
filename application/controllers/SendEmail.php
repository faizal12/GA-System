<?php

defined('BASEPATH') or exit('No direct script access allowed');

class sendEmail extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("model_email");
        $this->load->helper('url');
    }

    public function index()
    {
    }

    function send()
    {

        $now = date('Y-m-d');
        $c=0;
        $sql = $this->db->query('SELECT  DISTINCT(section) AS section FROM agreements');
        foreach ($sql->result() as $row) {

            $dataEmail = array();
            $this->db->where('section', $row->section);
            $this->db->where('email', 0);
            $query = $this->db->get('agreements');
            foreach ($query->result() as $rs) {
                $nama     = $rs->name;
                $supplier = $rs->supplier;
                $start    = $rs->start;
                $end      = $rs->end;
                $desc     = $rs->description;
                $reminder = $rs->reminder;
                $sec      = $rs->section;

                $cek = date('Y-m-d', strtotime('-' . $reminder . ' day', strtotime($end)));

                if ($cek <= $now) {
                    $dataEmail['nama'][]     = $nama;
                    $dataEmail['supplier'][] = $supplier;
                    $dataEmail['start'][]    = $start;
                    $dataEmail['end'][]      = $end;
                    $dataEmail['desc'][]     = $desc;
                    $dataEmail['section'][]  = $sec;

                    $this->db->where('id',$rs->id);
                    $this->db->update('agreements',array('email' => 1));
                    // $dataEmail[]=array(
                    //     'nama' => $nama,
                    //     'supplier' => $supplier,
                    //     'start'     => $start,
                    //     'end'       =>$end,
                    //     'desc'  =>$desc
                    // );
                }
            }


            if (array_key_exists("nama", $dataEmail)) {
                $this->model_email->sendEmailAlert($dataEmail,$row->section);
                
                $c=$c+0;
            } else {
                $c=$c+1;
                echo "Gagal Email";
            }
        }
        echo $c;
    //     if ($c==0) {
    //         redirect(base_url().'close.php');
    //         exit;
    //         echo  "<script type='text/javascript'>";
    // echo "window.close();";
    // echo "</script>";
    //     }
    }
}
