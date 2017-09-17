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
Document Length:        2 bytes

Concurrency Level:      100
Time taken for tests:   51.061 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1160000 bytes
HTML transferred:       10000 bytes
Requests per second:    97.92 [#/sec] (mean)
Time per request:       1021.220 [ms] (mean)
Time per request:       10.212 [ms] (mean, across all concurrent requests)
Transfer rate:          22.19 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   1.8      0      15
Processing:   115 1016 234.1    984    2665
Waiting:      115  981 230.2    945    2540
Total:        122 1016 233.8    984    2665
```
