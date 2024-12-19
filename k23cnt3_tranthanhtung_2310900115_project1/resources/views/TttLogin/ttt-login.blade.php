<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <h1>Đăng nhập</h1>
    <form method="POST" action="{{ route('ttt-login.submit') }}">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="ttt_email" value="{{ old('ttt_email') }}" required>
        </div>
        <div>
            <label>Mật khẩu:</label>
            <input type="password" name="ttt_mat_khau" required>
        </div>
        @if ($errors->any())
            <div style="color: red;">
                <strong>{{ $errors->first('ttt_email') }}</strong>
            </div>
        @endif
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>
