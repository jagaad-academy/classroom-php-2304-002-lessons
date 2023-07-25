<div class="col-12 p-3 mb-3 cart-item-hover">
    <div class="row">
        <div class="col-auto">
            <img class="img-fluid" style="max-height: 100px" src="<?=$product['image']?>?random=<?=rand(100, 1000)?>" alt="..." />
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <h5 class="fw-bolder"><?=$product['name']?></h5>
                </div>
                <div class="col-12">
                    <?=$product['price']?>
                </div>
            </div>
        </div>
        <div class="col text-end">
            <div class="row">
                <div class="col-12 mb-3">
                    <a class="btn btn-outline-dark mt-auto" href="/product/<?=$product['id']?>">View product</a>
                </div>
                <div class="col-12">
                    <a class="btn btn-outline-danger mt-auto" href="/cart/remove/<?=$product['id']?>">Remove from cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
