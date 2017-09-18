```
Server Software:        Apache/2.4.18
Server Hostname:        localhost
Server Port:            80

Document Path:          /rabbitmq_vs_mysql/web/app.php/doctrineMyisam
Document Length:        2 bytes

Concurrency Level:      10
Time taken for tests:   8.325 seconds
Complete requests:      500
Failed requests:        0
Total transferred:      116000 bytes
HTML transferred:       1000 bytes
Requests per second:    60.06 [#/sec] (mean)
Time per request:       166.505 [ms] (mean)
Time per request:       16.650 [ms] (mean, across all concurrent requests)
Transfer rate:          13.61 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.2      0       9
Processing:    33  165  48.2    167     337
Waiting:       32  160  47.5    159     337
Total:         33  166  48.2    167     337
```

```
Server Software:        Apache/2.4.18
Server Hostname:        localhost
Server Port:            80

Document Path:          /rabbitmq_vs_mysql/web/app.php/doctrine
Document Length:        2 bytes

Concurrency Level:      10
Time taken for tests:   11.042 seconds
Complete requests:      500
Failed requests:        0
Total transferred:      116000 bytes
HTML transferred:       1000 bytes
Requests per second:    45.28 [#/sec] (mean)
Time per request:       220.846 [ms] (mean)
Time per request:       22.085 [ms] (mean, across all concurrent requests)
Transfer rate:          10.26 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.7      0       8
Processing:    71  220  70.7    216     603
Waiting:       71  214  69.4    210     603
Total:         71  220  71.0    216     611
```
```
Server Software:        Apache/2.4.18
Server Hostname:        localhost
Server Port:            80

Document Path:          /rabbitmq_vs_mysql/web/app.php/doctrineTransaction
Document Length:        2 bytes

Concurrency Level:      10
Time taken for tests:   11.195 seconds
Complete requests:      500
Failed requests:        0
Total transferred:      116000 bytes
HTML transferred:       1000 bytes
Requests per second:    44.66 [#/sec] (mean)
Time per request:       223.896 [ms] (mean)
Time per request:       22.390 [ms] (mean, across all concurrent requests)
Transfer rate:          10.12 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.2      0      10
Processing:    83  223  77.4    215     552
Waiting:       77  217  75.3    210     547
Total:         83  223  77.4    215     552
```
```
Server Software:        Apache/2.4.18
Server Hostname:        localhost
Server Port:            80

Document Path:          /rabbitmq_vs_mysql/web/app.php/rabbitmq
Document Length:        2 bytes

Concurrency Level:      10
Time taken for tests:   11.151 seconds
Complete requests:      500
Failed requests:        0
Total transferred:      116000 bytes
HTML transferred:       1000 bytes
Requests per second:    44.84 [#/sec] (mean)
Time per request:       223.016 [ms] (mean)
Time per request:       22.302 [ms] (mean, across all concurrent requests)
Transfer rate:          10.16 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.9      0       7
Processing:   122  222  50.9    218     377
Waiting:      119  218  50.0    214     377
Total:        122  222  51.0    218     377
```
