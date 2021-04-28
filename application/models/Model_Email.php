<?php defined('BASEPATH') OR exit('No DIrect script access allowed');
date_default_timezone_set("Asia/Bangkok");
/**
 * Create By Faizal
 * 25-03-2021
 */
class Model_Email extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
	}
    function sendEmailAlert($dataEmail,$section) {
        // Load 
        $this->load->config('email');
        $this->load->library('email');

        //Set Subject & Title
        $subject = "Expired Agreements - Notification";
        $judul   = config_email_title;
        $recipients = array();
        $name = array();
        $this->db->where('section',$section);
        $query=$this->db->get('recipients');
        foreach ($query->result() as $row) {
            $recipients[] = $row->email;
            $name[]           = $row->name;
        }
        $recipients = array_unique($recipients);
        $recipients = implode(', ',$recipients);

        $name = array_unique($name);
        $name = implode(', ',$name);

        // echo $judul;
        // $recipients="it_tmi@tenmacorp.co.jp";
        // $mgr="";
        $from    = $this->config->item('smtp_user');
        $to      =  $recipients;
        $message = '';
        $message = 'Dear Mr/Ms '.$name.',<br><br> ';
		$message .= $judul;
        $message .= '<br>';
		$message .= '<table  style="border: 1px solid black">
					<tr>
						<td style="border: 1px solid black;text-align:center">No</td>
						<td style="border: 1px solid black;text-align:center">Name</td>
						<td style="border: 1px solid black;text-align:center">Supplier</td>
						<td style="border: 1px solid black;text-align:center">Start</td>
						<td style="border: 1px solid black;text-align:center">End</td>
						<td style="border: 1px solid black;text-align:center">Description</td>
					</tr>';
		

        /*
            Stat :
            2 = Multiple Data SPL
            1 = Single Data SPL
        */
        $no=1;
        $b=0;
        echo "<br>";
        // print_r($dataEmail['nama']);
        foreach($dataEmail['nama'] as $rs) {
            // echo $b;
            // print_r($dataEmail['nama'][$b]);
            $nama     = $dataEmail['nama'][$b];
            $supplier = $dataEmail['supplier'][$b];
            $start    = $dataEmail['start'][$b];
            $end      = $dataEmail['end'][$b];
            $desc     = $dataEmail['desc'][$b];
            $b++;
            $message .='<tr>
                            <td style="border: 1px solid black">'.$no++.'</td>
                            <td style="border: 1px solid black">'.$nama.'</td>
                            <td style="border: 1px solid black">'.$supplier.'</td>
                            <td style="border: 1px solid black">'.$start . '</td>
                            <td style="border: 1px solid black">'.$end . '</td>
                            <td style="border: 1px solid black">'.$desc.'</td>
                        </tr>';
    
        }
          
		$message.='</table>';
		// $message.= 'Please Approve<br>  ';
        // $message.= '<br><a href="'.base_url().'">Click here to approve it </a> ';
		$message.= '<br><br>';
        $message.= email_footer;

        $this->email->set_newline("\r\n");
        $this->email->from($from,config_email_from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if (config_notification_email == 1) {
            if ($this->email->send()) {
                echo 'Your Email has successfully been sent.';
            } else {
                show_error($this->email->print_debugger());
            }
        }
        
    }

}
