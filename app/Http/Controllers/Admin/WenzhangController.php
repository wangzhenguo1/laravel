<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Wenzhang;
use Validator;
use Illuminate\Validation\Rule;

class WenzhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeInfo=DB::table('type')->get();
//        dd($typeInfo);
        $wen_name=request()->wen_name;
        $type=request()->type_id;

        $where=[];

        if(!empty($wen_name)){
            $where[]=['wen_name','like',"%$wen_name%"];
        }
        if (!empty($type)){
            $where[]=["wenzhang.type_id",'=',"$type"];
        }

        $pageSize=config('app.pagesize');
        $data=Wenzhang::
        leftjoin('type','wenzhang.type_id','=','type.type_id')
        ->where($where)
        ->paginate($pageSize);
        $query=request()->all();
       // dd($typeInfo);
        return view('admin.wenzhang.index',['data'=>$data,'typeInfo'=>$typeInfo,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeInfo=DB::table('type')->get();
        return view('admin.wenzhang.create',['typeInfo'=>$typeInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=$request->except('_token');

        $validator = Validator::make($post, [
            'wen_name' => 'required|unique:wenzhang|max:10|min:2',
            'type_id' => 'required',
            'wen_zhong' => 'required',
            'wen_show' => 'required',
        ],[
            'wen_name.required'=>'文章标题不能为空',
            'wen_name.unique'=>'文章标题已存在',
            'type_id.required'=>'文章分类不能为空',
            'wen_zhong.required'=>'文章重要性不能为空',
            'wen_show.required'=>'是否显示不能为空',
        ]);
        if ($validator->fails()) {
            return redirect('wenzhang/create')
                ->withErrors($validator)
                ->withInput();
        }

        if( request()->hasFile('wen_img')){
            $post['wen_img']=$this->upload('wen_img');
        }

        $brand = new Wenzhang();
        $brand->wen_name = $post['wen_name'];
        $brand->type_id = $post['type_id'];
        $brand->wen_zhong = $post['wen_zhong'];
        $brand->wen_show = $post['wen_show'];
        $brand->wen_man = $post['wen_man'];
        $brand->man_email = $post['man_email'];
        $brand->wen_guan= $post['wen_guan'];
        $brand->wen_desc= $post['wen_desc'];
        $brand->wen_img= $post['wen_img']??'';
        $res = $brand->save();
        if($res){
            return redirect('wenzhang');
        }
        $res=Wenzhang::insert($post);
//        dd($res);
        if ($res){
            return redirect('wenzhang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $typeInfo=DB::table('type')->get();
        $data=Wenzhang::where(['wen_id'=>$id])->first();
        return view('admin.wenzhang.edit',['typeInfo'=>$typeInfo,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post=$request->except('_token');
        $validator = Validator::make($post, [
            'wen_name' => [
                'required',
                Rule::unique('wenzhang')->ignore($post['wen_id'],'wen_id'),
            ],
            'wen_name' => 'required',
            'type_id' => 'required',
            'wen_zhong' => 'required',
            'wen_show' => 'required',
        ],[
            'wen_name.required'=>'文章标题不能为空',
            'wen_name.unique'=>'文章标题已存在',
            'type_id.required'=>'文章分类不能为空',
            'wen_zhong.required'=>'文章重要性不能为空',
            'wen_show.required'=>'是否显示不能为空',
        ]);
        if ($validator->fails()) {
            return redirect('wenzhang/edit/'.$post['wen_id'])
                ->withErrors($validator)
                ->withInput();
        }

        //文件上传
        if( request()->hasFile('wen_img')){
            $post['wen_img']=$this->upload('wen_img');
        }

//        dd($post);
        //  $res=DB::table('brand')->where(['brand_id'=>$id])->update($post);
        $res=Wenzhang::where(['wen_id'=>$post['wen_id']])->update($post);
        if($res){
            return redirect("wenzhang");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Wenzhang::where(['wen_id'=>$id])->delete();
        if($res){
            return redirect("wenzhang");
        }
    }
    public function upload($img_name){
        //验证文件是否上传成功
        if (request()->file($img_name)->isValid()) {
            //接收文件
            $photo = request()->file($img_name);
            //上传
            $store_result = $photo->store($img_name);
            //$store_result = $photo->storeAs($img_name, 'test.jpg');
            //返回上传的文件路径
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');

    }
}

