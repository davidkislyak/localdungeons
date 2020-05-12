# localdungeons
Best Dnd System for Matchmaking project (codename localdungeons).

### About:
Local Dungeons is a website aimed at letting people find games and events nearby. 
We create the opportunity for new people to join communities that share the same interests in games.

### Reflecting the current situation of the world:
Due to the current situation in the world with hard times, we are supporting social distancing by removing date's from new event postings for the time being.

### How requirements where handled:
- Website uses divided up folders to follow the MVC(model view controller) pattern standards. The views folder has exclusivly html files. Model contains the database class as well as validation functions. controller as all the business logic and functions used by the index file.

- All Routes in the project use the Fat-Free framework(F3).

- The database class uses PDO and contains all the prepared statements used in the project, including insert and select statements. There are a total of nine tables used in the database. Two join tables, size foreign key tables, and a main table. The database is designed to be dynamic.
- Data from the data base can be added, viewed, and updated.
- We used branches to prevent most merge conflicts. We have some 50+ commits combined from both teammates.
- There is a GenericGame class with four child classes. These classes use the parrent's getters and setters.
- All files contain Docblocks for all public functions and follow PEAR standards.
- All client inputs are validated on the server side via php.

### A deployment of this project can be accessed at:
- https://www.davidkislyak.com/localdungeons/
