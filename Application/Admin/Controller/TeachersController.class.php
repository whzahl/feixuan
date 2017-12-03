<?php
namespace Admin\Controller;
use Think\Controller;
class TeachersController extends Controller {
    public function index(){
    	$m   = M('teachers');
    	$res =$m->order(array('id'=>'desc'))->select();
    	$this->assign('data',$res);
        $this->display();
    }
    public function del_index(){
    	$id  = $_GET['id'];
    	$m   = M('teachers');
    	$res = $m->where(array('id'=>$id))->delete();
        if($res){
            $this->success('删除成功',U('teachers/index'),3);
        }
    }
    public function particulars(){
    	$id  = $_GET['id'];
    	$m   = M('teachers');
        $res = $m->where(array('id'=>$id))->find();
    	$this->assign('data',$res);
    	$this->display();
    }
    public function add(){
    	$this->display();
    }
    public function add_particulars(){ 
    	$this->display();
    }
    public function complete_add_particulars(){  
    	$teachername=I('post.teachername');
    	$school 	=I('post.school');
    	$date		=I('post.date');
    	$should     =I('post.should');
    	$rightnow   =I('post.rightnow');
    	$absent     =I('post.absent');
    	$off        =I('post.off');
    	$lesson     =I('post.lesson');
    	$remarks    =I('post.remarks');
    	$summary    =I('post.summary');

    	$m      			=M('teachers'); 
    	$data['teachername']=$teachername;
    	$data['school']     =$school;
    	$data['date']		=$date;
    	$data['should']		=$should;
    	$data['rightnow']	=$rightnow;
    	$data['absent']		=$absent;
    	$data['off']		=$off;
    	$data['lesson']		=$lesson;
    	$data['remarks']	=$remarks;
    	$data['summary']	=$summary;

    	$res=$m->add($data);
    	if ($res) {
    		$this->success('新增成功',U('Teachers/add'),3);
    	}
    }        	
}