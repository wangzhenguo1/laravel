<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DemeterChain\C;
use Illuminate\Http\Request;
use App\Model\Category;
use Validator;
class categorycontroller extends Controller
{
    //列表展示
    public function index(){
        $cate_name=request()->cate_name;
        $where=[];
        if ($cate_name){
            $where[]=['brand_name','like',"%$cate_name%"];
        }
        $query=request()->all();
        $pageSize=config('app.pagesize');
        $data=Category::where($where)->paginate($pageSize);

        return view('admin.category.index',['data'=>$data,'query'=>$query]);
//        $data=Category::get();
//        return  view("admin.category.index",['data'=>$data]);
    }

    //添加
    public function create(){
        $info=Category::all()->toArray();
        $data=$this->getCateInfo($info);
        return view("admin.category.create",['info'=>$data]);
    }

    //执行添加
    public function store(Request $request){

        $post=$request->except('_token');
//        dd($post);
        $validator = Validator::make($post, [
            'cate_name' => 'required|unique:category|max:20|min:2',
        ],[
            'cate_name.required'=>'分类名称不能为空',
            'cate_name.unique'=>'分类名称已存在',
            'cate_name.max'=>'分类名称最大为20',
            'cate_name.min'=>'分类名称最小为2',

        ]);
        if ($validator->fails()) {
            return redirect('category/create')
                ->withErrors($validator)
                ->withInput();
        }
            $res=Category::create($post);
        if($res){
            return redirect('category');
        }

    }
    //编辑
    public function edit(Request $request,$id){
        $info=Category::all()->toArray();

        $getInfo=$this->getCateInfo($info);

        $data=Category::where(['cate_id'=>$id])->first();
        dd($data);
        return view("admin.category.create",['info'=>$data,['data'=>$data]]);
    }

    //执行编辑
    public function undate(){
        echo  "困死我了 ";
    }

    //删除
    public function destroy(Request $request,$id){
//        dd($id);
        $res=Category::where(['cate_id'=>$id])->delete();
        if($res){
            return redirect("category");
        }
    }
    //无限极分类
    public  function getCateInfo($cateInfo,$parent_id=0,$level=0){
        Static $info=[];
        Foreach($cateInfo as $k=>$v){
            If($v['parent_id']==$parent_id){
                $v['level']=$level;
                $info[]=$v;
                $this->getCateInfo($cateInfo,$v['cate_id'],$level+1);
            }
        }
        Return $info;
    }

}
