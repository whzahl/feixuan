<?php
namespace Admin\Controller;
use Think\Controller;
class TeachersController extends Controller {
    public function index(){
    	$m = M('teachers');	    	
        $this->display();
    }
    public function particulars(){
    	$this->display();
    }
}

