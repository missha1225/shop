<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/admin_auth.css" />
    <title>Страница авторизации</title>
  </head>




  <body>   
      
  
    <form action="../controllers/admin_auth.php" method="POST">
        <h1>Страница авторизации</h1> 
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
        <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
  </body>
</html>


