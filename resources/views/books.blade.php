<!-- resources/views/books.blade.php -->

@extends('layouts.app')

@section('content')
    
<div class="container-fluid bg-info">
    <nav class="navbar navbar-default" style="display:none;">
            </nav>
    <!-- Bootstrap の定形コード... -->

    <div class="panel-body">
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
    </div>    
    
    <h3>
        現在の登録数は：{{ count($books) }}冊です
    </h3>
        
        <!-- 本登録フォーム -->
        <form action="{{ url('books') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            
            <!-- 本のタイトル -->
            <div class="form-group">
                <label for="book" class="col-sm-2 control-label">タイトル</label>
                <div class="col-sm-5">
                    <input type="text" name="item_name" id="book-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="book" class="col-sm-2 control-label">金額</label>
                <div class="col-sm-5">
                    <input type="text" name="item_amount" id="book-amount" class="form-control">
                </div>
            </div>

            
            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        Save
                    </button>
                </div>
            </div>
        </form>
        
        
         <!-- 現在 本 -->
         @if (count($books) > 0)
        <div class="panel panel-info">
                <div class="panel-heading"> 
                   <h5 class="panel-title">一覧</h5>
                </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <tr>
                        <th>タイトル</th>
                        <th>金額</th>
                        <th>購入日</th>
                        </tr>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                         @foreach ($books as $book)
                            <tr>
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $book->item_name or 'まだ登録されていません' }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $book->item_amount }}円</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $book->published }}</div>
                                </td>
                                <!-- 本: 削除ボタン -->
                            </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <!--  ook: 既に登録されてる本 リスト -->
   
    </div>
    

    
@endsection




