<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('mDatos', '', TRUE);
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function index2()
	{
		$this->load->view('welcome_message2');
	}
	
	public function index3($id)
	{
		$datos["identificador"]=$id;
		$datos["alumnos"] = $this->mDatos->consulta_yodos()->result();
		$datos["datos2"] = $this->mDatos->consulta_uno($id)->row();
		$this->load->view('cabecera');
		$this->load->view('contenido', $datos);
		$this->load->view('pie');
	}
	
}
