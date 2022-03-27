<!DOCTYPE html>
<html>
<head>
  <title>formテスト</title>
  <meta charset="UTF-8">
</head>
<body>
  @isset ($title)
    <p>送信されてきた内容：{{ $title }}</p>
  @endisset
    <form action="{{ url('tutorial/formtest') }}" method="POST">
        @method('PATCH')
        @csrf
        <input type="text" name="title" value="">
        <button type="submit" name="formtest">送信</button>
    </form>
</body>
</html>