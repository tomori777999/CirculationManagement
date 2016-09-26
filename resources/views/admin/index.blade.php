@extends('layouts.app')

@section('content')
<div class="row row-offcanvas row-offcanvas-left">
    <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
        <ul class="nav nav-pills nav-stacked">
          <li class="nav-item"><form name="logs" method="post" action="/admin/index" >
            <button type="submit" class="btn btn-link">貸出log</button>
            <input type="hidden" name="form_name" value="logs" />
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          </form>
          <li class="nav-item"><form name="computers" method="post" action="{{ url("/admin/index") }}" >
            <button type="submit" class="btn btn-link">PC情報</button>
            <input type="hidden" name="form_name" value="computers" />
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          </form>
            <li class="nav-item"><a class="nav-link" href="#">Menu3</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Menu4</a></li>
        </ul>
    </div>

    <div class="col-md-9 col-lg-10 main">

      [コンテンツ]</br>

      @if($form_name == "logs")
        @include('layouts.admin_contents.logs')
      @elseif($form_name == "computers")
        @include('layouts.admin_contents.computers')
      @endif


    </div>
        <!--/main col-->
</div>

@endsection
