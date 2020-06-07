-----------RECYCLOPS-----------

REQUIREMENTS:
> PostgreSQL at minial Version 11
> XAMPP at minimal version 7.2.0
> Any code editor or IDE (Reccommended)

-------------------------------------------------------------------------

ABOUT:
Recyclops is a web-based Database application made for tracking recycle items. 
It's meant to help administrator to manage and control the items that existed in 
the workshop. 

It was not meant for multiple users, but rather for one to two users.
This is because the worksop has only has 1 or two person manning the web app, 
and to avoid the possibility of someone misused the app.


-------------------------------------------------------------------------

FEATURES:
This application is able to record purchases, types of spareparts, and tracks their
status on how many time they're recycled. All the list are available within
a click of a mouse for item details.

Administrator is able to add new recycled item type(s), based on existing type items, 
for example paper, plastic, can, etc. A new recycle item type(s) will requires 
additional input. This is to ensure that no unexisting parameter is inserted.

Administrator is able to record purchases and kept their ID. Purchases is marked by their
transaction ID. Transaction ID has date and time to help identify when a certain
item is restocked.

As a form to support
Circular economy. RecyClops is used to record, and track the number of times an item
has been recycled, or at least a new item has been recycled using that item.

Recyclops will keep track of these items, along with their details. Administrator
is also able to see the list of items that was tagged, ans the number of time(s)
it has been recycled. Addind a new tag is also possible.


-------------------------------------------------------------------------

SETUP:

> Make sure your device has the latest version of XAMPP installed.

> Make sure your device has the latest version of PostgreSQL installed.

> Create a new database in PostgreSQL.

> Copy all the queries from 'Query Table Terbaru.txt' and 'Query Table RecyClops.txt'
  into PostgreSQL terminal.

> In case you cannot insert into SQL Console, import the given sql file 'muncang.sql'.

> DO NOT by any means delete, or move files inside the CSV folders. Changes are
  welcome, but make sure to save it in CSV format.

> Open 'config.php', and set up your PostgreSQL and database credentials. If you 
  chose to create a different-named Database, make sure you use that database name in this file.

> Run Apache, navigate to 'http://localhost/<Folders Name>'.

> Login using the Administrator credentials.

> Your Web Application is ready to go.


-------------------------------------------------------------------------

ABOUT:
Used Framework:
PHP, HTML, JavaScript, Java, CSS

APIs:
BootStrap, Ajax Google API

Database:
PostgreSQL

Build Number: 6.4.20

Author:
> Mohammad Khairi Poerwo Satrio
> Fadhillah Reza Putranto
> Alvin Genta Pratama


