@extends('layouts.shop')

@section('title','商品详情')

@section('content')

    <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
         @foreach($goodsInfo['goods_imgs'] as $v)
                <img src="{{env('UPLOAD_URL')}}{{$v}}" />
         @endforeach
     </div><!--sliderA/-->
     <table class="jia-len">
      <tr>
       <th><strong class="orange">{{$goodsInfo['goods_price']}}</strong></th>
       <td>
        <input type="text" class="spinnerExample" />
       </td>
      </tr>
      <tr>
       <td>
        <strong>{{$goodsInfo['goods_desc']}}</strong>
        <p class="hui">商品积分 : {{$goodsInfo['goods_score']}}</p>
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
     </table>

     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>
      <a href="javascript:;" style="background:none;">订购列表</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      <img src="{{env('UPLOAD_URL')}}{{$goodsInfo['goods_img']}}" width="636" height="822" />
     </div><!--proinfoList/-->
     <div class="proinfoList">
         {{$goodsInfo['goods_desc']}}
     </div><!--proinfoList/-->
     <div class="proinfoList">
      你好 ,没有订购信息
     </div><!--proinfoList/-->
     <table class="jrgwc">
      <tr>
       <th>
        <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><a href="{{url('/car')}}">加入购物车</a></td>
      </tr>
     </table>
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/static/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/static/index/js/bootstrap.min.js"></script>
    <script src="js/style.js"></script>
    <!--焦点轮换-->
    <script src="/static/index/js/jquery.excoloSlider.js"></script>
    <script>
        $(function () {
            $("#sliderA").excoloSlider();
        });
    </script>
    <!--jq加减-->
    <script src="/static/index/js/jquery.spinner.js"></script>
    <script>
        $('.spinnerExample').spinner({});
    </script>
    @endsection