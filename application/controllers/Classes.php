<?php
class Classes extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load ->model('classes_model');
        $this ->load->model('login_model');
        $this-> load ->helper('url_helper');
        $this-> load->helper('cookie');
        $this->load->library('encrypt');
    }

    public function index(){
        if(get_cookie('type') === NULL){
            redirect(base_url().'index.php/Home');
        }
        if(get_cookie('type') != 'admin' && get_cookie('type') != 'teacher'){
            redirect(base_url().'index.php/Home');
        }


        $classes = $this->classes_model->get_class();
        $data["classes"] = $classes;
        $data['values'] = null;
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Student';
        $data['update'] = 'Update';
        $data['delete'] = 'Delete';

        $this->load->view('header',$data);
		$this -> load -> view('SideMenu');
        $this->load->view('classes/index',$data);
        $this->load->view('footer');
    }
    public function delete_classes($id){
        $this -> classes_model -> delete_class($id);
        redirect('Classes');
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
            'admin',
            'teacher'

        );
        $data['title'] = 'Create New Class';
        $fields = array(
            'class_name',
            'status'
        );
        $data['fields'] = $fields;
        $data['action'] = 'classes/create';
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
            $this->classes_model->create();
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
            'teacher'
        );
        $data['title'] = 'UPDATE STUDENT '.$id;
        $fields = array(
            'name',
            'status'
        );
        $data['fields'] = $fields;
        $data['action'] = 'classes/update/'.$id;
        $data['values'] = $this->classes_model->get_by_id($id);
        foreach($fields as $rule) {
            $this->form_validation->set_rules($rule, $rule, 'required');
        }
        if($this->form_validation->run()=== FALSE){
            $this->load->view('header',$data);
            $this->load->view('Form/index.php');
            $this->load->view('footer');


        }
        else{
            $this->classes_model->update($id);
            $this->load->view('news/success');
        }


    }
}
?>


