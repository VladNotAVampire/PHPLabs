<?php

    class Student {
        
        const MALE_SEX = 'male';
        const FEMALE_SEX = 'female';

        public function __construct($fio, $rating, $sex, $group, $id = 0){
            $this->fio = $fio;
            $this->rating = $rating;
            $this->sex = $sex;
            $this->group = $group;
            $this->id = $id;
        }

        public $fio; 
        public $rating;
        public $sex;
        public $group;
        public $id;

        public function toString() {
            return "FIO: " . $this->fio 
                . " rating: " . $this->rating 
                . " sex: " . $this->sex;
        }

        public function getSexAsInt(){
            return $this->sex == MALE_SEX ? 0 : 1;
        }
    }
    