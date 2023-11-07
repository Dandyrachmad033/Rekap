<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Login </title>
  <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href=<?= base_url('css/style.css') ?>>
  <!-- Fontawesome CDN Link -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Boulder&display=swap">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div data-aos="fade-down" data-aos-delay="300" class="container">
    <div>
      <input type="checkbox" id="flip">
      <div class="cover">
        <div class="front">
          <img src="images/logos.jpg" alt="my_images">

        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">SEKSI P2PM</div>
            <form action=<?= base_url('Login') ?> method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input name="username" type="username" id="username" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input name="password" type="password" id="password" placeholder="Enter your password" required>
                </div>
                <div class="text"><a href="#">Forgot password?</a></div>
                <?php if (session()->has('error')) : ?>
                  <div class="alert alert-info" role="alert">
                    <?= session('error') ?>
                  </div>
                <?php endif; ?>

                <div class="button input-box">
                  <input type="submit" value="Login">
                </div>
                <!-- <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>