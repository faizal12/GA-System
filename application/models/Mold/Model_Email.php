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
        $this->db->where('active','1');
        $query=$this->db->get('recipients');
        // print_r($this->db->last_query());
        foreach ($query->result() as $row) {
            $recipients[]     = $row->email;
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
        $message = 'Dear All,<br><br> ';
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
                            <td style="border: thin solid black">'.$no++.'</td>
                            <td style="border: thin solid black">'.$nama.'</td>
                            <td style="border: thin solid black">'.$supplier.'</td>
                            <td style="border: thin solid black">'.date('d-M-Y',strtotime($start)) . '</td>
                            <td style="border: thin solid black">'.date('d-M-Y',strtotime($end)) . '</td>
                            <td style="border: thin solid black">'.$desc.'</td>
                        </tr>';
                        $this->db->where('name',$nama);
                        $this->db->where('supplier',$supplier);
                        $this->db->where('start',date('Y-m-d',strtotime($start)));
                        $this->db->where('end',date('Y-m-d',strtotime($end)));
                        $this->db->update('agreements',array('email' => 1));
    
        }
          
		$message.='</table>';
		// $message.= 'Please Approve<br>  ';
        // $message.= '<br><a href="'.base_url().'">Click here to approve it </a> ';
		$message.= '<br><br>';
        $message.= email_footer;
        // print_r($message);
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
    function sendEmailReminder($dataEmail,$id,$dt) {
        // Load 
        $this->load->config('email');
        $this->load->library('email');

        //Set Subject & Title
        $subject = "Reminder - Notification";
        $judul   = config_email_title;
        $recipients = array();
        $name = array();
        $query=$this->db->query("SELECT a.*,b.name,b.section,b.email FROM reminder_recepient a INNER JOIN recipients b 
        ON  a.RECEPIENT_ID = b.id WHERE a.REMINDER_ID='".$id."'
        ");
        foreach ($query->result() as $row) {
            $recipients[] = $row->email;
            $name[]       = $row->name;
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
		$message .= "<font color='red' ><b>REMINDER: this event is coming up soon.</b></font>";
        $message .= '<br>';
        $message .= '<br>';
		$message .= "";
		
        $no=1;
        $b=0;
        echo "<br>";
        // print_r($dataEmail['nama']);
        foreach($dataEmail['title'] as $rs) {
            // echo $b;
            // print_r($dataEmail['nama'][$b]);
            $title          = $dataEmail['title'][$b];
            $desc           = $dataEmail['desc'][$b];
            $REMINDER_DT    = $dataEmail['REMINDER_DT'][$b];
            $b++;
            $message .="<b>$title</b><br>";
            $message .= $desc."<br>";
            $message .= date('d F Y',strtotime($REMINDER_DT));
    
        }
          
		// $message.='</table>';
		// $message.= 'Please Approve<br>  ';
        // $message.= '<br><a href="'.base_url().'">Click here to approve it </a> ';
		$message.= '<br><br>';
        $message.= email_footer;
        print_r($message);
        $this->email->set_newline("\r\n");
        $this->email->from($from,config_email_from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if (config_notification_email == 1) {
            if ($this->email->send()) {
                echo 'Your Email has successfully been sent.';
                $this->db->where('REMINDER_ID',$id);
                $this->db->where('REMINDER_DT',date('Y-m-d',strtotime($dt)));
                $this->db->update('frequent_dt',array('STATUS' => 1));
            
                $this->db->query("UPDATE reminder SET status_email=status_email+1 where id='".$id."'");
                // echo $this->db->last_query();
            } else {
                show_error($this->email->print_debugger());
            }
        }
        
    }

}
