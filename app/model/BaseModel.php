<?php


require __DIR__.'/../db/DB.php';

class BaseModel{
    public static function connect(){
        DB::connect(DB_HOST, DB_USER, DB_PWD, DB_DB);
    }
    //2022-11-25 10:00:00
    static function validateDate($date, $format = 'Y-m-d'){
        $d1 = DateTime::createFromFormat($format, $date);
        $d2 = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        
        $caseOne = ($d1 && $d1->format($format) === $date);
        $caseTwo = ($d2 && $d2->format('Y-m-d H:i:s') === $date);
        
        return ($caseOne || $caseTwo);
    }
}

