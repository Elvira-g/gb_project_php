<div class="about-block section-block">
    <img src="data/img/<?= $product['img'] ?>" alt="">
    <h2 class="product-name"><?= $product['name'] ?></h2>
    <p class="product-desc"><?= $product['fulldesc'] ?></p>
    <p class="price"><?= $product['price'] ?></p>
    <div class="button-block">
        <button class="buy-btn"><a class="buy-btn-link" href="index.php?c=cart&act=buy&id=<?= $product['product_id'] ?>&price=<?= $product['price'] ?>">Купить</a>
        </button>
    </div>
</div>
