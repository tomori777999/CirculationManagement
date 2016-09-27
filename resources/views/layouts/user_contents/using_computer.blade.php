<div class="container">
<h2 class="page-header">現在『{{$data}}』を利用中です</h2>
<p>
  別のPCを利用したい場合は"返却"をして下さい。
</p>
{!! Form::open(['url' => 'circulatelist/replace', 'method' => 'PUT']) !!}
  <button  type="submit" class="btn btn-success" >利用中のPCを返却する</button>
{!! Form::close() !!}
