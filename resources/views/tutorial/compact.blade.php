<!DOCTYPE html>
<html>
<head>
  <title>compact関数</title>
  <meta charset="UTF-8">
</head>
<body>
    <p>{{ $str }}</p>
    <ol>
        @foreach ($ary as $val)
            <li>{{ $val }}</li>
        @endforeach
    </ol>
</body>
</html>