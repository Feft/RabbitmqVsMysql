## 5000 request results:
```bash
ab -n 5000 -c 100 http://localhost/rabbitmq_vs_mysql/web/app.php/rabbitmq
```
```
Server Software:        Apache/2.4.18
Server Hostname:        localhost
Server Port:            80

Document Path:          /rabbitmq_vs_mysql/web/app.php/rabbitmq
Document Length:        2 bytes

Concurrency Level:      100
Time taken for tests:   81.020 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1160000 bytes
HTML transferred:       10000 bytes
Requests per second:    61.71 [#/sec] (mean)
Time per request:       1620.400 [ms] (mean)
Time per request:       16.204 [ms] (mean, across all concurrent requests)
Transfer rate:          13.98 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.5      0      12
Processing:   212 1614 461.5   1504    5294
Waiting:      212 1575 461.9   1463    5235
Total:        224 1614 461.3   1505    5294
```
```bash
ab -n 5000 -c 100 http://localhost/rabbitmq_vs_mysql/web/app.php/doctrineTransaction
```
```
Server Software:        Apache/2.4.18
Server Hostname:        localhost
Server Port:            80

Document Path:          /rabbitmq_vs_mysql/web/app.php/doctrineTransaction
Document Length:        495 bytes

Concurrency Level:      100
Time taken for tests:   55.046 seconds
Complete requests:      5000
Failed requests:        0
Non-2xx responses:      5000
Total transferred:      3770000 bytes
HTML transferred:       2475000 bytes
Requests per second:    90.83 [#/sec] (mean)
Time per request:       1100.924 [ms] (mean)
Time per request:       11.009 [ms] (mean, across all concurrent requests)
Transfer rate:          66.88 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   2.2      0      17
Processing:   433 1097 293.5   1052    5493
Waiting:      433 1060 290.1   1018    5493
Total:        433 1098 294.5   1052    5493
```
