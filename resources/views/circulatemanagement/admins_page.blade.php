<?php $contents = $_GET['ctt'] ?>
@extends('layouts.app')

@section('content')
<div class="row row-offcanvas row-offcanvas-left">
    <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
        <ul class="nav nav-pills nav-stacked">
            <li class="nav-item"><a class="nav-link" href="admins?ctt=logs">貸出log一覧</a></li>
            <li class="nav-item"><a class="nav-link" href="admins?ctt=computerss">PC情報編集</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Menu3</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Menu4</a></li>
        </ul>
    </div>

    <div class="col-md-9 col-lg-10 main">

      [コンテンツ]</br>
      ここには、log画面時にはドロップダウンリスト[users][computers][rownum]を、pc編集画面時にはボタン[add]を右寄せで設置...したい
      @if($contents == "logs")
        @include('layouts.admins_contents.logs')
      @else
        @include('layouts.admins_contents.computers')
      @endif




    </div>
        <!--/main col-->
</div>

@endsection
