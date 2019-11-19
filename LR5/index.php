<?php 
require_once(__DIR__ . '/../Data/MysqlStudentsRepository.php');
require_once(__DIR__ . '/../Functions/HandleDecaneryRequest.php');

handleDecaneryRequest(new MysqlStudentsRepository());