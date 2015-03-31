Yii 2 Advanced Application Template
===================================

Yii 2 Advanced Application Template is a skeleton Yii 2 application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION
------------


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the application using the following command:

~~~
composer global require "fxp/composer-asset-plugin:1.0.0"
composer create-project --prefer-dist --stability=dev harrytang/yii2-app advanced
composer update
~~~


GETTING STARTED
---------------

After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Run command `init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
3. Apply migrations
~~~
yii migrate --migrationPath=@vendor/harrytang/yii2-account/migrations/ --migrationTable={{%account_migration}}
yii migrate --migrationPath=@yii/rbac/migrations/ --migrationTable={{%admin_migration}}
yii migrate --migrationPath=@vendor/harrytang/yii2-admin/migrations/ --migrationTable={{%admin_migration}}
~~~