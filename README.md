# À Voir À Faire

## Description:
This project is a community-run tourism website concept. It allows users to create profiles and add tourist sites they have visited in the past. 

They can add the site location, description, price and the date of their last visit to the site. Users who create websites can only edit or delete their own submissions. 

They cannot edit or delete sites submitted by other users. Only users with "administrator" privileges can delete and edit any website. All users who create an account on this site can comment on any site. They can share their experiences if they have also visited the site before. 

They can also rate the site on a scale of 1 to 5 stars. Visitors to this site without an account can only view a list of sites on the site, they cannot add a site or comment on one.

## Installing:
This project can be forked on GitHub using this link: https://github.com/yorkilito/a_voir_a_faire

## QuickStart:
You can visit the site using [this link](https://avaf.up.railway.app/)

## Usage
* Search for tourist sites in a specific reeagion with the hompage search bar.
* Add a tourist site.
* Add a comment to a tourist site.
* Deleting/modifying tourist sites previously created by you.

---

## Contributing

### Clone And Run The Repo

```bash
git clone git@github.com:yorkilito/a_voir_a_faire.git
cd a_voir_a_faire
```

### Run The Project
* Start By Cloning The Database On Your MySql Server

```bash
mysql -h your_hostname -u your_username -p your_databse < avaf_db_init2.sq
```

* Complete The *mysql_config.php* File With Your MySql Credentials

```
<?php
class Config{
public const MYSQL_HOST = 'your_hostname';
public const MYSQL_PORT = 'your_port';
public const MYSQL_DB = 'your_database';
public const MYSQL_USER = 'your_username';
public const MYSQL_PASSWORD = 'your_password';

}
?>
``` 

* Comment The Production Connection Details On Line 21 of *index.php*
```
//$pdo= new PDO("mysql:host=".getenv("MYSQLHOST").";port=".getenv("MYSQLPORT").";dbname=".getenv("MYSQLDATABASE").";charset=utf8mb4", getenv("MYSQLUSER") , getenv("MYSQLPASSWORD"));

```

* **Uncomment** The Development Connection Details On Line 24 of *index.php* 
```
$pdo= new PDO("mysql:host=".Config::MYSQL_HOST.";port=".Config::MYSQL_PORT.";dbname=".Config::MYSQL_DB.";charset=utf8mb4", Config::MYSQL_USER , Config::MYSQL_PASSWORD);
```

## Author(s):
* Name: Samuel Yorke Aidoo Jr. (@yorkilito) 
* [GitHub](https://github.com/yorkilito) 
* [Email Address](mailto:yorkilito.coder@gmail.com)

## Version History:
* 0.1 : Base Version
* 0.2 : Improved GPS Localisation
* 0.3 : Website Redesign
* 0.4 : Comment Section Update

## License:
This project is licensed under the MIT License - see the LICENSE.md for details.
