<?php

require "IdWork.php";

$node_id = rand(1, 1023);//随机数
$i = 0;
do {
    $id = IdWork::getInstance()->setWorkId($node_id)->nextId();
    echo $id .PHP_EOL;
    $i++;
} while ($i < 10);
