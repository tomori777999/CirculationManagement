<div class="col-lg-9 col-md-8">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-inverse">
              <tr>
                  <th>Computer_name</th>
                  <th>Menu</th>
              </tr>
            </thead>
                <tbody>
                  @foreach($computers as $computer)
                  <tr>
                      <td>{{{ $computer->computer_name }}}</td>
                      <td>
                          {!! Form::open(['url' => 'admins', 'method' => 'PUT']) !!}
                              <button  type="submit" class="btn btn-success" >編集</button>
                              <input type="hidden" name="computer_id" value="{{{$computer->id}}}">
                          {!! Form::close() !!}
                      </td>
                      <td>
                          {!! Form::open(['url' => 'admins', 'method' => 'PUT']) !!}
                              <button  type="submit" class="btn btn-danger" >削除</button>
                              <input type="hidden" name="computer_id" value="{{{$computer->id}}}">
                          {!! Form::close() !!}
                      </td>
                  </tr>
                  @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
