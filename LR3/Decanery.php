<?php 
require_once(__DIR__ . '/../Data/HardcodedStudentsRepository.php');
require_once(__DIR__ . '/../Functions/ViewDecaneryRequest.php');

viewDecaneryRequest(HardcodedStudentsRepository::getInstance());