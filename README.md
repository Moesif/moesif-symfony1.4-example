## Symfony(1.4) Application with Moesif Integrated

Official SDK for PHP Symfony(1.4) to automatically capture incoming HTTP traffic.

Moesif is an API analyatics platform. [moesif-symfony1.4](https://github.com/Moesif/moesif-laravel)
is a middleware that makes integration with Moesif easy for Symfony1.4 based applications.

This is an example of Symfony1.4 application with Moesif integrated.

## How to enable MoesifFilter

Create a custom filter `MyCustomFilter` which extends MoesifFilter and you would be able to view all the API calls being captured.

```php
<?php

use MoesifFilter;

class MyCustomFilter extends MoesifFilter {

}
```


Update the filters.yml files to enable capturing API calls.

`config/filters.yml`

```yaml
MyCustomFilter:  
  class: MyCustomFilter
  param:
    applicationId: Your Moesif Application Id
    debug: 'true'
    logBody: 'true'
```

`apps/frontend/config/filters.yml`

```yaml
MyCustomFilter:  
  class: MyCustomFilter
  debug: 'true'
  param:
    applicationId: Your Moesif Application Id
    debug: 'true'
    logBody: 'true'
```

## How to disable the filter
Set the `enabled` param to `false` in `apps/frontend/config/filters.yml` file if you would like to disable capturing API calls.

```yaml
MyCustomFilter:  
  class: MyCustomFilter
  enabled: 'false'
  param:
    applicationId: Your Moesif Application Id
    debug: 'true'
    logBody: 'true'
```



## How to run this example

1. Install the dependencies `composer update` or `composer install`.
1. Update the files `config/filters.yml` and `apps/frontend/config/filters.yml` with your Moesif Application Id .
2. Change to `web` directory.
3. Run `php -S localhost:8888` to start the server.
4. Hit the server with this route - `http://localhost:8888/index.php` and you would see the event is captured in Moesif.