<div class="col-lg-9 col-md-8">
    <div class="table-responsive">
        <table class="table table-striped table-hover" style="table-layout:fixed;">
          <caption>
            <h2>【管理PCリスト】</h2>
          </caption>
            <thead class="thead-inverse">
              <tr>
                  <th style="max-width:300px;">PC_Name</th>
                  <th>Edit_Menu</th>
              </tr>
            </thead>
                <tbody>
                  @foreach($data as $computer)
                  <tr>
                      <td class="td_vertical_align_middle" style="max-width:300px;">{{{ $computer->computer_name }}}</td>
                      <td>
                        <table>
                          <tr>
                            <td>
                              <a href="{{url('computer/update',$computer->id)}}"><span class="glyphicon glyphicon-pencil"></span>このPCを編集
                              </a>&nbsp;
                            </td>
                            <td>
                              <a href="#" data-toggle="modal" data-target="#deleteModal{{$computer->id}}">
                                <span class="glyphicon glyphicon-remove"></span>このPCを削除
                              </a>
                            </td>
                          </tr>
                        </table>
                      </td>
                  </tr>
                  <div class="modal fade" id="deleteModal{{$computer->id}}">
                     <div class="modal-dialog">
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title alert alert-danger">『{{$computer->computer_name}}』の削除</h4>
                         </div>
                         <div class="modal-body">
                           <p>本当に削除してもいいですか</p>
                         </div>
                         <div class="modal-footer">
                           {!! Form::open(['url'=>'computer/delete']) !!}
                           {!! Form::hidden('id',$computer->id) !!}
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <input type="submit" class="btn btn-danger" value="削除">
                           {!! Form::close() !!}
                         </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                  @endforeach
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-success" href="#" onClick="document.add_computer.submit();">新しいPCを追加</a>
            <form name="add_computer" method="post" action="/admin/index" >
              <input type="hidden" name="form_name" value="add_computer" />
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </form>
        </div>
    </div>
