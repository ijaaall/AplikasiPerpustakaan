<h2>Login</h2>

@if (session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif

<form action="/login" method="post">
    @csrf
    <input type="email" name="email" id="email" placeholder="email"><br><br>
    <input type="password" name="password" id="password" placeholder="password"><br><br>
    <button type="submit">Login</button>
</form>

<p>belum punya akun? <a href="/register">Register</a></p>
