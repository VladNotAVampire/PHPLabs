<?php 
require_once(__DIR__ . '/../Data/HardcodedStudentsRepository.php');
require_once(__DIR__ . '/../Functions/HandleDecaneryRequest.php');

handleDecaneryRequest(HardcodedStudentsRepository::getInstance());