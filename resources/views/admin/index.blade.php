<?php
  // if(Auth::guard('admin')->check())
  // {
  //   var_dump("admin");
  // }else {
  //   var_dump("error");
  // }
  // exit;
?>

<!-- @if (Auth::guard('admin')->check()) -->

<?php $id = 'logs' ?>

@extends('layouts.app')

@section('content')
<div class="row row-offcanvas row-offcanvas-left">
    <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
        <ul class="nav nav-pills nav-stacked">
            <li class="nav-item"><a class="nav-link" href="{{ url("admin?id=logs") }}">貸出log一覧</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url("admin?id=computers") }}">PC情報編集</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Menu3</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Menu4</a></li>
        </ul>
    </div>

    <div class="col-md-9 col-lg-10 main">

      [コンテンツ]</br>

      @if($id == "logs")
        @include('layouts.admin_contents.logs')
      @elseif($id == "computers")
        @include('layouts.admin_contents.computers')
      @endif


    </div>
        <!--/main col-->
</div>

@endsection

<!-- @else
  <p>userです</p>
@endif -->
