# laravel-notifications

A basic Laravel package that provides Facebook style notifications. Notifications are assigned to your own User model and are automatically marked as read when that User visits the URL associated with the notification.

## Installation

1. Add to your composer.json
    ``` $ composer require illizian\notifications```

2. Add the Service Provider to your config/app.php file
```php
'providers' => array(
    // [...]
    'Illizian\Notifications\NotificationsServiceProvider'
)
```

3. Update your User model
```php
use Illizian\Notifications\Traits\NotificationableTrait;

class User extends Eloquent
{

    use NotificationableTrait;

    // [...]

}
```
_This package assumes your User model's classname is "User" - see [Configuration](#configuration) on how to override this_

4. Run the package migration
    ``` $ php artisan migrate --package="illizian\notifications"```

## Usage
The main Class for this package will be automatically aliased to 'Notify' for you, you can then use the class in your controllers to trigger notifications for a User:
```php
$to = User::find(1);
$from = User::find(2);
$msg = 'User 2 has sent you a message';
$url = '/inbox/message'; // This should be a relative URL

Notify::send($to, $from, $message, $url);
```

Then you can get the User's notifications from their model:
```php
$notifications = User::find(1)->notifications;
```

When the User visits ```/inbox/message``` the package will detect this and mark the notification as read, alternatively you can manually mark the notification read by providing the notification's ID to the read function:
```php
Notify::read(1)
```

## Routes & Views
The package contains some basic routes & views to get you started. The following routes are available:

Path                              | Description
--------------------------------- | -------------
/notifications/mark_as_read/{id}  | Mark the notification {id} as read
/notifications/api/all            | Get all User's notifications as JSON
/notifications/api/unread         | Get all User's unread notifications as JSON
_the prefix can be changed - see [Configuration](#configuration)_

## Configuration
The package contains a basic configuration file. You can import the configuration by running:

``` $ php artisan config:publish illizian\notifications```
