<!DOCTYPE html>
<html>
<head>
  <title>データ追加画面</title>
  <meta charset="UTF-8">
</head>
<body>
    {{ session('status') }}
    <h1>データ追加画面</h1>
    <form action="{{ url('tutorial') }}" method="POST">
        @csrf
        <p>タイトル</p>
        <input type="text" name="title" value="{{ old('title') }}">
        <p>本文</p>
        <textarea name="body" cols="10" rows="3">{{ old('body') }}</textarea><br>
        <button type="submit">送信</button>
    </form>
</body>
</html>