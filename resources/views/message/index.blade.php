<!DOCTYPE html>
<html>
<head>
  <title>一覧画面</title>
  <meta charset="UTF-8">
</head>
<body>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    {{-- @php
        foreach ($category->messages as $message) {
            echo "{$message->id}:{$message->title}<br>";
        }
    @endphp --}}
    {{-- <p>ログイン中ユーザー名：{{ Auth::user()->name }}</p> --}}
    {{-- エラー表示 --}}
    @include('common.errors')
    <a href="{{ url("/messages/create") }}">メッセージ作成</a>
    <table border="1">
        <tr>
            <th>ID</th><th>カテゴリー</th><th>タイトル</th><th>ユーザー</th><th>編集</th><th>削除</th>
        </tr>
        @forelse ($messages as $message)
        <tr>
            <td>{{$message->id}}</td>
            <td>{{$message->category->name}}</td>
            <td><a href="{{ url("/messages/{$message->id}") }}">{{$message->title}}</a></td>
            <td>{{$message->user->name}}</td>
            @if ($message->user_id == Auth::id())
                <td><a href="{{ url("/messages/{$message->id}/edit") }}">編集</a></td>
                <td>
                    <form action="{{ url("/messages/{$message->id}") }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">削除</button>
                    </form>
                </td>
            @else
                <td></td><td></td>    
            @endif
            
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