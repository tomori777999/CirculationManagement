@extends('layouts.app')

@section('content')
<div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
    <ul class="nav nav-pills nav-stacked">
        <li class="nav-item"><a class="nav-link" href="#">貸出log一覧</a></li>
        <li class="nav-item"><a class="nav-link" href="#">PC情報編集</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Menu3</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Menu4</a></li>
    </ul>
</div>
[コンテンツ]</br>
ここには、log画面時にはドロップダウンリスト[users][computers][rownum]を、pc編集画面時にはボタン[add]を右寄せで設置...したい
<div class="col-lg-9 col-md-8">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Column1</th>
                                    <th>Column2</th>
                                    <th>Column3</th>
                                    <th>Column4</th>
                                    <th>Column5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Row1_1</td>
                                    <td>Row1_2</td>
                                    <td>Row1_3</td>
                                    <td>Row1_4</td>
                                    <td>Row1_5</td>
                                </tr>
                                <tr>
                                    <td>Row2_1</td>
                                    <td>Row2_2</td>
                                    <td>Row2_3</td>
                                    <td>Row2_4</td>
                                    <td>Row2_5</td>
                                </tr>
                                <tr>
                                    <td>Row3_1</td>
                                    <td>Row3_2</td>
                                    <td>Row3_3</td>
                                    <td>Row3_4</td>
                                    <td>Row3_5</td>
                                </tr>
                                <tr>
                                    <td>Row4_1</td>
                                    <td>Row4_2</td>
                                    <td>Row4_3</td>
                                    <td>Row4_4</td>
                                    <td>Row4_5</td>
                                </tr>
                                <tr>
                                    <td>Row5_1</td>
                                    <td>Row5_2</td>
                                    <td>Row5_3</td>
                                    <td>Row5_4</td>
                                    <td>Row5_5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
@endsection
