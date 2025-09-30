<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_controller extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$data['home'] = $this->home->home();
		$data['about'] = $this->home->about_home();
		$data['client'] = $this->home->client(6);
		$data['workshop'] = $this->home->workshop();
		$this->load->view('header');
		$this->load->view('index', $data);
		$this->load->view('footer');

	}

	public function about()
	{

		$data['about'] = $this->home->about();
		$data['partner'] = $this->home->partners();
		$data['portfolio'] = $this->home->portfolio();
		$this->load->view('header');
		$this->load->view('about', $data);
		$this->load->view('footer');
	}

	public function service()
	{

		$this->load->view('header');
		$this->load->view('services');
		$this->load->view('footer');
	}

	public function contact()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}

	public function client()
	{
		$data['clients'] = $this->home->client(0);
		$this->load->view('header');
		$this->load->view('client', $data);
		$this->load->view('footer');
	}


	public function portfolio()
	{
		$this->load->view('header');
		$this->load->view('portfolio');
		$this->load->view('footer');
	}

	public function career()
	{
		$this->load->view('header');
		$this->load->view('career');
		$this->load->view('footer');
	}

	public function development()
	{
		$data['development'] = $this->home->development();

		$this->load->view('header');
		$this->load->view('development', $data);
		$this->load->view('footer');
	}


	public function training()
	{
		$data['trainings'] = $this->home->training();
		$this->load->view('header');
		$this->load->view('training', $data);
		$this->load->view('footer');
	}


	public function project()
	{
		

		$data['project'] = $this->home->project();
		$this->load->view('header');
		$this->load->view('careers', $data);
		$this->load->view('footer');
	}

	public function training_details($course_id)
	{
		$data['syllabus'] = $this->home->viewSyllabusByCourse($course_id);
		if (count($data['syllabus']) > 0) {
			$this->load->view('header');
			$this->load->view('product_main', $data);
			$this->load->view('footer');
		} else {
			return redirec('Home_controller/training');
		}
	}



	public function consultancy()
	{

		$data['consultancy'] = $this->home->consultancy();
		if (count($data['consultancy']) > 0) {
			$this->load->view('header');
			$this->load->view('consultancy', $data);
			$this->load->view('footer');
		} else {
			return redirect('Home_controller/consultancy');
		}
	}

	public function getVenue($b_id)
	{
		$data = $this->home->VenueDetails($b_id);
		echo json_encode($data);
	}






}
