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

<a href="{{url('category')}}">列表</a>
    {{--@if ($errors->any())--}}
        {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}

<form class="form-horizontal" role="form" action="{{url('category/store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="cate_name"
                   placeholder="请输入分类名称">
            <b style="color: red">{{$errors->first('cate_name')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否展示</label>
        <div class="col-sm-10">
            <input type="radio" name="cate_show" value="1" checked>是
            <input type="radio" name="cate_show" value="2">否

        </div>
     </div>

     <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否在导航栏展示</label>
        <div class="col-sm-10">
            <input type="radio" name="cate_nav_show" value="1" checked>是
            <input type="radio" name="cate_nav_show" value="2">否
        </div>
     </div>
            <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">父类ID</label>
        <div class="col-sm-10">
            <select name="parent_id">
                <option value="">--请选择--</option>
                @foreach ($info as $v)
                        <option value="{{$v['parent_id']}}">
                            @php echo str_repeat('&nbsp;&nbsp;',$v['level']*2) @endphp
                            {{$v['cate_name']}}
                        </option>

                @endforeach
            </select>
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