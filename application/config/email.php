<?php defined('BASEPATH') OR exit('No direct script access allowed');

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
    'wordwrap'     => TRUE
);