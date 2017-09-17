# RabbitmqVsMysql
performance comparison between RabbitMQ and Mysql with Doctrine, php 7.0.22
First test Doctrine and Symfony 3.3.9:  
```bash 
ab -n 500 -c 10 http://localhost/rabbitmq_vs_mysql/web/app.php/doctrine
```  

Results:  
```
Server Software:        Apache/2.4.18
Server Hostname:        localhost
Server Port:            80

Document Path:          /rabbitmq_vs_mysql/web/app.php/doctrineMyisam
Document Length:        2 bytes

Concurrency Level:      10
Time taken for tests:   4.684 seconds
Complete requests:      500
Failed requests:        0
Total transferred:      116000 bytes
HTML transferred:       1000 bytes
Requests per second:    106.75 [#/sec] (mean)
Time per request:       93.676 [ms] (mean)
Time per request:       9.368 [ms] (mean, across all concurrent requests)
Transfer rate:          24.19 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.3      0      15
Processing:    21   93  29.1     90     207
Waiting:       21   90  28.9     86     207
Total:         21   93  29.2     90     208
```

Second test RabbitMQ and Symfony 3.3.9:  
```bash 
ab -n 500 -c 10 http://localhost/rabbitmq_vs_mysql/web/app.php/rabbitmq
```  

Results:  
```
Server Software:        Apache/2.4.18
Server Hostname:        localhost
Server Port:            80

Document Path:          /rabbitmq_vs_mysql/web/app.php/rabbitmq
Document Length:        2 bytes

Concurrency Level:      10
Time taken for tests:   8.285 seconds
Complete requests:      500
Failed requests:        0
Total transferred:      116000 bytes
HTML transferred:       1000 bytes
Requests per second:    60.35 [#/sec] (mean)
Time per request:       165.696 [ms] (mean)
Time per request:       16.570 [ms] (mean, across all concurrent requests)
Transfer rate:          13.67 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.5      0      14
Processing:    99  164  35.5    160     296
Waiting:       99  163  34.4    159     295
Total:         99  164  35.6    160     296
```
More results in results.ods file.

### Required configuration:

config.yml -> rabbit configuration:
```
# OldSoundRabbitMq Configuration
old_sound_rabbit_mq:
    connections:
        default:
            host:     'localhost'
            port:     5672
            user:     'guest'
            password: 'guest'
            vhost:    '/'
            lazy:     false
    producers:
        api_call:
            connection:       default
            exchange_options: {name: 'api-call', type: direct}
            queue_options:    {name: 'api_call'}
        api_call_transient:
            connection:       default
            exchange_options: {name: 'api_call_transient', type: direct}
            queue_options:    {name: 'api_call_transient', durable: false}
```

services.yml -> producer configuration:
```
    producer_service:
        class: AppBundle\Services\Producer
        arguments: ["@old_sound_rabbit_mq.api_call_producer"]
        #arguments: ["@old_sound_rabbit_mq.api_call_transient_producer"]
```
AppKernel-> registerBundles() function:
```php
public function registerBundles()
{
    $bundles = [
        ...
        new OldSound\RabbitMqBundle\OldSoundRabbitMqBundle(),
    ];

    ...

    return $bundles;
}
```
composer.json:
```
"require": {
        "php": ">=5.5.9",
        "doctrine/doctrine-bundle": "^1.6",
        "doctrine/orm": "^2.5",
        "incenteev/composer-parameter-handler": "^2.0",
        "sensio/distribution-bundle": "^5.0.19",
        "sensio/framework-extra-bundle": "^3.0.2",
        "symfony/monolog-bundle": "^3.1.0",
        "symfony/polyfill-apcu": "^1.0",
        "symfony/swiftmailer-bundle": "^2.3.10",
        "symfony/symfony": "3.3.*",
        "twig/twig": "^1.0||^2.0",
        "php-amqplib/php-amqplib": ">=2.6.1"
    },
```

