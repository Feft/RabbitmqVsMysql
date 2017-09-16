# RabbitmqVsMysql
performance comparison between RabbitMQ and Mysql with Doctrine.  
First test Doctrine and Symfony 3.3.9:  
```bash 
ab -n 500 -c 10 http://localhost/rabbitmq_vs_mysql/web/app.php/doctrine
```  

Results:  
```
Server Software:        Apache/2.4.18
Server Hostname:        localhost
Server Port:            80

Document Path:          /rabbitmq_vs_mysql/web/app.php/doctrine
Document Length:        2 bytes

Concurrency Level:      10
Time taken for tests:   9.832 seconds
Complete requests:      500
Failed requests:        0
Total transferred:      116000 bytes
HTML transferred:       1000 bytes
Requests per second:    50.85 [#/sec] (mean)
Time per request:       196.640 [ms] (mean)
Time per request:       19.664 [ms] (mean, across all concurrent requests)
Transfer rate:          11.52 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.0      0       8
Processing:    72  196 103.4    173    1298
Waiting:       72  192 103.5    168    1298
Total:         72  196 103.8    173    1306
```
