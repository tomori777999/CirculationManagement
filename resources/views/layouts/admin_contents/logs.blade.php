<div class="col-lg-9 col-md-8">
    <div class="table-responsive">
      <table class="table table-striped">
          <thead class="thead-inverse">
              <tr>
                  <th>UserName</th>
                  <th>PCName</th>
                  <th>Status</th>
                  <th>Time</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($logs as $log)
              <tr>
                  <td>{{ $log->name }}</td>
                  <td>{{ $log->computer_name }}</td>
                    @if($log->circulation_flag == 1)
                      <td>利用開始</td>
                    @elseif($log->circulation_flag == 0)
                      <td>返却</td>
                    @endif
                  <td>{{ $log->created_at }}</td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </table>
    </div>
</div>
