Exec { path => [ '/bin/', '/sbin/' , '/usr/bin/', '/usr/sbin/' ] }

file { '/etc/apt/apt.conf.d/99auth':
    owner => root,
    group => root,
    content => 'APT::Get::AllowUnauthenticated yes;',
    mode => '644';
}

package { 'software-properties-common':
    ensure => present,
    require => File['/etc/apt/apt.conf.d/99auth']
}

exec { 'php-repository':
    command => 'add-apt-repository -y -u ppa:ondrej/php',
    require => Package['software-properties-common']
}

$php = [ 'php7.1', 'php7.1-json', 'php7.1-sqlite3', 'php7.1-cli']
package { $php: 
	ensure => 'installed',
	require => Exec['php-repository']
}

exec{'get-composer':
    command => "wget -q https://getcomposer.org/composer.phar -O /vagrant/composer.phar",
    creates => "/vagrant/composer.phar",
}

exec{'install-composer':
    command => "php /vagrant/composer.phar install --working-dir=/vagrant --no-dev",
}

package { 'supervisor':
    ensure => present,
}

exec { 'set-up':
    command => 'rm -rf /var/www/html && mkdir /tmp/db && cp /vagrant/src/db.sqlite3.example /tmp/db/db.sqlite3 && chmod 777 -R /tmp/db && cp /vagrant/puppet/files/queue-platform-example.conf /etc/supervisor/conf.d/queue-platform-example.conf',
}


file { '/var/www/html':
    ensure => 'link',
    target => '/vagrant/public',
    require => Exec['set-up']
}

service { 'supervisor':
  ensure => running,
  enable => true,
  require => Exec['set-up']
}

exec { 'reload-apache2':
    command => '/etc/init.d/apache2 reload',
}