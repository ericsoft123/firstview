
PHP LARAVEL:5.4
Php >=7
MYSQL 



1.for System Setup Read This File. 

2.for (system structure , code) open  (coding  folder) under firstview project and read  "structure of system and MVC code file"
3.for js code  (open  coding  folder) under firstview project and read "javascript code file"


System Setup

My connection 
.env file (under firstview project folder) line 11,12,13

DB_DATABASE=firstview
DB_USERNAME=root
DB_PASSWORD=




.how to install database table ?

create database "firstview" 

1.open command(cmd) or Terminal 
cd firstview folder (means that  type in cmd "cd firstview" on command or cmd)
then run this command "php artisan migrate" 
2.second option
  open firstview project folder 
  Then open "db" folder and upload to your firstview database

Seed database
cd firstview project folder using command prompt(cmd)  and make sure that you have database same database as .env file .then
on cmd type  "php artisan db:seed"

   by default:username:super
              password:1
  
To Run This apps 
 cd firstview project folder using cmd
 then type in cmd "php artisan serve"
 
 Then open your web browser and then type "localhost:8000"



Note:i know that i can use strong password for security reason .but because i want to make testing easy and setup system easy that is why i prefer 
to use easy password .

for any query please do not hesitate to contact me ericsoft123@gmail.com



