<?php
require __DIR__ . '/vendor/autoload.php';
use \ZKAttendance\ZKLibrary;

$zk = new ZKLibrary('172.17.254.4',4370);
$zk->connect();
foreach ( $zk->getAttendance() as $att){
	print_r($att);

}

foreach ( $zk->getUser() as $user){
	print_r($user);
}
#print_r($zk);
