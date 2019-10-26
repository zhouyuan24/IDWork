<?php 
require "IdWork.php";
$node_id = rand(1, 1023);//随机数
$obj = IdWork::getInstance()->setWorkId($node_id);

$child_pids = [];
for($i=0;$i<10; $i++){
    $pid = pcntl_fork();
    if($pid == -1){
        exit("fork fail");
    }elseif($pid){
        $child_pids[] = $pid;

        $id = getmypid();   
        //echo time()." Parent process,pid {$id}, child pid {$pid}\n";   
    }else{
        $id = getmypid(); 
        $rand =   rand(1,3);
        //echo time()." Child process,pid {$id},sleep $rand\n";   
        //sleep($rand); //#1 故意设置时间不一样
        $id = $obj->nextId();
        echo $id .PHP_EOL;
        exit();//#2 子进程需要exit,防止子进程也进入for循环
    }
}

while(count($child_pids)){
    foreach ($child_pids as $key => $pid) {
        $res = pcntl_waitpid($pid, $status, WNOHANG);//#3
        if ($res == -1 || $res > 0){
            //echo time()." Child process exit,pid {$pid}\n";   
            unset($child_pids[$key]);
        }
    }
    
} 