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
<table class="table">
    <h3>列表展示</h3><br>
    {{--<a href="{{url('brand/create')}}">添加</a>--}}
    <form action="" method="">
        <input type="text" name="brand_name" value="{{$query['brand_name']??''}}" placeholder="请输入品牌名称">
        <input type="text" name="brand_url" value="{{$query['brand_url']??''}}" placeholder="请输入品牌网址">
        <button>搜索</button>
    </form>
    <hr>
    <thead>
    <tr>
        <th>品牌ID</th>
        <th>品牌名称</th>
        <th>品牌url</th>
        <th>品牌LOGO</th>
        <th>品牌简介</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @if($data)
        @foreach($data as $v)
            <tr class="active">
                <td>{{$v->brand_id}}</td>
                <td>{{$v->brand_name}}</td>
                <td>{{$v->brand_url}}</td>
                <td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="100"></td>
                <td>{{$v->brand_desc}}</td>
                <td>
                    <a class="btn btn-danger" href="{{ url('brand/destroy/'.$v->brand_id)}}">删除</a>
                    <a class="btn btn-success" href="{{ url('brand/edit/'.$v->brand_id)}}">修改</a>
                </td>
            </tr>
        @endforeach
    @endif

    <tr><td colspan="6">{{$data->appends($query)->links()}}</td></tr>
    </tbody>
</table>
</body>
</html>