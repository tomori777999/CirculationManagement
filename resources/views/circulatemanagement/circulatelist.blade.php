@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="page-header">利用状況一覧</h2>
<p class="pull-right">
<?php
  if($user_status == 1){
    echo '利用状況：借りてる';
  }else{
    echo '利用状況：借りてない';
  }
?>
</p>
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
        <td>{{{ $computer->computer_name }}}</td>
        <?php
          if($computer->circulation_flag == 0)
          {
            echo'<td style="color:blue">貸出可</td>';
          }elseif($computer->circulation_flag == 1) {
            echo'<td class="danger" style="color:gray">貸出不可</td>';
          }
        ?>
        <td><a class="btn btn-info" href="/">ログ</a></td>

        <form action="/update" method="update">
        </form>
        <td>
            <button  type="submit" class="btn
              <?php
                if($computer->circulation_flag == 1){
                  echo 'btn-danger" disabled >使用中...</button>';
                }elseif ($computer->circulation_flag == 0) {
                  echo 'btn-success " >利用する</button>';
                }
              ?>

              <iput type="hidden" name="computer_id" value="{{{$computer}}}">
        </td>
        {!! Form::close() !!}
    </tr>
    @endforeach
</tbody>
</table>
</div>
@endsection
