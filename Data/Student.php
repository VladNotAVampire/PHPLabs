<?php

    class Student {
        
        const MALE_SEX = 'male';
        const FEMALE_SEX = 'female';

        public function __construct($fio, $rating, $sex, $group){
            $this->fio = $fio;
            $this->rating = $rating;
            $this->sex = $sex;
            $this->group = $group;
        }

        public $fio; 
        public $rating;
        public $sex;
        public $group;

        public function toString() {
            return "FIO: " . $this->fio 
                . " rating: " . $this->rating 
                . " sex: " . $this->sex;
        }
    }
    