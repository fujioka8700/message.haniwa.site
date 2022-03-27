<!DOCTYPE html>
<html>
<head>
  <title>htmlエスケープ</title>
  <meta charset="UTF-8">
</head>
<body>
    <p>{{ $str }}</p> <!-- htmlエスケープされる -->
    <p>{!! $str !!}</p> <!-- htmlエスケープしたくない場合 -->
</body>
</html>