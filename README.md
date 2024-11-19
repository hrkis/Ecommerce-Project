# E-Commerce-Website-Using-PHP

## Summary
Introduction:
This is an e-commerce website offering additional features such as customized delivery charges and promotional deals like "Buy One, Get Another Product at 50% Off."

Installation Guide:
Follow these steps to set up the project in your local environment:

1) Environment Setup:
  Use XAMPP or WAMP for setting up your local server.
2) Database Setup:
  Create a database named ecommerce in your local environment.
  Import the SQL file provided in the sql folder (Ecommerce.sql) to populate the database.

User Login Details:
  Default login credentials for testing purposes are included in the database after importing the SQL file

We have made 2 Type of user here. 
1) Guest User Login details:
  We offer two options for users:
  1) Browse Without Login: Users can browse and view our products without logging in. However, when they add a product to the cart, they will be prompted to log in or create an account to proceed.
  2) Add to Cart With Login: Users can add products to their cart with logging in. 
  Below have some pages URL's:-
    You can create account with the help signin URL. But for testing Purpose we are providing you one of our account to test you shared requirement.
      1) User Login Page
      http://localhost/ecommerce/login.php
      testdelivery@yopmail.com
      Test@123#
      2) User registeration pages
      http://localhost/ecommerce/signin.php
      3) Product Category Pages (Click on Product category. Its will redirect you on all of our products)
      http://localhost/ecommerce/index.php
      4) All Product with same category (When you click on this products you will redirect to add to cart page. Where you can perform all activity related to offer “buy one red widget, get the second half price. Other Functionality that mentioned in document)
      http://localhost/ecommerce/OurProducts/acme.php


2) Admin (When you will login with admin you will have an access of users orders/ number of products/Number of customer/ Create new admin panel/Search any product by search bar/ Add, Edit, delete and update products)
You can check some actions in Admin with below credentails:- 
  http://localhost/ecommerce/admin/login.php
  adminkis@yopmail.com
  Test@123#
  https://prnt.sc/82SSZLC9bNhM

Other Pages in Admin Panel:-
----------------------------------------------------
  1) Add Product Using Admin Panel
  http://localhost/ecommerce/admin/addproduct.php
  2) Product Listing and Edit Page
  http://localhost/ecommerce/admin/report.php
  3) All Registered Customer
  http://localhost/ecommerce/admin/all_customer.php
  4) Create another Admin Account
  http://localhost/ecommerce/admin/newadmin.php

## Platform Used
### Front-End
  (i) HTML5 <br>
  (ii) CSS3 <br>
  (iii) JavaScript <br>
### Back-End
  (i) PHP <br>
  (ii) MySQL <br>
## Key Features
### Public User
(i) Search Product <br>
(ii) View Product <br>
(iii) Create User Account <br>

### Signin User
(i) Search Product <br>
(ii) View Product <br>
(iii) Create Order <br>
(iv) Change Email & Password <br>
(v) Can View Previous Order with UPDATE and DELETE <br>

### Admin
(i) Add New Product <br>
(ii) Update Product <br>
(iii) Delete Product <br>
(iv) Confirm Order <br>

## Conclusion

