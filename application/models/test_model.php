<?php
 
//file: application/models/test_model.php
 
/*
 * @author: Alysson Ajackson
 * @date: Wed Apr 10 22:11:22 BRT 2013
 * */
class Test_model extends CI_Model {
 
    function __construct(){
        parent::__construct();
    }
 
    function get_data(){
 
        $type = $this->input->post('type');
 
        if($type != 1){
            return array();
        }
 
        return array(
            array(
                'name' => 'Suresh',
                'email' => 'suresh@gmail.com',
                'registered_date' => '01/17/2014'
            ),
            array(
                'name' => 'Ram',
                'email' => 'ram@gmail.com',
                'registered_date' => '10/08/2013'
            ),
        );
			print_r($this->array);
    }
 
}
