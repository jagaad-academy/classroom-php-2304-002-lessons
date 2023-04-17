# Module 3 Project - Individual

Create a web application that contains some features of a online shopping.

## Requirements

1. As a user, I want a page to create, read, update, and delete products.
2. As a user, I want to see the product catalog (random images can be added to the products).
3. As a user, I want to add products to the cart.
4. As a user, I want a page containing the products added to the cart where I can update the quantities or remove products.
5. As a user, I want a checkout page where I can see the summary of my order and a button to complete the order.
6. As a user, I want a page to see containing all completed orders.

## Database Table Structure

The tables should contain at least the following fields (not limited to):

```
products:
  - id
  - name
  - description
  - price
  - quantity

orders:
  - id
  - total
  - completed_at

order_items:
  - order_id
  - product_id
  - quantity
  - price
```

## Notes

It is not required to manage the user (auth). The main goal is to practice the module topics (e.g., OOP, PDO, etc.). Including CSS in the web user interface (UI) is optional. To store the cart object state on the server side, search by [how to store objects in sessions]((https://stackoverflow.com/questions/44887880/store-object-in-php-session)).

## Technical Requirements

1. Create a new GitLab repository (public).
2. The application should fully use the object-oriented paradigm.
3. Use the autoload (Composer).
4. Attention to code quality - try to apply the principle learned in the lessons as much as possible.
5. Use PDO for database communication.
6. Create a README file explaining the application.

## Deadline
