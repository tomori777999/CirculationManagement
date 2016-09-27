<div class="container">
  <div class="left-block" style="max-width:800px;">
    <h2 class="page-header">PC情報の編集</h2>
    @foreach($data as $computer)
      {!! Form::open(['url' => '/admin/edit_computer']) !!}
          <div class="form-group">
              {!! Form::input('text', 'computer_name', null, ['required', 'class' => 'form-control', 'placeholder' => "$computer->computer_name"]) !!}
          </div>
          <input type="hidden" name="form_name" value="computers" />
          <input type="hidden" name="computer_id" value="{{ $computer->id }}" />
          <button type="submit" class="btn btn-success pull-right">更新</button>
      {!! Form::close() !!}
    @endforeach
  </div>
</div>
