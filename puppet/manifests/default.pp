# export LC_ALL="en_US.UTF-8"
	# apt install software-properties-common
	# add-apt-repository -y -u ppa:ondrej/php
	# apt-get update
	# apt-get upgrade
	# apt-get install php7.1 (from com

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
    path => '/usr/bin',
    require => Package['software-properties-common']
}

$php = [ 'php7.1', 'php7.1-json', 'php7.1-sqlite3', 'php7.1-cli']
package { $php: 
	ensure => 'installed',
	require => Exec['php-repository']
}

exec { 'set-folder':
    command => 'rm -rf /var/www/html/ && ln -s /vagrant/public /var/www/html',
    path => '/usr/bin'
}