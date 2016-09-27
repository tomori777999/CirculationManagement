<div class="col-lg-9 col-md-8">
    <div class="table-responsive">
      <table class="table table-striped" style="table-layout:fixed;">
        <caption>
          <h2>【貸出log】</h2>
        </caption>
          <thead class="thead-inverse">
              <tr>
                  <th style="width:200px;">User_Name</th>
                  <th style="width:200px;">PC_Name</th>
                  <th style="width:150px;">Status</th>
                  <th>Time</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($data as $log)
              <tr>
                  <td style="width:200px;">{{ $log->name }}</td>
                  <td style="width:200px;">{{ $log->computer_name }}</td>
                    @if($log->circulation_flag == 1)
                      <td style="width:150px;">利用開始</td>
                    @elseif($log->circulation_flag == 0)
                      <td style="width:150px;">返却</td>
                    @endif
                  <td>{{ $log->created_at }}</td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </table>
    </div>
</div>
