<!DOCTYPE html>
<html>
<head>
  <title>メッセージ編集画面</title>
  <meta charset="UTF-8">
</head>
<body>
    {{-- エラー表示 --}}
    @include('common.errors')
    <form action="{{ url("messages/{$message->id}") }}" method="POST">
        @csrf
        @method('PATCH')
        ID:{{ $message->id }}<br>
        ユーザー:{{ $message->user->name }}<br>
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