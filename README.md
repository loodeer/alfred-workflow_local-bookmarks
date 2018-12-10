# alfred-workflow_local-bookmarks

工作常用链接分布在各个系统中，每次打开各个系统，再找到页面打开，效率不高。

利用 alfred 实现一个方便使用的本地书签。

### 效果图

查看全部：
![查看全部](https://github.com/loodeer/alfred-workflow_local-bookmarks/blob/master/extra/all.png)
关键词搜索：
![搜索单个](https://github.com/loodeer/alfred-workflow_local-bookmarks/blob/master/extra/one.png)
添加书签：
![添加书签](https://github.com/loodeer/alfred-workflow_local-bookmarks/blob/master/extra/add.png)

### mysql 存储
```
CREATE TABLE `bookmarks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(64) NOT NULL DEFAULT '' COMMENT '所属应用',
  `url` varchar(256) NOT NULL DEFAULT '' COMMENT '链接地址',
  `search_word` varchar(64) DEFAULT NULL COMMENT '助搜词',
  `title` varchar(64) NOT NULL DEFAULT '' COMMENT 'url标题',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1删除;0正常',
  `gmt_create` datetime NOT NULL,
  `gmt_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
```