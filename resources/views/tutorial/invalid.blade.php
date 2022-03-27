<!DOCTYPE html>
<html>
<head>
  <title>展開の無効化</title>
  <meta charset="UTF-8">
</head>
<body>
    <p>@{{ $str }}</p>
    @verbatim
    {{ tutorial_1 }}<br>
    {{ $str }}<br>
    {{ tutorial_2 }}
    @endverbatim
</body>
</html>