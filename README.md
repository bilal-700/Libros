# Libros
My first e-commerce website using PHP, JS, HTML &amp; CSS.

## IDE used:
- Visual Studio Code 

## Prefered search engine:
- Google Chrome

## Requirements:
- Xampp

## How to start the project:
- For setup, first of all download all the files and place the folder in xampp/htdocs folder.
- Start the xampp and start SQL & Apache.
- After that go to **http://localhost/phpmyadmin/index.php** and import all the .sql files from the folder you downloaded in phpMyAdmin. For this you have to click on import and then choose the required file and after that scroll down and click on Go button. Like this import all the databases.
- Now in searchbar of the search engine write **localhost/Folder_name/Task1.php**.
- You will redirect to login.php so you first have to create an account or Signup then Login and you will be directed to mainpage.
- Now you can enjoy endlessly and after that logout.

- There exists _**Admin View**_ also for this you have to login using these credentials:
  - Username: _**abc.18@gmail.com**_   
  - Password: _**Qazwsx123!**_
- You will be redirected to **Adminpage.php** and where you can: 
  - Add product 
    - You can add a product like:
      - Product name: Eraser
      - Product price: 5
      - Product location: ./upload/Eraser.png 
    - You just have to add more pictures in upoad folder and have to give the path, name and price to add it in the product section.
    - To see the product added go to the page localhost/Folder_name/index.php
  - Delete product
    - You can delete a product like:
        - Product name: Eraser
        - Product id: 1
        - which you can see from the table tbl_product by going in the phpMyAdmin.
  - Update product
    - To update a product you must have the knowledge of product id and you can update the product name, price and location.
      - Product id: 
      - Product name:
      - Product price: 
      - Product location: 
  - Delete any order
    - By using order id admin can delete an order.
  - See no. of views on a page
  - See customer order data
    - In this section admin can view the orders user has placed.

- In _**contact.php**_ page I have added PHPMailer you first have to download the PHPMailer from the website:
  - `https://github.com/PHPMailer/PHPMailer`
  - Then you have to add a piece of code which I have already added in contact.php you just have to add username and password in it to make it functional. You can also follow the steps from the website given above.
  - When you submit the contact form it is highly possible that you may not receive the mail. You have to change the email security of Gmail. For that purpose: 
  - `Go to Manage your account -> Security -> Less Secure App Access pane -> Turn it on`
  - Now you can easily receive emails from the website.
 
- In _**about.php**_ scroll down and click on Google map location you will see a frame there. To set it according to your location follow the following steps:
  - On your search engine, open Google Maps.
  - Go to the directions, map, or Street View image you want to share.
  - On the top left, click Menu.
  - Select Share or embed map. 
  - Copy and paste the link in About.php in line no. 157 and set width = "500", height="400" and style='margin-top:2%' to make it presentable.
 
- In _**Task1.php**_, in _**Our Location**_ section I added an api for location. In Task1.php in line no. 21 add your coordinates according to your location. In line no. 26 add close coordinates after some alteration according to your exact coordinates so that on page reload it will show the side close to your location.
