<div class="col-3 mb-5">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src="<?=$product['image']?>?random=1" alt="..." />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder"><?=$product['name']?></h5>
                <!-- Product price-->
                <?=$product['price']?>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/product/<?=$product['id']?>">View product</a></div>
        </div>
    </div>
</div>
