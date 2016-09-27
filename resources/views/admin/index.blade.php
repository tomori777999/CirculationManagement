@extends('layouts.app')

@section('content')
<div class="row row-offcanvas row-offcanvas-left">
    <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
        <ul class="nav nav-pills nav-stacked">
          <li class="nav-item"><a class="nav-link" href="#" onClick="document.logs.submit();">貸出log</a></li>
            <form name="logs" method="post" action="/admin/index" >
              <input type="hidden" name="form_name" value="logs" />
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </form>
          <li class="nav-item"><a class="nav-link" href="#" onClick="document.computers.submit();">管理PCリスト</a></li>
            <form name="computers" method="post" action="{{ url("/admin/index") }}" >
              <input type="hidden" name="form_name" value="computers" />
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </form>
        </ul>
    </div>

    <div class="col-md-9 col-lg-10 main">



      @if($form_name == "logs")
        @include('layouts.admin_contents.logs')
      @elseif($form_name == "computers")
        @include('layouts.admin_contents.computers')
      @elseif($form_name == "add_computer")
        @include('layouts.admin_contents.add_computer')
      @elseif($form_name == "edit_computer")
        @include('layouts.admin_contents.edit_computer')
      @endif


    </div>
        <!--/main col-->
</div>

@endsection
