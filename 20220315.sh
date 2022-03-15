#!/bin/bash

// 现在需要你统计出2020年4月23号的访问ip次数，并且按照次数降序排序。你的脚本应该输出
 awk '{if(substr($4,2,11)=="23/Apr/2020"){a[$1]++;}}END{for(i in a){print a[i],i}}' nowcoder.txt | sort -nrk 1
 // 现在你需要统计2020年04月23日20-23点的去重IP访问量，你的脚本应该输出
grep '23/Apr/2020' nowcoder.txt | cut -c-12 | sort -u | wc -l
// 现在需要你写脚本统计访问3次以上的IP，你的脚本应该输出
cut -c-12 nowcoder.txt | sort | uniq -c | awk '$1>3{print $1,$2}' | sort -nrk 1
// 现在需要你查询192.168.1.22的详细访问情况，按访问频率降序排序。你的脚本应该输出
awk '{if($1=="192.168.1.22"){a[$7]++;}}END{for(i in a){print a[i],i}}' nowcoder.txt | sort -nrk 1
// 现在需要你统计百度爬虫抓取404的次数，你的脚本应该输出
grep 'baidu' nowcoder.txt | grep '404' | wc -l