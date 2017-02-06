# QueuePlatform Example

Example project using [QueuePlatform](https://github.com/BostjanOb/QueuePlatform).

This example project registers 6 workers:

- **arithmetic** - performs arithmetic operations (using php-shunting-yard library)
- **encoder** - encode text using bcrypt
- **fibonacci** - calculate Fibbonaci number
- **reverse** - reverse text
- **slowtask** - dummy slow task (performs sleep for given seconds - provided as a parameter)

## Use vagran

1. Clone repository
2. Cd into cloned folder
3. Run `vagrant up`
4. Visit http://192.168.29.6/index.html and test workers

vagrant will run 5 processes with supervisor

## Run on your own server

1. Clone repository and make the public folder available by a web server (let's say example.com).
2. Copy `db.sqlite3.example` to `db.sqlite3` and fix connection path in `src/qm.php`
3. Run as many processes (`process.php` in src folder) as you want: `php process.php http://example.com/queue.php`
4. Visit http://example.com/index.html and test workers
