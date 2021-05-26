@extends('layouts.app')

@section('content')
    <!-- ここにコンテンツを記述する -->
    <form method="post" action="{{ url('/example/send') }}">
        @csrf
        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ $name_default }}">
        </div>
        <div>
            <label for="message">内容</label>
            <textarea id="message" name="message" ></textarea>
        </div>
        <input type="submit" value="送信する">
    </form>
@endsection

@section('script')
<script>
    // ロード時処理は"$(function(){});"ではなく"window.onload"を使うこと
    // 理由：js/app.jsをdefer指定で読み込んでいる為、ロード後のスクリプト実行時に"$"が使えない
    window.onload = function(){
        $("#message").val("内容を入力");
    }

</script>
@endsection
