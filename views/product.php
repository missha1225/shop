<?php require_once "../templates/header.php" ?>
<main class="goods-main">
    <link rel="stylesheet" href="../css/good.css">
    <div class="goods-category">КАТАЛОГ / <?php echo mb_strtoupper($collection) . " / " . mb_strtoupper($category); ?></div>
    <div class="goods-image">
        <?php echo '<img src="../images/catalog/'.$product->getImage().'" alt="good-image" class="goods-image-item">'?>
    </div>
    <?php echo '<h1 class="goods-title">'.$product->getTitle().'</h1>'?>
    <div class="goods-vendor-code">Артикул: 385904</div>
    <?php echo '<div class="goods-price">'.$product->getPrice().' руб.</div>' ?>
    <?php echo '<div class="goods-description">'.$product->getDescription().'</div>'?>
    <div class="goods-size">РАЗМЕР</div>
    <div class="goods-size-items">
    <?php 
        foreach ($sizes as $size) {
            echo '<div class="goods-size-item" data-id="' .$size['size_id'] . '">' . $size['value'] . '</div>';
        }
    ?>
    </div>
    <div class="goods-add-to-cart-button" data-id="<?php echo $product->getProductId()?>"> ДОБАВИТЬ В КОРЗИНУ </div>
    
    <div class="goods-empty"></div>
    <?php foreach ($product as $products) {
        echo '<h2>'.$product->getTitle().'</h2>';
        echo '<h2>'.$product->getPrice().'</h2>';
        echo '<h2>'.$product->getDescription().'</h2>';
        echo '<h2>'.$product->getCategoryId().'</h2>';
        echo '<h2>'.$product->getOutOfStock().'</h2>';
    } ?>
</main>
<script src="../lib/jquery-3.3.1.min.js"></script>
<script src="../js/product.js"></script>
<?php require_once "../templates/footer.php" ?>
