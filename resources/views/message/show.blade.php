<!DOCTYPE html>
<html>
<head>
  <title>詳細画面</title>
  <meta charset="UTF-8">
</head>
<body>
    ID:{{ $message->id }}<br>
    カテゴリー:{{ $message->category_id }}<br>
    ユーザー:{{ $message->user_id }}<br>
    タイトル:{{ $message->title }}<br>
    本文:{!! nl2br(e($message->body)) !!}<br>
    作成日時:{{ $message->created_at }}<br>{{-- 改行処理 --}}
    更新日時:{{ $message->updated_at }}
</body>
</html>