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
  <form action="../actions/login.php" method="POST">
    
    <div class="account-form-container ">
      <h2>Login</h2>
      
      <label for="">Email</label>
      <input type="email" name="email" placeholder="Email" class="input-box" required>

      <label for="">Password</label>
      <input type="password" name="password" placeholder="Password" class="input-box" required>
      
      <input type="submit" value="Login" name="login" class="submit-btn">
    
      <div class="link">
        <p>Belum punya akun? <a href="register.php">Register</a></p>
      </div>
    </div>
  </form>
</body>

</html>