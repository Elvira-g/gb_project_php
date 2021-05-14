<div class="section-block">
    <div class="title-block">
        <h3 class="title">Список заказов</h3>
    </div>
    <table class="cart-table">
        <tr>
            <td>id заказа</td>
            <td>Артикул</td>
            <td>Кол-во</td>
            <td>Сумма</td>
            <td>Имя покупателя</td>
            <td>Телефон</td>
            <td>E-mail</td>
            <td>Адрес доставки</td>
            <td>Дата размещения</td>
            <td>Статус заказа</td>
            <td>Изменить статус</td>
        </tr>
        <?php
        foreach ($orders as $order) :?>
            <tr>
                <td><?= $order['order_id'] ?></td>
                <td><?= $order['product_id'] ?></td>
                <td><?= $order['count'] ?></td>
                <td><?= $order['sum'] ?></td>
                <td><?= $order['user_name'] ?></td>
                <td><?= $order['phone'] ?></td>
                <td><?= $order['user_email'] ?></td>
                <td><?= $order['address'] ?></td>
                <td><?= $order['date'] ?></td>
                <td><?= $order['status'] ?></td>
                <td>
                    <form method="POST" action="index.php?c=admin&act=change&id=<?= $order['order_id'] ?>">
                        <select name="status">
                            <option value="В работе">В работе</option>
                            <option value="Отгружен">Отгружен</option>
                            <option value="Отменен">Отменен</option>
                        </select>
                        <button type="submit">Изменить</button>
                    </form>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</div>
