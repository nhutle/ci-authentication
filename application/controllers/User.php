<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
  function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->library('email');


    $config['protocol'] = "smtp";
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['smtp_port'] = '465';
    $config['smtp_user'] = 'nhutle.dev@gmail.com';
    $config['smtp_pass'] = 'QwertY123';
    $config['mailtype']  = 'html';
    $config['smtp_timeout'] = 7;
    $config['mailtype'] = 'html';
    $config['charset']   = 'utf-8';

    $config['wordwrap']  = TRUE;

    $this->email->initialize($config);
    $this->email->set_newline("\r\n");

    $this->email->from('nhutle.dev@gmail.com', 'admin');
    $this->email->to('leminhnhut08t1@gmail.com');
    $this->email->subject('Registration Verification:');

    $message = "Thanks for signing up! Your account has been created, you can login with your credentials after you have activated your account by pressing the url below. Please click this link to activate your account:<a>Click Here</a>";

    $this->email->message($message);

    $this->email->send();

    echo $this->email->print_debugger();
  }
}
?>