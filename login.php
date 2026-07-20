<?php
session_start();

if(isset($_SESSION['admin'])){
    header("location:admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Admin - Startscode</title>

<link rel="stylesheet" href="login.css">

</head>


<body>


<div class="login-container">


    <div class="login-card">


        <div class="logo">

            <img src="logo.png">

        </div>


        <h1>
            GUEST BOOK
        </h1>


        <p class="subtitle">
            Badan Pemeriksa Keuangan Perwakilan <br>Provinsi Sulawesi Barat
        </p>



        <form action="proses_login.php" method="POST">


            <div class="input-group">

                <label>
                    👤 Username
                </label>

                <input 
                type="text" 
                name="username"
                placeholder="Masukkan username"
                required>

            </div>



            <div class="input-group">


                <label>
                    🔒 Password
                </label>


                <div class="password-box">


                    <input 
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required>


                  <span id="togglePassword">
    <i class="fa-solid fa-eye"></i>
</span>


                </div>


            </div>



<button type="submit">

<i class="fa-solid fa-right-to-bracket"></i>

Masuk

</button>



        </form>


        <footer>

            © 2026 Startscode

        </footer>



    </div>


</div>



<script src="login.js"></script>


</body>
</html>
