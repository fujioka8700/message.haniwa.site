<!DOCTYPE html>
<html>
<head>
  <title>コメント、true、false</title>
  <meta charset="UTF-8">
</head>
<body>
  <?php
    $var1 = 10;
    $num = 10;
  ?>
  @php
    $var2 = 20;
  @endphp
  <p>var1:{{ $var1 }}</p>
  <p>var2:{{ $var2 }}</p>
  @if ($num === 10)
    $numは10です。
  @endif
<br>
@php
    $num = 10;
@endphp
@if ($num >= 10)
    $numは10以上です。
@else
    $numは10未満です。
@endif

<br>
@php
    $num = 9;
@endphp
@if ($num > 10)
    $numは10以上です。
@elseif($num === 10)
    $numは10に等しいです。
@else
    $numは10未満です。
@endif

<br>
@php
    $num = 10;
@endphp
@unless ($num > 10)
    $numは10より大きくはありません
@else
    $numは10より大きいです
@endunless

<br>
@php
    $status = 2;
@endphp
@switch($status)
    @case(1)
        有効
        @break
    @case(2)
        退会済み    
        @break
    @default
        無効
@endswitch

<br>
@php
    // unset($num);
    $num = null;
@endphp
@isset($num)
    $numは定義済み、かつnullではない。
@else
    $numは未定義、もしくはnullです。
@endisset

<br>
@php
    $num = 10;
@endphp
@empty($num)
    $numは、未定義、''(空文字)、0、nullのどれかです。
@else
    $numは、未定義、''(空文字)、0、nullのどれでもありません。
@endempty

<br>
@for ($i = 1; $i <= 5; $i++)
    {{ $i }}<br>
@endfor

<br>
@foreach ($messages as $message)
    id:{{$message['id']}} body:{{$message['body']}}<br>
@endforeach

<br>
@forelse ($messages2 as $message)
    id:{{$message['id']}} body:{{$message['body']}}<br>
@empty
    メッセージはりません。
@endforelse

<br>
@for ($i = 1; $i <= 10; $i++)
  @if ($i % 2 == 0)
    @continue
  @endif
  {{ $i }}<br>
@endfor

<br>
@for ($i = 1; $i <= 10; $i++)
  @continue($i % 2 == 0)
  {{ $i }}<br>
@endfor

<br>
@for ($i = 1; $i <= 10; $i++)
  @if ($i > 5)
    @break
  @endif
  {{ $i }}<br>
@endfor

<br>
@for ($i = 1; $i <= 10; $i++)
  @break($i > 5)
  {{ $i }}<br>
@endfor

<br>
@foreach ($messages as $message)
    {{$loop->index}}     {{-- 現在のインデックス(0から始まる) --}}
    {{$loop->iteration}} {{-- 繰り返し回数(1から始まる) --}}
    {{$loop->remaining}} {{-- 残りの数 --}}
    {{$loop->count}}     {{-- 配列の要素数 --}}
    {{$loop->first}}     {{-- 最初の要素か --}}
    {{$loop->last}}      {{-- 最後の要素か --}}
    {{$loop->even}}      {{-- 偶数回目か --}}
    {{$loop->odd}}       {{-- 奇数回目か --}}
    {{$loop->depth}}     {{-- ネストレベル --}}
    {{$loop->parent}}    {{-- ネストしている場合、親のループ回数 --}}

    body: {{$message['body']}}<br>
@endforeach

{{-- CSRFトークンの隠しタグ --}}
@csrf

{{-- CSRFトークンの隠しタグ --}}
{{ csrf_field() }}
</body>
</html>