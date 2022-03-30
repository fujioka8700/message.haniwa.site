<!DOCTYPE html>
<html>
<head>
  <title>メッセージ作成画面</title>
  <meta charset="UTF-8">
</head>
<body>
    <ul>
        @foreach ($errors->all() as $error)
            <li>エラー:{{ $error }}</li>
        @endforeach
    </ul>
    <form action="{{ url('messages') }}" method="POST">
        @csrf
        カテゴリー:<input type="text" name="category_id" value="{{ old('category_id') }}"><br>
        タイトル:<input type="text" name="title" value="{{ old('title') }}"><br>
        本文:<br>
        <textarea name="body">{{ old('body') }}</textarea><br>
        <button type="submit">送信</button>
    </form>
</body>
</html>