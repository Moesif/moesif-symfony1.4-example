## Symfony(1.4) Example

Moesif is an API analyatics and monitoring platform. [moesif-symfony1.4](https://github.com/Moesif/moesif-symfony1.4)
is a middleware that makes integration with Moesif easy for Symfony1.4 based applications.

This is an example of an API built on Symfony (1.4) with Moesif integrated.

## How to enable MoesifFilter

Create a custom filter `MyCustomFilter` which extends MoesifFilter and you would be able to view all the API calls being captured.

```php
<?php

use MoesifFilter;

class MyCustomFilter extends MoesifFilter {

    /**
     * Get UserId
     */
    public function identifyUserId($request, $response){

        $user = $this->getContext()->getUser();
        return $user->getAttribute("user_id");
    }

    /**
     * Get sessionToken
     */
    function identifySessionToken($request, $response){
        return $request->getHttpHeader('Authorization');
    }
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

Your Moesif Application Id can be found in the [_Moesif Portal_](https://www.moesif.com/).
After signing up for a Moesif account, your Moesif Application Id will be displayed during the onboarding steps. 

You can always find your Moesif Application Id at any time by logging 
into the [_Moesif Portal_](https://www.moesif.com/), click on the top right menu,
and then clicking _Installation_.

## How to run this example

1. Install the dependencies `composer update` or `composer install`.
1. Update the files `config/filters.yml` with your Moesif Application Id .
2. Change to `web` directory.
3. Run `php -S localhost:8888` to start the server.
4. Hit the server with this route - `http://localhost:8888/index.php` and you would see the event is captured in Moesif.
