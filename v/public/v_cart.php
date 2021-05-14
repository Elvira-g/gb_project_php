<div class="cart-block section-block">
    <div class="title-block">
        <h3 class="title">Корзина</h3>
    </div>
    <?php
    if ($cart) :?>
        <table class="cart-table">
            <?php
            foreach ($cart as $unit) :?>
                <tr>
                    <td><img src="data/img/<?= $unit['img'] ?>" alt="" width="50"></td>
                    <td><?= $unit['name'] ?></td>
                    <td><?= $unit['count'] ?> шт.</td>
                    <td><?= $unit['sum'] ?> руб.</td>
                    <td>
                        <a href="index.php?c=cart&act=delete&id=<?= $unit['product_id'] ?>&price=<?= $unit['price'] ?>&count=<?= $unit['count'] ?>"><i
                                    class="fas fa-trash"></i></a></td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
        <p>Общая сумма заказа: <?= $sum ?> руб.</p>
    <?php else: ?>
        <p class="cart-message"> В корзине пусто. Перейти в <a class="cart-message-link" href="index.php">каталог</a>
        </p>
    <?php
    endif;
    ?>
    <?php
    if ($_SESSION['user_login'] && $cart) {
        echo '<button class="order-btn"><a class="order-btn-link" href="index.php?c=order&act=toOrder">Оформить заказ</a></button>';
    } elseif ($cart) {
        echo '<p class="cart-message">Для оформления заказа необходимо <a href="index.php?c=user&act=login" class="cart-message-link">войти в аккаунт</a> или <a href="index.php?c=user&act=reg" class="cart-message-link">зарегистрироваться</a></p><br>';
    }
    ?>
</div>
