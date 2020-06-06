-----------MUNCANG JAYA-----------

REQUIREMENTS:
> PostgreSQL at minial Version 11
> XAMPP at minimal version 7.2.0
> Any code editor or IDE (Reccommended)

-------------------------------------------------------------------------

ABOUT:
Muncang is a web-based Database application made for autobike service shop 
'Muncang Jaya'. It's meant to manage, control, and ease item flow and 
management in the shop.

It was not meant for multiple users, but rather for one to two users.
This is because the shop only has 1 or two person manning the web application, 
and to avoid possible sabotages and illegal purchases/activites from happening.

-------------------------------------------------------------------------

FEATURES:
This application is able to record purchases, types of spareparts, their stock,
and their compatibilities for each existing bikes. All the list are available within
a click of a mouse, to create a more sure method for compatibility and item details.

Administrator is able to add new sparepart type(s), based on existing brand, 
compatible bikes, and their kind. A new sparepart(s) with a new compatibility
and/brand and/kind requires additional input. This is to ensure that no unexisting
parameter is inserted.

Administrator is able to record restocks and purchases. Purchases is marked by their
transaction ID, and restock ID. Both has date and time to help identify when a certain
item is resotcked, and when a transaction took place including what was bought, and 
the amount of money gained from it.

As of version 6.4.20, the Developers has integrated RecyClops, as a form to support
Circular economy. RecyClops is used to record, and track the number of times an item
has been recycled, or at least a new item has been recycled using that item.

-------------------------------------------------------------------------

SETUP:

> Make sure your device has the latest version of XAMPP installed.

> Make sure your device has the latest version of PostgreSQL installed.

> Create a new database in PostgreSQL. It's reccommended to name it 
  muncang_jaya, but any other name is welcome.

> Copy all the queries from 'Query Table Terbaru.txt' and 'Query Table RecyClops.txt'
  into PostgreSQL terminal.

> In case you cannot insert into SQL Console, import the given sql file 'muncang.sql'.

> DO NOT by any means delete, or move files inside the CSV folders. Changes are
  welcome, but make sure to save it in CSV format.

> Open 'config.php', and set up your PostgreSQL and database credentials. If you 
  chose to create a different-named Database, make sure you use that name i this file.

> Run Apache, navigate to 'http://localhost/Muncang'.

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


