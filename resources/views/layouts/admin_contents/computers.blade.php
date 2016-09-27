<div class="col-lg-9 col-md-8">
    <div class="table-responsive">
        <table class="table table-striped">
          <caption>
            <h2>【管理PCリスト】</h2><a class="btn btn-success" href="/admin/create">新しいPCを追加</a>
          </caption>
            <thead class="thead-inverse">
              <tr>
                  <th>Computer_name</th>
                  <th>Menu</th>
              </tr>
            </thead>
                <tbody>
                  @foreach($data as $computer)
                  <tr>
                      <td>{{{ $computer->computer_name }}}</td>
                      <td>
                        <table>
                          <tr>
                            <td>
                              {!! Form::open(['url' => 'admins', 'method' => 'PUT']) !!}
                                  <button  type="submit" class="btn btn-success" >このPCを編集</button>
                                  <input type="hidden" name="computer_id" value="{{{$computer->id}}}">
                              {!! Form::close() !!}
                            </td>
                            <td>
                              {!! Form::open(['url' => 'admins', 'method' => 'PUT']) !!}
                                  <button  type="submit" class="btn btn-danger" >このPCを削除</button>
                                  <input type="hidden" name="computer_id" value="{{{$computer->id}}}">
                              {!! Form::close() !!}
                            </td>
                          </tr>
                        </table>
                      </td>
                  </tr>
                  @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
