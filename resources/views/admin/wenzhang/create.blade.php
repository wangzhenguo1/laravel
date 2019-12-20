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


<form class="form-horizontal" role="form" action="{{url('wenzhang/store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">文章标题</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="wen_name"
                   placeholder="请输入文章标题">
            <b style="color: red">{{$errors->first('wen_name')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">文章分类</label>
        <div class="col-sm-10">
            <select name="type_id">
                <option value="">--请选择--</option>
                @foreach($typeInfo as $v)
                     <option value="{{$v->type_id}}">{{$v->type_name}}</option>
                @endforeach
            </select>
            <b style="color: red">{{$errors->first('type_id')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">文章重要性</label>
        <div class="col-sm-10">
            <input type="radio" name="wen_zhong" value="普通" checked>普通
            <input type="radio" name="wen_zhong" value="置顶">置顶
            <b style="color: red">{{$errors->first('wen_zhong')}}</b>
        </div>
     </div>

     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否展示</label>
        <div class="col-sm-10">
            <input type="radio" name="wen_show" value="1" checked>是
            <input type="radio" name="wen_show" value="2">否
            <b style="color: red">{{$errors->first('wen_show')}}</b>
        </div>
     </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">文章作者</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="wen_man"
                   placeholder="请输入作者">
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">作者email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="man_email"
                   placeholder="请输入作者email">
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">关键字</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="wen_guan"
                   placeholder="请输入关键字">
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">网页描述</label>
        <div class="col-sm-10">
            <textarea name="wen_desc" cols="100" rows="5"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">文章配图</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="firstname" name="wen_img">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加</button>
        </div>
    </div>
</form>
</body>
</html>