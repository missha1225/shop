<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/cart.css">
    <title><?php echo $page_name?></title>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="header-container-nav">
                <div class="header-container-logo">
                    
                    <a href="../controllers/main.php"><img src="../images/logo.jpg" alt="shop-logo" class="logo"></a>
                </div>
                <nav>
                    <a href="../controllers/catalog.php?collection_id=2">Женщинам</a>
                    <a href="../controllers/catalog.php?collection_id=1">Мужчинам</a>
                    <a href="../controllers/catalog.php?collection_id=3">Детям</a>
                    <a href="#">Новинки</a>
                    <a href="#">О нас</a>
                </nav>
            </div>
            <div class="header-container-enter-and-bascet">
                <img src="../images/account.png" alt="enter-image">
                <a href="../controllers/admin_auth.php">Войти</a>
                <img src="../images/bascet.png" alt="bascet-image">
                <a href="../controllers/cart.php">Корзина</a>
            </div>
        </header>
        <hr>
