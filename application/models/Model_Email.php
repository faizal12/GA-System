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
        // // Load 
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
    function sendEmailReminder($dataEmail) {
        // Load 
       
        // ==========================EMAIL=========================================
		$this->load->library('phpmailer_lib');

	    // PHPMailer object
	    $mail = $this->phpmailer_lib->load();

        $config = array(
            'protocol'     => config_email_protocol,                   // 'mail', 'sendmail', or 'smtp'
            'smtp_host'    => config_email_smtp_host,
            'smtp_port'    => config_email_smtp_port,
            'smtp_user'    => config_email_smtp_user,
            'smtp_pass'    => config_email_smtp_pass,
            'smtp_crypto'  => config_email_smtp_crypo,                    //can be 'ssl' or 'tls' for example
            'mailtype'     => config_email_mail_type,                   //plaintext 'text' mails or 'html'
            'smtp_timeout' => '4',                      //in seconds
            'charset'      => 'iso-8859-1',
            'wordwrap'     => TRUE,
            'newline'      => '\r\n',
        );

        //======================================SMTP configuration For Gmail===========================================
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPAuth     = true; // authentication enabled
        $mail->SMTPDebug    = 2;
        $mail->SMTPSecure   = config_email_smtp_crypo; // secure transfer enabled REQUIRED for Gmail
        $mail->Host         = config_email_smtp_host;
        $mail->Port         = config_email_smtp_port; // or 587
        $mail->Username     = config_email_smtp_user;
        $mail->Password     = config_email_smtp_pass;
        $from               = config_email_smtp_user;
        $mail->SetFrom($from, config_email_from);

        $no=1;
        $b=0;
        // echo "<br>";
        // print_r($dataEmail['nama']);
        foreach($dataEmail['title'] as $rs) { 
            
            //Set Recipients
            $recipients = array();
            $name = array();
            $query=$this->db->query("SELECT a.*,b.name,b.section,b.email FROM reminder_recepient a INNER JOIN recipients b 
            ON  a.RECEPIENT_ID = b.id WHERE a.REMINDER_ID='".$dataEmail['id'][$b]."'
            ");
            foreach ($query->result() as $row) {
                $recipients[] = $row->email;
                $name[]       = $row->name;
                //Set Destination
                $mail->addAddress( $row->email, $row->name);
            }
            $recipients = array_unique($recipients);
            $recipients = implode(', ',$recipients);

            $name = array_unique($name);
            $name = implode(', ',$name);

            //Set Data
            
            $id             = $dataEmail['id'][$b];
            $path           =$_SERVER['DOCUMENT_ROOT'].str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
            $title          = $dataEmail['title'][$b];
            $desc           = $dataEmail['desc'][$b];
            $REMINDER_DT    = $dataEmail['REMINDER_DT'][$b];
            // $file_to_attach = site_url($dataEmail['file'][$b]);
            if($dataEmail['file'][$b]=="<p>You did not select a file to upload.</p>" || $dataEmail['file'][$b] ==""){
               
            }else{
                $file_to_attach = $path.$dataEmail['file'][$b];
                if (file_exists($file_to_attach)) {   
                    $mail->addAttachment($file_to_attach);
                }
            }
           
            
            //Set Subject & Title
            $subject = config_email_subject_reminder;
            $judul   = config_email_title;
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $to      =  $recipients;
            $message = '';
            $mail->Body  = '';
            $mail->Body .= 'Dear All,<br><br> ';
            $mail->Body .= "<font color='red' ><b>REMINDER: this event is coming up soon.</b></font>";
            $mail->Body .= '<br>';
            $mail->Body .= '<br>';
            $mail->Body .= "";
            $mail->Body .="<b>$title</b><br>";
            $mail->Body .= $desc."<br>";
            $mail->Body .= date('d F Y',strtotime($REMINDER_DT));
            $mail->Body .= '<br>';
            $mail->Body .= email_footer;
            // echo $file_to_attach;
            if(!$mail->send()){
	            echo 'Message could not be sent.';
	            // echo 'Mailer Error: ' . $mail->ErrorInfo;
                // echo 'Your Email has successfully been sent.';
                    
	        }else{
	            echo 'Message has been sent';
                $this->db->where('REMINDER_ID',$id);
                    $this->db->where('REMINDER_DT',date('Y-m-d',strtotime($REMINDER_DT)));
                    $this->db->update('frequent_dt',array('STATUS' => 1));
                        
                    $this->db->query("UPDATE reminder SET status_email=status_email+1 where id='".$id."'");
                    echo $this->db->last_query();
	        }

            $b++;
            
        }	
        
    }

}
