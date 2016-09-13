@extends('layouts.app')

@section('content')
  @if($user_status == 0)
<div class="container">
<h2 class="page-header">利用状況一覧</h2>
<table class="table table-hover todo-table">
    <thead>
    <tr>
        <th>PC名</th>
        <th>貸出フラグ</th>
        <td></td>
        <td></td>
    </tr>
    </thead>
    <tbody class="table-hover">
    @foreach($computers as $computer)
    <tr>
        <th>{{{ $computer->computer_name }}}</th>


        @if($computer->circulation_flag == 0)
            <td style="color:blue"> 貸出可</td>
        @else
            <td style="color:gray" class="danger"> 貸出不可</td>
        @endif

        {!! Form::open(['url' => 'circulatemanagement/update', 'method' => 'PUT']) !!}
        <td></td>
        <td>
        @if($computer->circulation_flag == 0)
            <button  type="submit" class="btn btn-success" >このPCを利用する</button>
        @endif
            <input type="hidden" name="computer_id" value="{{{$computer->id}}}">
        </td>
        {!! Form::close() !!}
    </tr>
    @endforeach
</tbody>
</table>
</div>
@else

<div class="container">
<h2 class="page-header">現在利用中です</h2>

<p>
  別のPCを利用したい場合は"返却"をして下さい。
</p>
{!! Form::open(['url' => 'circulatemanagement/replace', 'method' => 'POST']) !!}
  <button  type="submit" class="btn btn-success" >利用中のPCを返却する</button>
{!! Form::close() !!}
@endif

@endsection
