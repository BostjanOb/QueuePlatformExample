# QueuePlatform Example

Example project using [QueuePlatform](https://github.com/BostjanOb/QueuePlatform).

This example project registers 6 workers:

- **arithmetic** - performs arithmetic operations (using php-shunting-yard library)
- **encoder** - encode text using bcrypt
- **fibonacci** - calculate fibbonaci number
- **reverse** - reverse text
- **slowtask** - dummy slow task (performs sleep for given seconds - provided as parameter)

## Use vagrant to run in

1. Clone repository
2. Cd into cloned folder
3. Run `vagrant up`
4. Visit http://192.168.29.6/index.html and test workers

vagrant will run 5 processes with supervisor

## Run it on your own server

1. Clone repository and make public folder available by web server (let's say example.com).
2. Copy `db.sqlite3.example` to `db.sqlite3`
3. Run as many processes (`process.php` in src folder) as you want: `php process.php http://example.com/queue.php`
4. Visit http://exmaple.com/index.html and test workers
