<!DOCTYPE html>
<html>
<head>
  <title>メッセージ編集画面</title>
  <meta charset="UTF-8">
</head>
<body>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <form action="{{ url("messages/{$message->id}") }}" method="POST">
        @csrf
        @method('PATCH')
        ID:{{ $message->id }}<br>
        ユーザー:{{ $message->user_id }}<br>
        カテゴリー:
        <select name="category_id">
            @foreach ($categories as $category)
                @if ($category->id == old('category_id'))
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
        <br>
        タイトル:<input type="text" name="title" value="{{ $message->title }}"><br>
        本文:<br>
        <textarea name="body">{{ $message->body }}</textarea><br>
        <button type="submit">送信</button>
    </form>
</body>
</html>