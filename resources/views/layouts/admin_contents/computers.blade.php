<div class="col-lg-9 col-md-8">
    <div class="table-responsive">
        <table class="table table-striped" style="table-layout:fixed;">
          <caption>
            <ul class="list-inline">
              <li><h2>【管理PCリスト】</h2></li>
              <li><a class="btn btn-success" href="/admin/create">新しいPCを追加</a></li>
              </li>
            </ul>
          </caption>
            <thead class="thead-inverse">
              <tr>
                  <th style="width:300px;">PC_Name</th>
                  <th>Edit_Menu</th>
              </tr>
            </thead>
                <tbody>
                  @foreach($data as $computer)
                  <tr>
                      <td class="td_vertical_align_middle" style="width:300px;">{{{ $computer->computer_name }}}</td>
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
