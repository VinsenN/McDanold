# McDanold - Group 3 (Project Web Programming Ganjil 2022/2023)

Web Application Deployment Link: https://mcdanold.000webhostapp.com/

## Local Deployment
  * Open XAMPP and start Apache & MySQL
  * Clone project and ho to the folder application using cd command on your cmd
  * Run `composer install` to download all dependencies needed.
  * Run `copy .env.example .env`
  * Create new database named `mcdanold` in phpmyadmin
  * Open .env file, MySQL database named `mcdanold` on 127.0.0.1:3306 with root username and no password. You can customize the ip address, port, database username or password based on your own machine setup.
  * Run `php artisan key:generate` to prepare all important data.
  * Run `php artisan migrate` to create database table.
  * Run `php artisan storage:link` to create storage link in public folder.
  * Run `php artisan serve` and access the webapp on localhost port 8000 (http://localhost:8000/).

## Authors
| <img src="https://media.discordapp.net/attachments/1047505167341342800/1072705119520571403/9k.png" height="200px"/>  | <img src="https://media.discordapp.net/attachments/1047505167341342800/1072705128303435906/2Q.png" height="200px"/>  | <img src="https://media.discordapp.net/attachments/1047505167341342800/1072705163489456210/9k.png" height="200px"/>  | <img src="https://media.discordapp.net/attachments/1047505167341342800/1072705184230297640/2Q.png" height="200px"/>  |
| :------------------------------------------------------------------------------------------------------------------: | :------------------------------------------------------------------------------------------------------------------: | :------------------------------------------------------------------------------------------------------------------: | :------------------------------------------------------------------------------------------------------------------: |
| [Vinsen Nawir](https://github.com/VinsenN)                                                                           | [Vio Albert Ferdinand](https://github.com/VioAlbert)                                                                 | [Gregorius Emmanuel Henry](https://github.com/jfcjaya)                                                               | [Francis Alexander](https://github.com/francisalexander02)                                                                    |    
| 2440031521                                                                                                           | 2440017126                                                                                                           | 2440030582                                                                                                           | 2440062161                                                                                                           |

## Tools
* Bootstrap 5.2
* PHP 8.1.1
* Composer
* Laravel 8
* Apache
* XAMPP
* Website dbdiagram.io
* Adobe Photoshop

## Database Diagram
<img src="https://media.discordapp.net/attachments/1047505167341342800/1072707490355089468/McDanold.png?width=1191&height=663"/>

## Special Thanks
Reinert Yosua Rumagit, S.Kom., M.TI. – D6191 as Lecturer and Mentor

## Extra Detail
| Course                         | Class |
| :----------------------------  | :---- |
| COMP6681001 - Web Programming  | LH01  |

## License
[MIT License](LICENSE)
