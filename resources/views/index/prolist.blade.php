@extends('layouts.shop')

@section('title','商品列表')

@section('content')

 <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <form action="#" method="get" class="prosearch"><input type="text" /></form>
      </div>
     </header>
 <div class="zhaieq">
     <a href="javascript:;" class="zhaiCur">新品</a>
     <a href="javascript:;">热卖</a>
     <a href="javascript:;" style="background:none;">精品</a>
     <div class="clearfix"></div>
 </div><!--zhaieq/-->
 <div class="proinfoList">
     @foreach($data as $v)
         <dl>
             <dt><a href="{{url('/proinfo/'.$v->goods_id)}}"><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}"  width="636" height="822"  /></a></dt>
             <dd>
                 <h4><a href="{{url('/proinfo/'.$v->goods_id)}}">{{$v->goods_name}}</a></h4>
                 <div class="prolist-price"><strong>{{$v->goods_price}}</strong></div>
                 <div class="prolist-yishou"><span>5.0折</span> <em>库存：{{$v->goods_num}}</em></div>
             </dd>
             <div class="clearfix"></div>
         </dl>
         <hr>
     @endforeach
 </div><!--proinfoList/-->

 <div class="proinfoList">
     @foreach($host as $v)
         <dl>
             <dt><a href="{{url('/proinfo/'.$v->goods_id)}}"><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" width="636" height="822" /></a></dt>
             <dd>
                 <h4><a href="{{url('/proinfo/'.$v->goods_id)}}">{{$v->goods_name}}</a></h4>
                 <div class="prolist-price"><strong>{{$v->goods_price}}</strong></div>
                 <div class="prolist-yishou"><span>5.0折</span> <em>库存：{{$v->goods_num}}</em></div>
             </dd>
             <div class="clearfix"></div>
         </dl>
         <hr>
     @endforeach
 </div><!--proinfoList/-->

 {{--<div class="proinfoList">--}}
     {{--@foreach($best as $v)--}}
         {{--<dl>--}}
             {{--<dt><a href="{{url('/proinfo/'.$v->goods_id)}}"><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" width="636" height="822" /></a></dt>--}}
             {{--<dd>--}}
                 {{--<h4><a href="{{url('/proinfo/'.$v->goods_id)}}">{{$v->goods_name}}</a></h4>--}}
                 {{--<div class="prolist-price"><strong>{{$v->goods_price}}</strong></div>--}}
                 {{--<div class="prolist-yishou"><span>5.0折</span> <em>库存：{{$v->goods_num}}</em></div>--}}
             {{--</dd>--}}
             {{--<div class="clearfix"></div>--}}
         {{--</dl>--}}
         {{--<hr>--}}
     {{--@endforeach--}}
 </div><!--proinfoList/-->
 <table class="jrgwc">
     <tr>
         <th>
             <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
         </th>
@endsection