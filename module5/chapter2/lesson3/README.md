# Simple Shop App

Simple application show examples of unit tests using PHPUnit.

## Requirements

- I want to have a shopping cart
- I want to add/remove products from the cart
- I want to return the total
- I want to set the quantity of product when adding to the cart

## Routes

- [POST] /shop/cart/add/{product-id}/{qty}
- [DELETE] /shop/cart/remove/{product-id}
- [GET] /shop/cart

## Instructions

- Run tests: `php vendor/bin/phpunit test/ --colors`