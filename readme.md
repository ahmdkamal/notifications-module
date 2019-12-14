# Notification Module

A laravel package to push notification using FCM

## Prerequisites

- Composer
- PHP >=7.0.0
- Laravel >= 5.5.*

## Features

- Send to device / multiple devices
- Send to topic  / multiple topics
- Delete notification
- Retrieve notification
- Adjustable relation


## Installing
    composer require kamal\notifications-module

## How it works
    Run
        php artisan:vendor publish
  
- You can adjust the related model and the related column. <br>
- Then `php artisan migrate`
    
- Import in the related model `HasNotifications` trait.

## Documentation
    
The documentation is not provided yet.

## Authors

- Ahmad Kamal  - Initial work - [ahmdkamal](https://github.com/ahmdkamal)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
