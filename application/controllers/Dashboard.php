<?php
class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load ->model('staff_model');
        $this ->load->model('login_model');
		$this->load ->model('student_model');
        $this-> load ->helper('url_helper');
		$this-> load->helper('cookie');
        $this->load->library('encrypt');
    }

    public function index(){
		$id = get_cookie('id');
		$type = get_cookie('type');
		if(get_cookie('type') === "student"){
			$class = "student";
		}
		else{
			$class = "staff";
		}
		$data['entity'] = $this ->  login_model -> get_by($class,$id);
		if($type != "student"){
			$data['details'] = $this->staff_model->get_by_id($data['entity']['staff_id']);
		}
		else{
			$data['details'] = $this->student_model->get_student($data['entity']['username']);
		}
		$this->load->helper('form');
        $this->load->library('form_validation');
		$data['action'] = 'Dashboard/index';
		$fields = array(
		'username',
		'password'
        );
		foreach($fields as $rule) {
            $this->form_validation->set_rules($rule, $rule, 'required');
        }
		if($this->form_validation->run()=== FALSE){
			$this->load->view('header',$data);
			$this -> load -> view('SideMenu');
			$this->load->view('dashboard',$data);
			$this->load->view('footer');			
        }
        else{
            $this->staff_model->update($id);
            $this->load->view('news/success');
        }

    }

    public function delete_staff($id){
        $this -> staff_model -> delete_staff($id);
        redirect('Staff');
    }
    /*
     *
     * Create to Create New Book
     *
     */

    public function create(){

        $this->load->helper('form');
        $this->load->library('form_validation');
        /*
         *
         *
         *    Form Configuration
         *       $data['title']  TITLE AND SUBMIT BUTTON VALUE
         *       $data['fields']  BASSICALLY AN ARRAY OF FIELDS TO BE INPUT
         *       $data['action']  ACTION ON PAGE BASSICALLY CURRENT CONTROLLER_CLASS / FUNCTION
         *       $data['authenticate'] ARRAY OF ALLOWED TYPE
         *
         *
         */
        $data['authenticate'] = array(
            'admin'

        );
        $data['title'] = 'Create New Staff';
        $fields = array(
            'name',
            'destination',
            'username',
            'password'
        );
        $data['fields'] = $fields;
        $data['action'] = 'staff/create';
        $data['values'] = null;
        foreach($fields as $rule) {
            $this->form_validation->set_rules($rule, $rule, 'required');
        }



        if($this->form_validation->run()=== FALSE){
            $this->load->view('header',$data);
            $this->load->view('Form/index.php');
            $this->load->view('footer');


        }
        else{
            $this->staff_model->create($fields);
            $this->load->view('news/success');

        }


    }

    public function update($id){
        $this->load->helper('form');
        $this->load->library('form_validation');
        /*
         *
         *
         *    Form Configuration
         *       $data['title']  TITLE AND SUBMIT BUTTON VALUE
         *       $data['fields']  BASSICALLY AN ARRAY OF FIELDS TO BE INPUT
         *       $data['action']  ACTION ON PAGE BASSICALLY CURRENT CONTROLLER_CLASS / FUNCTION
         *       $data['authenticate'] ARRAY OF ALLOWED TYPE
         *
         *
         */
        $data['authenticate'] = array(
            'admin',

        );
        $data['title'] = 'UPDATE STAFF '.$id;
        $fields = array(
            'name',
            'destination',
            'username',
            'password'
        );
        $data['fields'] = $fields;
        $data['action'] = 'staff/update/'.$id;
        $data['values'] = $this->staff_model->get_by_id($id);

        $user = $this->login_model -> get_by('staff',$id);
        $data['values']['username'] = $user['username'];
        $data['values']['password'] = '*'.$this -> encrypt -> encode($user['password']);
        foreach($fields as $rule) {
            $this->form_validation->set_rules($rule, $rule, 'required');
        }
        if($this->form_validation->run()=== FALSE){
            $this->load->view('header',$data);
            $this->load->view('Form/index.php');
            $this->load->view('footer');


        }
        else{
            $this->staff_model->update($id);
            $this->load->view('news/success');

        }


    }
}
?>


