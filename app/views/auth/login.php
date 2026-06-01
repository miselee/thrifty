<!DOCTYPE html>
<html>
<head>

    <title>Login - Thrifty</title>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/login.css">

</head>
<body>

<div class="login-container">

    <div class="login-left">

        <h1>🌿 Thrifty</h1>

        <h2>Thrift Better,<br>Live Better</h2>

        <p>
            Marketplace pakaian thrift
            berkualitas dengan sistem COD.
        </p>

    </div>

    <div class="login-right">

        <div class="form-card">

            <h2>Login</h2>

            <form method="POST">

                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    required
                >

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                >

                <button
                    type="submit"
                    name="login"
                    class="btn"
                >
                    Masuk
                </button>

            </form>

            <p>

                Belum punya akun?

                <a href="index.php?page=register">
                    Daftar
                </a>

            </p>

        </div>

    </div>

</div>

</body>
</html>