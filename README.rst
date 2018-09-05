.. image:: https://github.com/BradyHammond/Grapplers_Elite/blob/master/logo/logo.png
   :alt: Grapplers Elite logo
   
|Docs| |Build Status| |codecov.io|

.. |Docs| image:: https://readthedocs.org/projects/grapplers-elite/badge/?version=latest
   :alt: Grapplers Elite Documentation Status on Read The Docs
   
.. |Build Status| image:: https://travis-ci.org/BradyHammond/Grapplers_Elite.svg?branch=master
   :alt: Grapplers Elite Status on Travis CI
   
.. |codecov.io| image:: https://codecov.io/gh/BradyHammond/Grapplers_Elite/branch/master/graph/badge.svg
   :alt: Grapplers Elite Code Coverage

.. contents::

Overview
========
The Grapplers Elite website is a simple website built primarily using Laravel (a PHP framework). There are also elements of the 
site implemented in AngularJS. There is a basic authorization system in place to allow administers to edit the site. At this
point in time the site mainly displays data. In the future transactions may also be included on the site.

Installation
============

MacOS
-----
Either install Xcode using the app store application or install the Xcode command line tools by using the following terminal 
command:
:: 
    $ xcode-select --install
Next install Homebrew by using the following terminal command:
::
   $ /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
Now you can run homebrew using the "brew" command from terminal. Homebrew puts everything in /usr/local so it does not clobber 
Apple installed libraries and binaries. You may have to to add /usr/local/bin to your bash shell path. You can do this by 
adding the following to your .bashrc file:

.. code-block:: bash
   
   #Add paths for non-interactive non-login shells such as ssh remote command
   
   # /usr/local/sbin prepend
   echo $PATH | grep -q -s "/usr/local/sbin"
   if [ $? -eq 1 ] ; then
      PATH=/usr/local/sbin:${PATH}
      export PATH
   fi
   
   # /usr/local/bin prepend
   echo $PATH | grep -q -s "/usr/local/bin"
   if [ $? -eq 1 ] ; then
      PATH=/usr/local/bin:${PATH}
      export PATH
   fi
   
   echo $MANPATH | grep -q -s "/usr/local/share/man"
   if [ $? -eq 1 ] ; then
      MANPATH=/usr/local/share/man:${MANPATH}
      export MANPATH
   fi
   
   # If not running interactively, don't do anymore just return so sftp works:
   [ -z "$PS1" ] && return

You can verify your installation of Homebrew by using the following terminal command:
::
   $ brew doctor
You can upgrade your installation of Homebrew by using the following terminal commands:
::
   $ brew update
   $ brew upgrade
   $ brew doctor
Next, you will need PHP 7.1.3 or greater. You can use Homebrew to install this by using the following terminal command:
::
  $ brew install php71
You can verify your installation of PHP by using the following terminal command:
::
   $ php -v
You will also need PostgreSQL. You can use Homebrew to install and start this by using the following terminal commands:
::
  $ brew install postgresql
  $ brew services start postgresql
You can check that PostgreSQL was successfully installed and started by using the following terminal command:
::
  $ postgres -V
Next, run the following commands to setup the needed database:
::
  $ psql -U postgres -h localhost
  postgres=# CREATE DATABASE grapplers_elite;
  postgres=# \q
You will now need Composer. Run the following terminal command to install Composer:
::
  $ brew install composer
You can check that Composer was installed correctly by running the following terminal command:
::
  $ composer -V
At this point you will need to download the website's source code. To do this run the following terminal command:
::
  $ git clone https://github.com/BradyHammond/Grapplers_Elite.git
Next, install all of the websites dependencies by running the following terminal commands:
::
  $ cd Grapplers_Elite
  $ composer self-update
  $ composer install
  
You will then need to create your own .env file. The file should include the following fields with their values:
::
  APP_NAME=GrapplersElite
  APP_ENV=
  APP_KEY=
  APP_DEBUG=
  APP_URL=

  LOG_CHANNEL=

  DB_CONNECTION=pgsql
  DB_HOST=
  DB_PORT=
  DB_DATABASE=grapplers_elite
  DB_USERNAME=
  DB_PASSWORD=

  BROADCAST_DRIVER=
  CACHE_DRIVER=
  SESSION_DRIVER=
  SESSION_LIFETIME=
  QUEUE_DRIVER=

  REDIS_HOST=
  REDIS_PASSWORD=
  REDIS_PORT=

  MAIL_DRIVER=
  MAIL_HOST=
  MAIL_PORT=
  MAIL_USERNAME=
  MAIL_PASSWORD=
  MAIL_ENCRYPTION=

  PUSHER_APP_ID=
  PUSHER_APP_KEY=
  PUSHER_APP_SECRET=
  PUSHER_APP_CLUSTER=

  MIX_PUSHER_APP_KEY=
  MIX_PUSHER_APP_CLUSTER=
This file should be saved in the project's root directory. Once your .env file is setup, you can run the following terminal 
command to generate a unique app key:
::
  $ php artisan key:generate
Finally, setup the project's database by running the following terminal commands:
::
  $ php artisan migrate 
  $ php artisan db:seed
  
Linux
-----
Update your distro with the following terminal commands:
::
   $ sudo apt update  
   $ sudo apt upgrade  
   $ sudo apt full-upgrade  
   $ sudo reboot now
Next, you will need PHP 7.1.3 or greater. You can install this by using the following terminal command:
::
  $ sudo apt-get install python-software-properties software-properties-common
  $ sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
  $ sudo apt-get update
  $ sudo apt-get remove php5-common -y
  $ sudo apt-get install php7.0 php7.0-fpm php7.0-mysql -y
  $ sudo apt-get --purge autoremove -y
You can verify your installation of PHP by using the following terminal command:
::
   $ php -v
You will also need PostgreSQL. You can install PostgreSQL using the following terminal commands:
::
  $ sudo apt-get install postgresql
You can check that PostgreSQL was successfully installed and started by using the following terminal command:
::
  $ postgres -V
Next, run the following commands to setup the needed database:
::
  $ psql -U postgres -h localhost
  postgres=# CREATE DATABASE grapplers_elite;
  postgres=# \q
You will now need Composer. Run the following terminal command to install Composer:
::
  $ curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
You can check that Composer was installed correctly by running the following terminal command:
::
  $ composer -V
At this point you will need to download the website's source code. To do this run the following terminal command:
::
  $ git clone https://github.com/BradyHammond/Grapplers_Elite.git
Next, install all of the websites dependencies by running the following terminal commands:
::
  $ cd Grapplers_Elite
  $ composer self-update
  $ composer install
  
You will then need to create your own .env file. The file should include the following fields with their values:
::
  APP_NAME=GrapplersElite
  APP_ENV=
  APP_KEY=
  APP_DEBUG=
  APP_URL=

  LOG_CHANNEL=

  DB_CONNECTION=pgsql
  DB_HOST=
  DB_PORT=
  DB_DATABASE=grapplers_elite
  DB_USERNAME=
  DB_PASSWORD=

  BROADCAST_DRIVER=
  CACHE_DRIVER=
  SESSION_DRIVER=
  SESSION_LIFETIME=
  QUEUE_DRIVER=

  REDIS_HOST=
  REDIS_PASSWORD=
  REDIS_PORT=

  MAIL_DRIVER=
  MAIL_HOST=
  MAIL_PORT=
  MAIL_USERNAME=
  MAIL_PASSWORD=
  MAIL_ENCRYPTION=

  PUSHER_APP_ID=
  PUSHER_APP_KEY=
  PUSHER_APP_SECRET=
  PUSHER_APP_CLUSTER=

  MIX_PUSHER_APP_KEY=
  MIX_PUSHER_APP_CLUSTER=
This file should be saved in the project's root directory. Once your .env file is setup, you can run the following terminal 
command to generate a unique app key:
::
  $ php artisan key:generate
Finally, setup the project's database by running the following terminal commands:
::
  $ php artisan migrate 
  $ php artisan db:seed

Windows
-------
Coming soon.

Usage
=====
With the website ready to run. You can start the server by running the following terminal command:
::
  $ php artisan serve

Resources
=========

Below are a list of resources that you may find helpful:

- https://brew.sh
- https://laravel.com
- https://getcomposer.org
- https://angularjs.org
