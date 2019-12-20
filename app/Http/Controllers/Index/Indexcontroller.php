<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\Goods;

class Indexcontroller extends Controller
{
    //首页
   public function index(){
       $host=Goods::where(['is_host'=>1])->get();
       $data = Goods::limit(4);
       return view("index.index",['host'=>$host],['data'=>$data]);
   }

   //登录
   public function login(){

       return view("index.login");
   }

   //注册
   public function reg(Request $request){
        return view("index.reg");
   }
   //注册执行
    public function store(Request $request){
       $post = $request->except('_token');
       //验证
        $validator = Validator::make($post, [
            'email' => 'required|unique:users|max:10|min:2',
            'password' => 'required|max:10|min:2',
        ],[
            'email.required'=>'邮箱必填',
            'email.unique'=>'邮箱已存在',
            'password.max'=>'密码最大为18',
            'password.min'=>'密码最小为6',
        ]);
        if ($validator->fails()) {
            return redirect('/reg')
                ->withErrors($validator)
                ->withInput();
        }
    }

   //全部商品展示


   public function prolist(){
       $data=Goods::where(['is_new'=>1])->get();
       $host=Goods::where(['is_host'=>1])->get();
       $best=Goods::where(['is_best'=>1])->get();
//       dd($best);

//       dd($order);
       return view("index.prolist",['data'=>$data],['host'=>$host],['best'=>$best]);
   }

   //商品详情页
    public function proinfo($id){
        $goodsInfo=Goods::where(['goods_id'=>$id])->first();
        $goodsInfo['goods_imgs']=explode('|',$goodsInfo['goods_imgs']);

//        dd($goodsInfo['goods_imgs']);
       return view('index.proinfo',['goodsInfo'=>$goodsInfo]);
    }

   //个人中心`
   public function user(){
       return view("index.user");
   }

   //购物车
    public function car(){
        return view("index.car");

    }
}