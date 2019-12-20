<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandPost;
use Illuminate\Http\Request;
use DB;
use App\Model\Brand as Brandmodel;
use Validator;
use Illuminate\Validation\Rule;


class brand extends Controller
{
    /**
     * Display a listing of the resource.
     *l列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand_name=request()->brand_name;
        $brand_url=request()->brand_url;

        $where=[];
        if ($brand_name){
            $where[]=['brand_name','like',"%$brand_name%"];
        }

        if ($brand_url){
            $where[]=['brand_url','like',"%$brand_url%"];
        }

        $pageSize=config('app.pagesize');
        $data=Brandmodel::where($where)->orderBy('brand_id','desc')->paginate($pageSize);

        $query=request()->all();
        return view('admin.brand.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
//    public function store(StoreBrandPost $request)
    {
//        $request->validate([
//            'brand_name' => 'required|unique:brand|max:10|min:2',
//            'brand_url' => 'required',
//            ],[
//            'brand_name.required'=>'品牌名称必填',
//            'brand_name.unique'=>'品牌名称已存在',
//            'brand_name.max'=>'品牌名称最大为10',
//            'brand_name.min'=>'品牌名称最小为2',
//            'brand_url.required'=>'品牌网址不能为空',
//        ]);


        $post=$request->except('_token');
        $validator = Validator::make($post, [
            'brand_name' => 'required|unique:brand|max:10|min:2',
            'brand_url' => 'required',
        ],[
            'brand_name.required'=>'品牌名称必填',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_name.max'=>'品牌名称最大为10',
            'brand_name.min'=>'品牌名称最小为2',
            'brand_url.required'=>'品牌网址不能为空',
        ]);
        if ($validator->fails()) {
            return redirect('brand/create')
                ->withErrors($validator)
                ->withInput();
        }

////      dd($data);
        //文件上传
        if( request()->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');
        }
        //ORM
        //$res=Brandmodel::create($post);
        $brand = new Brandmodel();
        $brand->brand_name = $post['brand_name'];
        $brand->brand_url = $post['brand_url'];
        $brand->brand_logo = $post['brand_logo']??'';
        $brand->brand_desc = $post['brand_desc'];
        $res = $brand->save();
        if($res){
            return redirect('brand');
        }

    }


    /**
     * Display the specified resource.
     *展示详情页
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $data=DB::table('brand')->where(['brand_id'=>$id])->first();
//        dd($data);
        $data=Brandmodel::where(['brand_id'=>$id])->first();
        return view('admin.brand.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *编辑执行
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $post=$request->except('_token');
//        dd($post);
        $validator = Validator::make($post, [
            'brand_name' => [
                'required',
                Rule::unique('brand')->ignore($id,'brand_id'),
                'max:12',
                'min:2'
            ],
            'brand_url' => 'required',
        ],[
            'brand_name.required'=>'品牌名称必填',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_name.max'=>'品牌名称最大为10',
            'brand_name.min'=>'品牌名称最小为2',
            'brand_url.required'=>'品牌网址不能为空',
        ]);
        if ($validator->fails()) {
            return redirect('brand/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        //文件上传
        if( request()->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');
        }

//        dd($post);
      //  $res=DB::table('brand')->where(['brand_id'=>$id])->update($post);
        $res=Brandmodel::where(['brand_id'=>$id])->update($post);
        if($res){
            return redirect("brand");
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
//        dd($id);
        $res=DB::table('brand')->where(['brand_id'=>$id])->delete();
        if($res){
            return redirect("brand");
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
