<?php

/*

sdshdr{
    len,free,buf[]
}
O(1)时间复杂度获取字符串长度 strlen
因为free 防止缓存区溢出
减少内存分配次数 更新之后小于1M,free=len。大于1M，free=1M
"\0"兼容c语言，可以调用c语言函数，如printf

list{
    head,tail,len,
}

listNode{
    prev,next,value
}

dict{
    ht[2],rehashidx
}

dictht{
    table,size,sizemask//size-1,used
}

dictEntry{
    key,value,next
}

rehash 扩容，大于used*2 第一个2^n。缩容，大于used的第一个2^n

渐进式rehash，每次执行操作，ht[0]的rehashidx到ht[1] 然后rehashidx++







 */
