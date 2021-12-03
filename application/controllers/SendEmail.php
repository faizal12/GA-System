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
        //SEND EMAIL NOTIFICATION AGRREMENT KONTRAK
        $now = date('Y-m-d');
        $c=0;
        $sql = $this->db->query('SELECT  *  FROM section');
        foreach ($sql->result() as $row) {

            $dataEmail = array();
            $this->db->where('section', $row->section_cd);
            $this->db->where('email', 0);
            $query = $this->db->get('agreements');
            // print_r($this->db->last_query());

            foreach ($query->result() as $rs) {
                $nama     = $rs->name;
                $supplier = $rs->supplier;
                $start    = $rs->start;
                $end      = $rs->end;
                $desc     = $rs->description;
                $reminder = $rs->reminder;
                $sec      = $rs->section;

                $cek = date('Y-m-d', strtotime('-' . $reminder . ' day', strtotime($end)));
                $date2 = date_create(date('Y-m-d',strtotime($end)));
                $date1 = date_create(date('Y-m-d'));
                $diff  = date_diff($date1,$date2);
                $diff = $diff->format("%R%a");
                // echo $end." - ".date('Y-m-d')." = ".$diff.":".$reminder."<br>";
                // print_r($diff."\n");
                

                if ($diff <= $reminder) {
                   
                // echo "faizal";
                    
                    $dataEmail['nama'][]     = $nama;
                    $dataEmail['supplier'][] = $supplier;
                    $dataEmail['start'][]    = $start;
                    $dataEmail['end'][]      = $end;
                    $dataEmail['desc'][]     = $desc;
                    $dataEmail['section'][]  = $sec;
                }
            }

            // echo $rs->id;
            if (array_key_exists("nama", $dataEmail)) {
                $this->model_email->sendEmailAlert($dataEmail,$row->section_cd);
                // $this->db->where('id',$rs->id);
                // $this->db->update('agreements',array('email' => 1));
                $c=$c+0;
            } else {
                $c=$c+1;
                echo "Gagal Email";
            }
        }

        //SEND EMAIL NOTIFICATION REMINDER SOP 
        $now = date('Y-m-d');
        $c=0;
        $sql = $this->db->query('SELECT  * FROM reminder_aktif');
        if($sql->num_rows()> 0 ){
            foreach ($sql->result() as $row) {

                $reminder=$row->reminder;

                if($row->diff < $row->reminder){
                    $dataEmail = array();
                    $title      = $row->title;
                    $REMINDER_DT= $row->REMINDER_DT;
                    $desc       = $row->description;
                    $reminder   = $row->reminder;

                    $dataEmail['id'][]       = $row->id;
                    $dataEmail['title'][]       = $title;
                    $dataEmail['desc'][]        = $desc;
                    $dataEmail['REMINDER_DT'][] = $REMINDER_DT;
                    $dataEmail['file'][] = $row->file;

                    if (array_key_exists("title", $dataEmail)) {
                        $this->model_email->sendEmailReminder($dataEmail);
                        
                        $c=$c+0;
                    } else {
                        $c=$c+1;
                        echo "Gagal Email";
                    }
                }//END IF
            }//END FOREACH reminder_aktif
            // echo $c;
        }

        //Set STATUS REMINDER WHEN CLOSE
        $this->db->query("CALL SP_UPD_EMAIL");

        
    }
}
