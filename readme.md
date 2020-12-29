# Joobly
This repository contains my code for the [Laravel Web Development](https://laravel.com/docs/7.x) Docs.

Joobly is a [Laravel](http://flask.pocoo.org/) social jobs  web application in which authenticated companies can post jobs and authenticated users can apply jobs, as well as creating and editing their own  posts.

### Prerequisites:
The application was built using [Laravel 7], so you should ensure you have it installed on your machine.

 requirements : PHP >= 7.2.5.

### Features:
- Admins logging in system.
- SuperAdmin can add/edit/delete admins and gave them permissions.
- SuperAdmin can Manage region, City, pricingList , University, categories, companies, contracts and Authorized Persons .
- SuperAdmin edit/ stop and show all posts.
- Exports users, companiesm posts reports in excelSheet.
- Secure against Cross-Site Request Forgery (CSRF) attacks.
- Filtering by name, registerOn, applyFrom, active users reports.
- Filtering by name, registerOn, apply, totalPayments and Plan Companies reports.
- Filtering by title and registerOn posts reports.
- Responsive UI.
- Database Postgres.
### Technologies:
### Back-End :
- Laravel 7.2, MVC Architecture Pattern.
### Front-End :
 - AdminLTE, template engin(blade).
 ### Database :
 - postgress.
 ### Package:
 - laravel Debugbar, mattwebsite, laratrust, laravelcollective.
 
### Usage:
1. Clone this repository to your desktop, go to the ```Fursetek``` directory.

2. Install the application requirements:
```composer
 composer install 
 php artisan key:generate
```

3. Run the application and go to [localhost:8000](localhost/fursetek/admin/login) to see the application running

### License:
This software is licensed under the [MIT License](https://laravel-guide.readthedocs.io/en/latest/license/).
