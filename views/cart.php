<?php require_once "../templates/header.php" ?>
<link rel="stylesheet" href="../css/cart.css">
    <div class="cart">
        <div class="cart-center">
            <h2>ВАША КОРЗИНА</h2>
            <p><i>Товары резервируются на ограниченное время</i></p>
        </div>
        <?php 
            foreach ($product_info as $product_item) {
                echo "<div class=\"cart-product\">
                        <h3>{$product_item['product_number_in_cart']}. {$product_item['product_title']}</h3>
                        <h4>Размер: {$product_item['product_size']}</h4>
                        <p>{$product_item['product_count']} шт.</p>
                      </div>";
            }
        ?>
        <div class="cart-product">

        </div>
        <div>
            <div class="cart-center">
                <h2>Адрес доставки</h2>
                <p><i>Все поля обязательны для заполнения</i></p>
            </div>
            <div class="cart-form">
                <div class="cart-form-variant">
                    <p><i>Выберите вариант доставки</i></p>
                    <select name="a" id="a">
                        <option value="">Курьерская доставка 500 руб.</option>
                        <option value="">Самовывоз бесплатно</option>
                    </select>
                </div>
                <div class="cart-form-name forma">
                    Имя:
                    <input type="text" name="" id="" class="form">
                    Фамилия:
                    <input type="text" name="" id="" class="form">
                </div>
                <div class="cart-form-adres forma">
                    Адрес:
                    <input type="text" name="" id="" size="50" class="form">
                </div>
                <div class="cart-form-city forma">
                    Город:
                    <input type="text" name="" id="" class="form">
                    Индекс:
                    <input type="text" name="" id="" class="form">
                </div>
                <div class="cart-form-telefone forma" class="form">
                    Телефон:
                    <input type="text" name="" id="" class="form">
                    @mail.ru:
                    <input type="email" name="" id="" class="form">
                </div>
            </div>
            <form class="address-form" action="../controllers/check_out.php" method="POST">
                <input type="text" name="address" id="" max-lenght="60">
                <input type="submit" value="Отправить заказ" id="submit-btn">
            </form>
        </div>
    </div>
<?php require_once "../templates/footer.php" ?>
