<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../css/admin_orders.php"> -->
    <title>Заказ</title>
</head>
<body>

    <h1>Состав заказа</h1>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">  
                <tr>
                    <th scope="col">id товара</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Картинка</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Коллекция</th>
                </tr>
            </thead>
            <tbody>
              <?php
              foreach ($products as $product) {
                echo '<tr>';
                echo '<td>'.$product->getProductId(). '</td>';
                echo '<td>'.$product->getPrice(). '</td>';
                echo '<td> <img src="../images/catalog/'.$product->getImage(). '" width="100" height="100"></td>';
                echo '<td>'.$product->getTitle(). '</td>';
                echo '<td>'.$product->getDescription(). '</td>';
                echo '<td>'.$product->getCategoryId(). '</td>';  
                echo '<td>'.$product->getCollectionId(). '</td>';
                
                echo '</tr>';
                } 
              ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>





