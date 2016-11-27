<?php
class FrontPage extends CI_Controller {
		 public function __construct()
    {
        parent:: __construct();
        $this->load ->model('classes_model');
        $this-> load ->helper('url_helper');
        $this->load->library("pagination");
        $this -> load -> helper('cookie');
    }
        public function index()
        {
        		$data['classes'] = $this -> classes_model -> get_class();
                $data['title'] = "home";
                $this -> load -> view('header',$data);
				$this -> load -> view('SideMenu');
				$this -> load -> view('FeaturePanel');
				$this -> load -> view('front_page/about');
				$this -> load -> view('classes/front',$data);
                                $this -> load -> view('front_page/contact');
				$this -> load -> view('footer');
        }
}


?>