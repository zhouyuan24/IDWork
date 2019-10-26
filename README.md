IDWork
======

Twitter的 Snowflake的PHP版


## 示例

``` php
<?php

require "IdWork.php";

$node_id = rand(1, 1023);//随机数
$id = IdWork::getInstance()->setWorkId($node_id)->nextId();
echo $id;
```

输出：
```
1187992118450290688
```

注：不支持Windows系统。  

