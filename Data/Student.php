<?php

    class Student {
        
        const MALE_SEX = 'male';
        const FEMALE_SEX = 'female';

        public function __construct($fio, $rating, $sex){
            $this->fio = $fio;
            $this->rating = $rating;
            $this->sex = $sex;
        }

        public $fio; 
        public $rating;
        public $sex;

        public function toString() {
            return "FIO: " . $this->fio 
                . " rating: " . $this->rating 
                . " sex: " . $this->sex;
        }
    }
    