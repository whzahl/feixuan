<?php
namespace Admin\Controller;
use Think\Controller;
class StockController extends Controller {
    public function stock(){
    	$m=M('stock');
    	$re=$m->order(array('id'=>'asc'))->select();
    	$this->assign('data',$re);
        $this->display();
    }
    public function del_stock(){
    	$id=$_GET['id'];
    	$m=M('stock');
    	$re=$m->where(array('id'=>$id))->delete();
        if($re){
            $this->success('删除成功',U('stock/stock'),3);
        }

    }

    public function edit_stock(){
        header("Content-Type: text/html; charset=utf-8");
        $id=I('get.id');
        $m=M('stock');
        $re= $m->where(array('id'=>$id))->find();
        $this->assign('data',$re);
        $this->display();
    }
    public function save_stock(){
        header("Content-Type: text/html; charset=utf-8");
        $m=M('stock');
        $id=I('post.id');
        $goods_name=I('post.goods_name');
        $amount=I('post.amount');
        $price=I('post.price');
        $size=I('post.size');

       
        $data['id']=$id;
        $data['goods_name']=$goods_name;
        $data['amount']=$amount;
        $data['price']=$price;
        $data['size']=$size;

        $re=$m->where(array('id'=>$id))->save($data);
    
        if($re){
            $this->success('修改成功',U('stock/stock'),3);
        }
    }
    public function add_stock(){
            $this->display();
        }
     public function complete_add_stock(){
        header("Content-Type: text/html; charset=utf-8");
       
        $id=I('post.id');
        $goods_name=I('post.goods_name');
        $amount=I('post.amount');
        $price=I('post.price');
        $size=I('post.size');
        
        $m=M('stock');
        $data=$m->create();
        $data['id']=$id;
        $data['goods_name']=$goods_name;
        $data['amount']=$amount;
        $data['price']=$price;
        $data['size']=$size;

        $re=$m->add($data);
        if($re){
            $this->success('修改成功',U('stock/stock'),3);
        }
     }
    
}
