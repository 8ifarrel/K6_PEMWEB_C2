</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../styles/base.css" />
  <link rel="stylesheet" href="../styles/account.css" />
</head>

<body>
  <form action="../actions/register.php" method="POST">
    
    <div class="account-form-container ">
      <h2>Register</h2>

      <label for="">Nama Lengkap</label>
      <input type="text" name="nama_lengkap" placeholder="Nama lengkap" class="input-box" required>

      <label for="">Email</label>
      <input type="email" name="email" placeholder="Email" class="input-box" required>

      <label for="">Password</label>
      <input type="password" name="password" placeholder="Password" class="input-box" required>

      <label for="">Konfirmasi Password</label>
      <input type="password" name="konfirmasi" placeholder="Password" class="input-box" required>
      
      <input type="submit" value="Register" name="register" class="submit-btn">
    
      <div class="link">
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
      </div>
    </div>
  </form>
</body>

</html>