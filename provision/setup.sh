#!/usr/bin/env bash

# Install web server
echo "APT::Get::AllowUnauthenticated yes;" > /etc/apt/apt.conf.d/99auth
add-apt-repository -y -u ppa:ondrej/php
apt-get -qq update
apt -y install php7.1-fpm php7.1-json php7.1-sqlite nginx supervisor

cp /vagrant/provision/nxing-vhost /etc/nginx/sites-available/queue-platform
ln -s /etc/nginx/sites-available/queue-platform /etc/nginx/sites-enabled/queue-platform
rm /etc/nginx/sites-enabled/default

# Install composer globaly
sh /vagrant/provision/composer.sh

# Install packages
composer install --no-dev --working-dir=/vagrant/

# Set up database
mkdir /tmp/db
cp /vagrant/src/db.sqlite3.example /tmp/db/db.sqlite3
chmod 777 -R /tmp/db

# Setup and start supervisor
cp /vagrant/provision/supervisor.conf /etc/supervisor/conf.d/queue-platform-example.conf.conf
/etc/init.d/supervisor restart

# Reload nginx
/etc/init.d/nginx reload