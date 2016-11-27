<?php

class classes_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    

    public function get_class($id = FALSE){
        if ($id === FALSE){
           $query = $this->db->get_where('classes',array('status' => 'active'));
            return $query->result_array();

        }

        $query = $this->db->get_where('classes',array('class_id' => $id));
        return $query->row_array();

    }
    public function delete_class($id){
        $data = array
        (
            'status' => 'deleted'
        );

        $this->db->set($data);
        $this -> db -> where('class_id',$id);
        $this->db->update('classes');
    }

    public function create(){
        $this -> load -> helper('url');
        $data = array
        (
            'class_name' => $this->input->post('class_name'),
            'status' => $this->input->post('status')
        );
        $this->db->insert('classes',$data);
    }

    /*
     * Counting Of All Books
     *
     */
    public function book_count(){
    	$classes = get_class();
    	$count = count($classes);
       	return  $count;
    }

    /*
     *
     * For Pagination REcord Per Page
     *
     */

    public function fetch_array($limit , $start , $class = NULL){
        $this -> db -> limit($limit, $start);
        if($class != NULL && $class != 'All-Books'){
            $this -> db -> where('class',$class);
        }
        $query = $this -> db -> get('books');
         if($query -> num_rows() > 0){
             foreach($query -> result() as $row){
                 $data[] = $row;
             }
             return $data;
         }
        return false;

    }
    public function update($id){
        $this -> load -> helper('url');
        $data = array
        (
            'class_name' => $this->input->post('class_name'),
            'status' => $this->input->post('status')
        );

        $this->db->set($data);
        $this -> db -> where('class_id',$id);
        $this->db->update('classes');
    }

    public function get_class_where($id){
        $query = $this->db->get_where('classes',array('id' => $id));
        return $query->row_array();
    }



}

?>