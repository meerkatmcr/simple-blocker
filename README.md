# simple-blocker
Very simple user-blocking functionality for Laravel 5.x

## Installation
This package assumes that your users table is called `users`.
### Process
* Install the package with `composer install meerkatmcr/simple-blocker`
* Perform the database migration `php artisan migrate`
* Add the `MeerkatMcr\SimpleBlocker\Traits\Blockable` trait to your user model.
 
## Usage
### User model methods
The `Blockable` trait provides three methods:
* `block()` block the user
* `unblock()` unblock the user
* `isBlocked()` return `TRUE` if the user is blocked

`block()` and `unblock()` are both fluent, and neither saves the model.

### Middleware
The `MeerkatMcr\SimpleBlocker\Middleware\CheckUnblocked` middleware will abort 
a request with code 403 if the current user is blocked.

To use it, register it in `app/Http/Kernel.php` as with any other middleware
class. See the
[Laravel manual](https://laravel.com/docs/6.x/middleware#registering-middleware)
for further details.

The abort message is configurable - its key is `simple-blocker.message`. This 
package publishes its config file (`simple-blocker.php`).
