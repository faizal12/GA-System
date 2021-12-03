<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel="stylesheet" href="<?=base_url('assets/dist/css/login/dist/style.css')?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container" onclick="onclick">
  <div class="top"></div>
  <div class="bottom"></div>
  <div class="center">
    <h2>Please Sign In</h2>
    
    <form action="<?php echo base_url('index.php/auth/login') ?>" method="post">
      <input type="text" name="user" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <input type="submit" id="submit" value="Sign In">
    </form>
    <h2>&nbsp;</h2>
  </div>
</div>
<!-- partial -->
  <script src='https://codepen.io/banik/pen/3f837b2f0085b5125112fc455941ea94.js'></script>
</body>
</html>
