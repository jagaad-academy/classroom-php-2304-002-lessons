<div class="col-12 mt-5">
    <div class="row">
        <div class="col-6">
            <img src="<?=$data->product['image']?>" alt="">
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <?=$data->product['description']?>
                </div>
                <div class="col-12">
                    <form action="/cart/add" method="post">
                        <input type="hidden" value="<?=$data->product['id']?>" name="productId">
                        <button type="submit" class="btn btn-success">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
