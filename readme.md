# Ordercloud PHP client - [![Build Status](https://travis-ci.org/ordercloud/ordercloud-php.svg?branch=master)](https://travis-ci.org/ordercloud/ordercloud-php) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ordercloud/ordercloud-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ordercloud/ordercloud-php/?branch=master)

## Introduction
This is the official Ordercloud PHP client.

## Installation
```sh
$ composer require ordercloud/ordercloud
```

## Creating an Ordercloud instance
```php
use Ordercloud\Support\OrdercloudBuilder;

$ordercloud = OrdercloudBuilder::create()
    ->setBaseUrl('https://test-api.ordercloud.com')
    ->setUsername('admin@example.com')
    ->setPassword('password')
    ->setOrganisationToken('organisation_token')
    ->getOrdercloud()
```
## Usage
All Api calls are presented as Request objects. If the request has not yet been modelled, then a custom request class can be used.
```php
use Ordercloud\Requests\Organisations\GetOrganisationRequest;
use Ordercloud\Requests\OrdercloudRequest;

// Get an organisation by ID
$organisation = $ordercloud->exec(new GetOrganisationRequest(3));

// Custom api request
new OrdercloudRequest($method, $uri, $parameters, $headers);

// Example of custom request
$organisation = $ordercloud->exec(
    new OrdercloudRequest(OrdercloudRequest::METHOD_GET, '/resource/organisations/3')
);
```

## Requests
All requests reside under the namespace Ordercloud\Requests.
