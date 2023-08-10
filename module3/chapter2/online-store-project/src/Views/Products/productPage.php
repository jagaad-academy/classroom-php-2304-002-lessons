<section class="pb-2">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo $data->product['image']?>" alt="..." /></div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder"><?php echo $data->product['name']?></h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through">$<?php echo $data->product['price'] * 1.1?></span>
                    <span>$<?php echo $data->product['price']?></span>
                </div>
                <p class="lead"><?php echo $data->product['description']?></p>
                <div class="d-flex">
                    <form action="/product/<?php echo $data->product['id']?>" method="post">
                        <input class="form-control text-center me-3" name="quantity" id="inputQuantity" type="" value="1" style="max-width: 3rem" />
                        <input type="hidden" value="<?php echo $data->product['id']?>" name="productId">
                        <button class="btn btn-outline-dark flex-shrink-0 mt-2" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
