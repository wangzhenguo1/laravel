
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
    <a href="{{url('category/create')}}"><b>添加</b></a><br>
    {{--<a href="{{url('brand/create')}}">添加</a>--}}
    <form action="" method="">
        <input type="text" name="brand_name" value="{{$query['cate_name']??''}}" placeholder="请输入品牌名称">
        <button>搜索</button>
    </form>
    <hr>
    <thead>
    <tr>
        <th>分类ID</th>
        <th>是否展示</th>
        <th>是否在导航来展示</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>

        @foreach($data as $v)
            <tr class="active">
                <td>{{$v->cate_id}}</td>
                <td>{{$v->cate_name}}</td>
               <td>
                   @if($v->cate_show == 1)
                    是
                @else
                    否
                @endif
               </td>
                <td>
                    @if($v->cate_show == 1)
                        是
                    @else
                        否
                    @endif
                </td>
                <td>
                <a class="btn btn-danger" href="{{ url('category/destroy/'.$v->cate_id)}}">删除</a>
                <a class="btn btn-success" href="{{ url('category/edit/'.$v->cate_id)}}">修改</a>
                </td>
            </tr>
        @endforeach


    <tr><td colspan="6">{{$data->appends($query)->links()}}</td></tr>
    </tbody>
</table>
</body>
</html>