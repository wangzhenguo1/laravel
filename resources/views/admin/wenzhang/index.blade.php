
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
    <a href="{{url('wenzhang/create')}}"><b>添加</b></a><br>
    <form action="" method="">
        <input type="text" name="wen_name" value="{{$query['wen_name']??''}}" placeholder="请输入文章标题">
        <select name="type_id">
            <option value="">--请选择--</option>
            @foreach($typeInfo as $v)
                @if(isset($query['type_id'])&&$query['type_id']==$v->type_id)
                    <option value="{{$v->type_id}}" selected>{{$v->type_name}}</option>
                @else
                    <option value="{{$v->type_id}}">{{$v->type_name}}</option>
                @endif
            @endforeach
        </select>
        <button>搜索</button>
    </form>
    <hr>
    <thead>
    <tr>
        <th>文章ID</th>
        <th>文章标题</th>
        <th>文章类型</th>
        <th>文章重要性</th>
        <th>是否显示</th>
        <th>文章作者</th>
        <th>作者email</th>
        <th>关键字</th>
        <th>描述</th>
        <th>文章配图</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>

        @foreach($data as $v)
            <tr class="active">
                <td>{{$v->wen_id}}</td>
                <td>{{$v->wen_name}}</td>
                <td>{{$v->type_name}}</td>
                <td>{{$v->wen_zhong}}</td>
                <td>
                    @if($v->wen_show == 1)
                        √
                    @else
                        ×
                    @endif
                </td>
                <td>{{$v->wen_man}}</td>
                <td>{{$v->man_email}}</td>
                <td>{{$v->wen_guan}}</td>
                <td>{{$v->wen_desc}}</td>
                <td><img src="{{env('UPLOAD_URL')}}{{$v->wen_img}}" width="100"></td>

                <td>
                <a class="btn btn-danger" href="{{ url('wenzhang/destroy/'.$v->wen_id)}}">删除</a>
                <a class="btn btn-success" href="{{ url('wenzhang/edit/'.$v->wen_id)}}">修改</a>
                </td>
            </tr>
        @endforeach


    <tr><td colspan="6">{{$data->appends($query)->links()}}</td></tr>
    </tbody>
</table>
</body>
</html>