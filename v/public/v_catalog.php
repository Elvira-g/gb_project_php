<div class="catalog">
    <div class="title-block">
        <h3 class="title">Каталог товаров</h3>
    </div>

    <?php
    foreach ($result as $product) :?>
        <div class="product-block">
            <a href="index.php?c=product&act=about&id=<?= $product['product_id'] ?>"><img
                        src="data/img/<?= $product['img'] ?>" alt="" class="product-img"></a>
            <a class="name-link" href="index.php?c=product&act=about&id=<?= $product['product_id'] ?>">
                <h2 class="product-name"><?= $product['name'] ?></h2>
            </a>
            <a class="desk-link" href="index.php?c=product&act=about&id=<?= $product['product_id'] ?>">
                <p class="product-desc"><?= $product['shortdesc'] ?></p>
            </a>
            <h2 class="price"><?= $product['price'] ?> руб.</h2>
            <button class="buy-btn"><a class="buy-btn-link" href="index.php?c=cart&act=buy&id=<?= $product['product_id'] ?>&price=<?= $product['price'] ?>">Купить</a>
            </button>
        </div>
    <?php
    endforeach;
    ?>

</div>
