@extends('layouts.app')

@section('content')
<div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
    <ul class="nav nav-pills nav-stacked">
        <li class="nav-item"><a class="nav-link" href="#">貸出log一覧</a></li>
        <li class="nav-item"><a class="nav-link" href="#">PC情報編集</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Menu3</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Menu4</a></li>
    </ul>
</div>
[コンテンツ]</br>
ここには、log画面時にはドロップダウンリスト[users][computers][rownum]を、pc編集画面時にはボタン[add]を右寄せで設置...したい

@include('layouts.admins_contents.logs')

@endsection
