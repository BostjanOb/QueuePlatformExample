Vagrant.configure("2") do |config|
  config.vm.box = "puppetlabs/ubuntu-16.04-64-puppet"
  config.vm.network "private_network", ip: "192.168.29.6"

  config.vm.provision "puppet" do |puppet|
  	puppet.manifests_path = "puppet/manifests"
    puppet.manifest_file = "default.pp"

    puppet.environment_path = "puppet/environments"
    puppet.environment = "test"
  end
  
end