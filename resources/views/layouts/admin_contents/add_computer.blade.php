<div class="container">
  <div class="left-block" style="max-width:800px;">
    <h2 class="page-header">新しいPCの追加</h2>
    {!! Form::open(['url' => '/admin/add_computer']) !!}
        <div class="form-group">
            {!! Form::input('text', 'computer_name', null, ['required', 'class' => 'form-control', 'placeholder' => 'PC_Name']) !!}
        </div>
        <button type="submit" class="btn btn-success pull-right">追加</button>
    {!! Form::close() !!}
  </div>
</div>
