<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .todo-table td {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
<div class="container">
<h2 class="page-header">利用状況一覧</h2>
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

        <form action="/" method="post">
        </form>
        <td>
            <button class="btn btn-danger" type="submit"
              <?php
                if($computer->circulation_flag == 1){echo "disabled";}
              ?>
            >使用</button>
        </td>
        {!! Form::close() !!}
    </tr>
    @endforeach
</tbody>
</table>
</div>
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
