@extends('layouts.app')

@section('content')
@if($user_status == 0)
  @include('layouts.user_contents.computerlist')
@else
  @include('layouts.user_contents.using_computer')
@endif

@endsection
