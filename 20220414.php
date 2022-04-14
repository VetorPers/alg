<?php

数据基本上不会更新，如果数据量不大可以前端做静态组件
让用户填写城市
后端做数据缓存，在内存中操作
接口返回省的数据可以附带返回常用城市的数据


CREATE TABLE `regions` (
`id` int(11) AUTO_INCREMENT,
  `name` varchar(40),
  `parent_id` int(11),
  `full_parent_id` varchar(255),
  PRIMARY KEY (`id`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=InnoDB;


a.前端做防重复点击。有唯一性的字段可以添加唯一索引，csrf_token
b.csrf_token，前端页面访问分配一个唯一token，提交表单携带token。考虑到数据量大，token可以存在redis中
