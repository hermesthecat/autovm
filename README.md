# What is AutoVM?

AutoVM is an open-source platform based on the GPL license to manage virtual machines on VMware ESXi virtualization. It allows VPS providers to manage full automation of support and sales process. AutoVM platform is a good choice for hosting companies or VPS providers to increase their service and support quality.
With AutoVM you can assign a unique panel for each user to make them fulfilled all about VPS related. This must be noticeable as AutoVM additional tools, except Automatic Monitoring you can give your billing managements to AutoVM! So you can give more fast services to your customers.

### Some of the features

* Bandwidth monitoring and manage VPS traffic usage.
* Install easily without any changes on the ESXI servers.
* Free modules for managing VPS on the WHMCS client area.
* Auto Provisioning VM After Payment Successfully.
* Auto-assign IP and Network adapter once VM created.
* Auto installation of the operating system.
* Ability to assign the existing VM created for WHMCS users.

### Prerequisite

The AutoVM platform is designed to be compatible with default VMware ESXi settings and does not require any changes.

## Installation
### Automatic installation
Download and deploy [Ubuntu 18.04](http://file.autovm.net/vmware/templates/ubuntu_18.04_64.ova) or install the iso without any configuration on your ESXi server then config static ip address.

Enter following commands:

```shell
$ cd /tmp && wget -O autovm.sh https://raw.githubusercontent.com/Cloud-Surph/autovm/master/autovm.sh && bash autovm.sh
```
After installation completed, You will see MySQL and login information.

```shell
$ mysql_secure_installation
```

#### Supervisor installation
Supervisor is a process monitor for Linux. It automatically starts console processes.

```shell
$ sudo apt-get install supervisor
```
Supervisor config folder is usually available in ```/etc/supervisor/conf.d```. You can create any number of config files there.
Create new file ```/etc/supervisor/conf.d/yii-queue-worker.conf``` and paste the following data inside file.

```ini
[program:yii-queue-worker]
process_name=%(program_name)s_%(process_num)02d
command=/usr/bin/php /var/www/autovm/yii queue/listen --verbose=1 --color=0
autostart=true
autorestart=true
user=www-data
numprocs=4
redirect_stderr=true
stdout_logfile=/var/www/autovm/runtime/logs/yii-queue-worker.log
```

Make sure ```autovm/runtime``` directory has write access.

Run ```$ supervisorctl reread``` to update the supervisor running tasks list.

### Do you like to try for free?

To get and set up the system, please visit the installation [article](https://wiki.autovm.net/index.php/Installation). If you have any questions, please read the [FAQ](https://wiki.autovm.net/index.php/FAQs) section. If you didn't find your answer, please ask your question in the [stack](http://stack.autovm.net).
