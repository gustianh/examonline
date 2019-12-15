<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?=site_url('assets/vendor/twitter-bootstrap/css/bootstrap.min.css'); ?>">

  <title>Sign In</title>
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: -webkit-box;
      display: flex;
      -ms-flex-align: center;
      -ms-flex-pack: center;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    select {
      height: 3em !important;
    }

  </style>
</head>

<body class="text-center">
  <form class="form-signin" action="<?php echo site_url('login/auth'); ?>" method="post">
    <img class="mb-4" src="assets/img/nepal.jpg" alt="" width="72"
      height="72">

    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

    <label for="username" class="sr-only">Username</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="username" required autofocus>

    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

    <label for="level" class="sr-only">Level</label>
    <select class=" form-control" id="level" name="level">
      <option selected value="1">Operator</option>
      <option value="2">Guru</option>
      <option value="3">Siswa</option>
    </select>

    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
  </form>
</body>

</html>
