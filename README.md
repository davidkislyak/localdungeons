# localdungeons
Best Dnd System for Matchmaking project (codename localdungeons).

- website uses divided up folders to follow the MVC(model view controller) pattern standards. The views folder has exclusivly html files. Model contains the database class as well as validation functions. controller as all the business logic and functions used by the index file.

- all Routes int the project use the Fat-Free framework.

- The database class uses PDO and contains all the prepared statements used in the project, including insert and select statements. There are a total of nine tables used in the database. Two join tables, size foriegn key tables, and a main table. The database is designed to be dynamic.
- Data from the data base can be added, viewed, and updated.
- We used branches to prevent most merge conflicts. We have some 50+ commits combined from both teammates.
- There is a GenericGame class with four child classes. These classes use the parrent's getters and setters.
- All files contain Docblocks for all public functions and follow PEAR standards.
- Webpages have client side and server side validation.