<?php

require "IdWork.php";

$node_id = rand(1, 1023);//随机数
$id = IdWork::getInstance()->setWorkId($node_id)->nextId();
echo $id;