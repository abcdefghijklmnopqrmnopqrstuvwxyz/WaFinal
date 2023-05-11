# WA Final Project - Virtual Gallery

Website for looking at online arts.

Used technologies:
```
1.  HTML
2.  (S)CSS
3.  Javascript
    -   jQuery
4.  PHP
5.  MySQL (8.0)
6.  Web server (XAMPP)
    -   .htaccess
```

*You needs web server(or any PHP compiler) to run the page*

### 'Home' page
Basic welcoming page with one paragraph and button that redirects to gallery.

### 'About us' page
Long scrollable page with content telling user more about the page.

### 'Gallery' page
Page that allows user to generate random art from gallery using API. Without login, user is restricted to generate in total 10 arts/hour. With login, user is not restricted with generating arts. **The API is restricted to allow generate 50 arts/hour.**

### 'Login' page
Basic login page with input for email and password. With wrong credentials, user friendly error will appear.

### 'Sign up' page
Basic registration page with input for name, email and password. Name and email must be unique. Datas are saved into database using procedures. With credentials already used for another, user friendly error will appear. Passwords are hashed.

---------------------------------------------------------------------------------------------------------------

#### Run website
To run the website, you needs an web server - for example Apache(files should be located in /xampp/htdocs in default). Than you needs MySQL(8.0) database. **You can use the db.sql script to create it**. If you have both prepared, you can start the web server and type 'localhost' into search field which will redirect you to Home page.

*Likes, Dislikes and Views in statistics are not implemented. The only implemented statistics is Logs count.*