<?php
?>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Online shop Jagaad Academy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <?php if(!empty($_SESSION['user'])) {
                    echo '<li class="nav-item"><a class="nav-link" href="/logout">Log out</a></li>';
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="/login">Log in</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="/register">Create account</a></li>';
                }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/products/all">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="/cart">Cart</a></li>
                        <li><a class="dropdown-item" href="/products/new">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
                <a href="/cart" class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $data->cartQuantity?></span>
                </a>
            </div>
        </div>
    </div>
</nav>
