# crud-mysql-php
PHP class that simplify SQL request from a MySQL database

# How does it work ?
1. `git clone https://github.com/XinTecK/crud-mysql-php.git`
2. `cd crud-mysql-php`
3. copy the class `Database.php` into your project
4. configure MySQL database in the class (see below)
![config](https://user-images.githubusercontent.com/43551457/60887570-09180600-a255-11e9-8ac3-ab21a0216fd1.png)
5. **That's all ! You're ready to go !**  

# What can I do with this ?
You can do the CRUD operations (Create, Read, Update, Delete) using PDO, without spending time to prepare request and all that stuff !  

Let's review every operation :  

I configured the Database object with a mysql database that I created with only 1 table : `Persons`.  
The `Persons` table has three columns :  
1. `PersonID`
2. `LastName`
3. `FirstName`  

At the moment, I've got three rows in this which are :
1. `PersonID : 1` | `LastName : Lefrancq` | `FirstName : Hugo`
2. `PersonID : 2` | `LastName : Norris` | `FirstName : Chuck`
3. `PersonID : 3` | `LastName : Parker` | `FirstName : Tony`

**Now let's see what we can do with this (Database methods available) :**

## select (Read)
![select](https://user-images.githubusercontent.com/43551457/60888339-d838d080-a256-11e9-9229-1011fd5195b3.png)  
## insert (Create)
![insert](https://user-images.githubusercontent.com/43551457/60888432-11714080-a257-11e9-9dbc-f99fd438e614.png)  
![select_with_zinedine](https://user-images.githubusercontent.com/43551457/60888459-1df59900-a257-11e9-8ed9-42fcd963e51a.png)  
**You can store the method return (which is a boolean) in a variable in order to check if the request successfully executed !**
![insert_with_callback](https://user-images.githubusercontent.com/43551457/60888572-6319cb00-a257-11e9-89d6-0a2dff625573.png)  
![select_with_torvalds](https://user-images.githubusercontent.com/43551457/60888598-73ca4100-a257-11e9-9811-98664691e4d4.png)  
## update (Update)
**Let's pretend I want to change my `FirstName` into `Tux <3` because I love penguin, then this is what I would do :**  
![update](https://user-images.githubusercontent.com/43551457/60888775-d58aab00-a257-11e9-8cda-7917cfeb2c05.png)  
![update_success](https://user-images.githubusercontent.com/43551457/60888805-de7b7c80-a257-11e9-8566-f401d61ed710.png)  
## delete (Delete)
**Now let's pretend I want to delete myself because I can't walk straight properly, then this is what I would do :**  
![delete](https://user-images.githubusercontent.com/43551457/60889016-5a75c480-a258-11e9-8fb1-474cd0808229.png)
![delete_success](https://user-images.githubusercontent.com/43551457/60889040-63669600-a258-11e9-8468-11ec26c95392.png)

**Now you're good to go !**

# Author
Hugo Lefrancq :  
[Website](https://hugolefrancq.fr)  
[Twitter](https://twitter.com/xinteck_)  
[LinkedIn](https://www.linkedin.com/in/hugo-lefrancq-b78ba5155/)  

# License  
crud-mysql-php is licensed under the [MIT license](https://opensource.org/licenses/MIT); see the "LICENSE" file.
