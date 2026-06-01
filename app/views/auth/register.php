<!DOCTYPE html>
<html>
<head>

    <title>Register - Thrifty</title>

    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/register.css">

</head>
<body>

<div class="register-container">

    <div class="register-card">

        <h2>Daftar Akun</h2>

        <form method="POST">

            <input
                type="text"
                name="nama"
                placeholder="Nama Lengkap"
                required
            >

            <input
                type="email"
                name="email"
                placeholder="Email"
                required
            >

            <input
                type="text"
                name="wa"
                placeholder="Nomor WhatsApp"
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
                name="register"
                class="btn"
            >
                Daftar
            </button>

        </form>

        <p>

            Sudah punya akun?

            <a href="index.php?page=login">
                Login
            </a>

        </p>

    </div>

</div>

</body>
</html>