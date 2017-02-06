Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.network "private_network", ip: "192.168.29.6"

  config.vm.provision :shell, path: "provision/setup.sh"  
end
