Group Name: ATM
Group Members: Andrew Gabriel, Matthew Jacome, Tobias He

Tools used:
- Back-end: PHP
- Server: MySQL
- Front-End: Bootstrap & HTML/CSS
- Local Server: MAMP

Instructions to run:
- Install local server to run PHP files, in our project, we used MAMP (https://www.mamp.info/en)
- In the preferences tab, navigate to Web Server and specify the project folder in the Document Root,
that way it knows where the website lives
- Click on Start Servers & Navigate to http://localhost:8888
- Since we used localhost for DB, we have included an export of our database that includes all the schemas and data. In order to replicate the same environment, we go to http://localhost:8888/phpMyAdmin/?lang=en
- Create a new DB with the name "ATM" and import the SQL file in the project directory called "ATMDB.sql"
- At this point, we can navigate to http://localhost:8888 and the tables and data should be populated with data from the SQL DB.