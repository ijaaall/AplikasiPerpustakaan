<h2>Register</h2>

@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form action="/register" method="get">
    @csrf
    <input type="text" name="name" id="name" placeholder="Nama"><br><br>
    <input type="email" name="email" id="email" placeholder="email"><br><br>
    <input type="password" name="password" id="password" placeholder="password"><br><br>
    <button type="submit">Register</button>
</form>

<p>sudah punya akun? <a href="/login">Login</a></p>
