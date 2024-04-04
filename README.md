<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# php 7.4
https://blog.remirepo.net/post/2019/12/03/Install-PHP-7.4-on-CentOS-RHEL-or-Fedora

dnf install https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm

dnf install https://rpms.remirepo.net/enterprise/remi-release-8.rpm

dnf module reset php

dnf module install php:remi-7.4

# vagrant
https://gist.github.com/carthegian/b2451320bd0dda6b2df4c79b73b412f6

# AlmaLinux 8

sudo groupadd www-data

sudo useradd -g www-data -s /usr/sbin/nologin www-data

chown -R www-data:www-data /var/www/html

getent passwd www-data

getent group www-data

# http

dnf module list httpd

sudo dnf install httpd



firewall-cmd --list-all

firewall-cmd --add-service=http --zone=public --permanent

firewall-cmd --add-port=80/tcp --zone=public --permanent

firewall-cmd --reload

# php

php 8.2

dnf update

dnf -y install epel-release

dnf -y install https://rpms.remirepo.net/enterprise/remi-release-8.9.rpm

dnf clean all && dnf -y makecache

dnf module list php

dnf -y install php php-cli php-fpm php-devel php-pear php-curl php-mysqlnd php-gd php-opcache php-zip php-intl php-common php-bcmath php-imagick php-xmlrpc php-json php-readline php-memcached php-redis php-mbstring php-apcu php-xml php-dom php-redis php-memcached php-memcache php-process

vim /etc/php.ini

# 以下は例です
memory_limit = 2G                     #RAM容量にあわせて調整してください

error_log = /var/log/php_errors.log   #phpエラーログファイルパスを指定する

post_max_size = 300M                  #利用目的にあわせて調整してください

upload_max_filesize = 300M            #利用目的にあわせて調整してください

date.timezone = Asia/Tokyo            #コメントアウトを外して、Asia/Tokyoを指定してください

mbstring.language = Japanese　　　　　　　　　　　　　　　　　　　　#コメントアウトを外してください


systemctl enable php-fpm

systemctl restart httpd && systemctl restart php-fpm

echo "<?php phpinfo(); ?>" > /var/www/html/info.php

# composer

curl -sS https://getcomposer.org/installer | php

mv composer.phar /usr/local/bin/composer

composer  -V

# redis

dnf module list redis

dnf module install redis

systemctl status redis

systemctl enable redis

systemctl start redis

systemctl status redis

 redis-cli --version

# xdebug

dnf install php-xdebug

systemctl start httpd

# mysql

dnf module list mysql

dnf -y install mysql-server

dnf -y install mysql

systemctl start mysqld.service

systemctl status mysqld.service

systemctl enable mysqld.service

firewall-cmd --list-all

firewall-cmd --add-service=mysql --zone=public --permanent

firewall-cmd --add-port=3306/tcp --zone=public --permanent

firewall-cmd --reload

mysql -u root -p

ALTER USER 'root'@'localhost' IDENTIFIED BY 'password';

SHOW VARIABLES LIKE 'validate_password%';

SHOW VARIABLES LIKE '%time_zone%';

SHOW VARIABLES LIKE '%character_set%';

SHOW VARIABLES LIKE '%collation%';

show databases;

use mysql;

select user, host from user;

SHOW VARIABLES where value LIKE '/%';

create database event_app character set utf8mb4 collate utf8mb4_bin;

create user 'root'@'%' IDENTIFIED BY 'password';

grant all on table event_app.* to 'root'@'%';

flush privileges;

show grants for root@'%';

# cakephp 5.0.6

composer create-project --prefer-dist cakephp/app:~5.0 event-app

.env

export APP_DEFAULT_LOCALE="ja_jp"

export APP_DEFAULT_TIMEZONE="Asia/Tokyo"

app.local.php
    'Datasources' => [

        'default' => [

            'className' => 'Cake\Database\Connection',

            'driver' => 'Cake\Database\Driver\Mysql',

            'timezone' => 'UTC',

            'host' => 'localhost',

            'username' => 'root',

            'password' => 'password',

            'database' => 'event_app',

            'url' => env('DATABASE_URL', null),

        ],

# 권한 설정

getent passwd www-data

  171  getent group www-data

  172  systemctl restart httpd && systemctl restart php-fpm

  180  ls -l /run/php-fpm/www.sock

  184  systemctl restart httpd && systemctl restart php-fpm

  192  chown -R www-data:www-data /run/php-fpm/www.sock

  193  ls -l /run/php-fpm/www.sock
  

vi httpd.conf

<Directory />

    Options FollowSymLinks

    AllowOverride All

</Directory>

<Directory "/var/www">

    Options FollowSymLinks

    AllowOverride All

    Order Allow,Deny

    Allow from all

</Directory>

<Directory "/var/www/html">

    Options Indexes FollowSymLinks

    AllowOverride All

    Require all granted

</Directory>

vi /etc/php-fpm.d/www.conf

listen.owner = www-data

listen.group = www-data

listen.mode = 0660

listen.acl_users = apache,nginx,www-data


chcon -R -t httpd_sys_rw_content_t /var/www/html/event-app/tmp/

chcon -R -t httpd_sys_rw_content_t /var/www/html/event-app/logs

sudo semanage fcontext -a -t httpd_sys_rw_content_t "/var/run/php-fpm/www.sock"

sudo restorecon -v "/var/run/php-fpm/www.sock"

ausearch -c 'php-fpm' --raw | audit2allow -M my-phpfpm

semodule -X 300 -i my-phpfpm.pp


