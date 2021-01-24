Multilingual e-commerce website
An e-commerce site to display products for sale and online shopping, and to provide the user with ease in purchasing and ordering the products he wants

1. Introduction
An e-commerce site to display products for sale and online shopping, and to provide the user with ease in purchasing and ordering the products he wants

Building a control panel for the site administrator to control all parts of the site, add products and all data, and display statistics, late requests, and incoming messages.

1.1 Purpose
The site will provide the user with ease of purchase, the addition of products that the user wants to buy, ease of searching for the product, and displaying its details.

The site will provide the user with a request order and ease of payment, whether on receipt or via the Internet, and provide safety and protection for the user.

The site will provide the admin with (add, update, delete) all data.

The site will provide the admin with see orders

The site will provide the admin with control over the parts of the site

1.2 Actors
System admin ⇒ Who has access to the dashboard and control all data

System User ⇒ Who browses the site to shop online and order products

1.3 Main Functions
system admin adds the data like (categories, products, brands, etc.), and he can edit it or remove it
system admin can see statistics, messages, users, and orders
system admin controls over the parts of the site
system user see all products
system user can search on products
system user can add the product to his shopping cart or wish list
system user can request an order
system user can see all details of the final bill (invoices)
system user can edit his profile
register, login, and logout
 

Functional Requirements
The system must allow the admin to view statistics, late orders, incoming messages, and recently added products on the main dashboard page

Manage Categories

The system must allow the admin to view categories
The system must allow the admin to add categories
The system must allow the admin to edit categories
The system must allow the admin to delete categories
Manage Subcategories

The system must allow the admin to view subcategories
The system must allow the admin to add subcategories
The system must allow the admin to edit subcategories
The system must allow the admin to delete subcategories
Manage Brands

The system must allow the admin to view Brands
The system must allow the admin to add Brands
The system must allow the admin to edit Brands
The system must allow the admin to delete Brands
Manage Products

The system must allow the admin to view products
The system must allow the admin to add products
The system must allow the admin to edit products
The system must allow the admin to delete products
Manage Unavailable products

The system must allow the admin to view unavailable products
The system must allow the admin to add unavailable products
The system must allow the admin to edit unavailable products
The system must allow the admin to delete unavailable products
The system must allow the admin to make available unavailable products
Manage Products that contain a discount

The system must allow the admin to view products that contain a discount
The system must allow the admin to add products that contain a discount
The system must allow the admin to edit products that contain a discount
The system must allow the admin to delete products that contain a discount
The system must allow the admin to cancel the discount products that contain a discount
Manage Orders

The system must allow the admin to view orders
The system must allow the admin to display order details and ordered products orders
The system must allow the admin to edit orders
The system must allow the admin to change order status orders
The system must allow the admin to delete orders
Manage Shipping

The system must allow the admin to view shipping
The system must allow the admin to add shipping for each city
The system must allow the admin to edit shipping
The system must allow the admin to delete shipping
Manage Coupon Code

The system must allow the admin to view coupon Code
The system must allow the admin to add coupon Code
The system must allow the admin to edit coupon Code
The system must allow the admin to delete coupon Code
Manage Users

The system must allow the admin to view Users
The system must allow the admin to add Users
The system must allow the admin to edit Users
The system must allow the admin to delete Users
Manage Messages

The system must allow the admin to view messages
The system must allow the admin to delete messages
Manage Subscriptions

The system must allow the admin to view Subscriptions
The system must allow the admin to delete subscriptions
Manage Slideshow

The system must allow the admin to view the slideshow
The system must allow the admin to add a slideshow
The system must allow the admin to edit slideshow
The system must allow the admin to delete a slideshow
The system must allow the admin to control the parts of the site

Non Functional Requirements
1. System properties and constrain

1.1. Performance

Fast navigation between pages should be less than 5 seconds
When adding the products and the rest of the data, the saving process will take place in less than 4 seconds
There is enough space to hold the data
1.2. Security

User data must be preserved and his information encrypted
Preventing those who do not have access to the control panel
Secure registration and logout process
Prevent adding a harmful or inappropriate data type to its data right
Prevent uploading malicious files or with code
The data entered must be verified before saving to the database
Use strong encryption methods to encrypt passwords
Check the data size and allow a specific data size limit based on the data type
1.3. Reliability

Ensure that the item is deleted before deleting it from the database
A warning about unavailable or consumed products and requests
1.4. Usability

Usability for most people.
suitable for most environments.
maintainability design and can be able to be updated continuously.
2. Process requirements may also be specified

must run on a certain platform or operating system
The site should be built using PHP for the backend
