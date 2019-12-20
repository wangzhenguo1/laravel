<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery.js"></script>
    <script src="/static/admin/js/bootstrap.min.js"></script>


<body>
<h3>添加页面</h3>

<a href="{{url('wenzhang')}}">列表</a>


<form class="form-horizontal" role="form" action="{{url('wenzhang/update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="wen_id" value="{{$data->wen_id}}">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">文章标题</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="wen_name" value="{{$data->wen_name}}"
                   placeholder="请输入文章标题">
            <b style="color: red">{{$errors->first('wen_name')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">文章分类</label>
        <div class="col-sm-10">
            <select name="type_id" >
                <option value="">--请选择--</option>
                @foreach($typeInfo as $v)
                    @if(isset($data['type_id'])&&$data['type_id']==$v->type_id)
                        <option value="{{$v->type_id}}" selected>{{$v->type_name}}</option>
                    @else
                        <option value="{{$v->type_id}}">{{$v->type_name}}</option>
                    @endif
                @endforeach
            </select>
            <b style="color: red">{{$errors->first('type_id')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">文章重要性</label>
        <div class="col-sm-10">
            @if($data->wen_zhong=="普通")
                <input type="radio" name="wen_zhong" value="普通" checked>普通
                <input type="radio" name="wen_zhong" value="置顶">置顶
             @else
                <input type="radio" name="wen_zhong" value="普通">普通
                <input type="radio" name="wen_zhong" value="置顶" checked>置顶
            @endif
                <b style="color: red">{{$errors->first('wen_zhong')}}</b>
        </div>
     </div>

     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否展示</label>
        <div class="col-sm-10">
            @if($data->wen_show==1)
                <input type="radio" name="wen_show" value="1" checked>是
                <input type="radio" name="wen_show" value="2">否
            @else
                <input type="radio" name="wen_show" value="1">是
                <input type="radio" name="wen_show" value="2" checked>否
            @endif
                <b style="color: red">{{$errors->first('wen_show')}}</b>
        </div>
     </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">文章作者</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="wen_man" value="{{$data->wen_man}}"
                   placeholder="请输入作者">
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">作者email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="man_email" value="{{$data->man_email}}"
                   placeholder="请输入作者email">
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">关键字</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="wen_guan" value="{{$data->wen_guan}}"
                   placeholder="请输入关键字">
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">网页描述</label>
        <div class="col-sm-10">
            <textarea name="wen_desc" cols="100" rows="5">{{$data->wen_desc}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">文章配图</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="firstname" name="wen_img" value="{{env('UPLOAD_URL')}}{{$data->wen_img}}">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
        </div>
    </div>
</form>
</body>
</html>