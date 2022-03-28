<?php

/*
sync_binlog
sync_binlog=0 的时候，表示每次提交事务都只 write，不 fsync；
sync_binlog=1 的时候，表示每次提交事务都会执行 fsync；
sync_binlog=N(N>1) 的时候，表示每次提交事务都 write，但累积 N 个事务后才 fsync。

*/