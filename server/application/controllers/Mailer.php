<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mailer extends CI_Controller {
	function __construct() {
        parent::__construct();
    }

	public function send() {
		$this->load->config('email');
		$this->load->library('email');
		
		$from = 'info@shriganpatipackers.com';
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$dateofmoving = $this->input->post('dateofmoving');
		$selectoption = $this->input->post('selectoption');
		if( $name == '' || $phone == '' || $fromp == '' || $top == '' ){
			echo json_encode([ "status" => "ERR", "res_code" => "500", "message" => "validation error" ]);
		}
		$fromp = $this->input->post('fromp');
		$top = $this->input->post('top');
		$message = $this->input->post('message');

		$email_mess = '';
		$email_mess .= '<table border="1">';
		$email_mess .= '<tr><td> Name: </td> <td> '.$name.' </td> </tr>';
		$email_mess .= '<tr><td> Phone: </td> <td> '.$phone.' </td> </tr>';
		$email_mess .= '<tr><td> From Place: </td> <td> '.$fromp.' </td> </tr>';
		$email_mess .= '<tr><td> To Place: </td> <td> '.$top.' </td> </tr>';
		$email_mess .= '<tr><td> Email: </td> <td> '.$email.' </td> </tr>';
		$email_mess .= '<tr><td> Date of move: </td> <td> '.$dateofmoving.' </td> </tr>';
		$email_mess .= '<tr><td> Service Subject: </td> <td> '.$selectoption.' </td> </tr>';
		$email_mess .= '<tr><td> Message: </td> <td> '.$message.' </td> </tr>';
		$email_mess .= '<table>';		

		$to= "info@shriganpatipackers.com";
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject('New Enquiry from websie');
		$this->email->message($email_mess);
	
		if ($this->email->send()) {
			echo json_encode([ "status" => "OK", "res_code" => "200", "message" => "SENT"]);
		} else {
			$error = show_error($this->email->print_debugger());
			echo json_encode([ "status" => "ERR", "res_code" => "500", "message" => $error ]);
		}
		return;
	}
}
