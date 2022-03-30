<!DOCTYPE html>
<html>
<head>
  <title>一覧画面</title>
  <meta charset="UTF-8">
</head>
<body>
    <a href="{{ url("/messages/create") }}">メッセージ作成</a>
    <table border="1">
        <tr>
            <th>ID</th><th>カテゴリー</th><th>タイトル</th><th>ユーザー</th><th>編集</th><th>削除</th>
        </tr>
        @forelse ($messages as $message)
        <tr>
            <td>{{$message->id}}</td>
            <td>{{$message->category_id}}</td>
            <td><a href="{{ url("/messages/{$message->id}") }}">{{$message->title}}</a></td>
            <td>{{$message->user_id}}</td>
            <td><a href="{{ url("/messages/{$message->id}/edit") }}">編集</a></td>
            <td>
                <form action="{{ url("/messages/{$message->id}") }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">メッセージがありません</td>
        </tr>
        @endforelse
    </table>
    @unless (is_null($messages->previousPageUrl()))
        <a href="{{ $messages->previousPageUrl() }}">前へ</a>
    @endunless
    @unless (is_null($messages->previousPageUrl() && $messages->nextPageUrl()))
        {{ $messages->currentPage() }}/{{ $messages->lastPage() }} ページ
    @endunless
    @unless (is_null($messages->nextPageUrl()))
        <a href="{{ $messages->nextPageUrl() }}">次へ</a>
    @endunless
</body>
</html>