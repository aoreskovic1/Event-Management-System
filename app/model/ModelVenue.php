<?php

require_once __DIR__ . '/BaseModel.php';

class ModelVenue extends BaseModel {

    public static function getAll() {
        self::connect();

        $query = 'SELECT * FROM `venue` WHERE 1;';
        $venues = DB::queryAll($query, ModelVenue::class);

        return $venues;
    }

    public static function getSingle($id) {
        self::connect();
        //serenity.ist.edu?route=event&id=1;drop events where 1;
        $query = "SELECT * FROM `venue` WHERE `idvenue` = :id;";

        $venue = DB::queryOne($query, ModelVenue::class, ['id' => $id]);

        return $venue;
    }

    public static function delete($id) {
        self::connect();

        $query = "DELETE FROM venue WHERE idvenue = :id;";

        DB::query($query, ['id' => $id]);

        $query = "DELETE FROM event WHERE venue = :id;";

        return DB::query($query, ['id' => $id]);
    }

    public static function create($params) {
        self::connect();
        
        $errors = self::validateModel();
        
        if(!empty($errors)) {
            require __DIR__.'/../view/Venues/update.php';
            die();
        }

        $data = [
            'name' => $params['name'],
            'capacity' => $params['capacity']
        ];

        $query = "INSERT INTO `venue` (name, capacity)"
                . " VALUES(:name, :capacity)";

        return DB::query($query, $data);
    }

    public static function update($id, $params) {
        self::connect();
        
        $errors = self::validateModel();
        
        if(!empty($errors)) {
            require __DIR__.'/../view/Venues/update.php';
            die();
        }

        $data = [
            'id' => $params['id'],
            'name' => $params['name'],
            'capacity' => $params['capacity']
        ];

        $query = "UPDATE `venue` SET `name`=:name,"
                . "`capacity`=:capacity WHERE idvenue = :id";

        DB::query($query, $data);

        return self::getSingle($id);
    }
    
    public static function validateModel() {
        $errors = [];
        #Validate string length
        $len = intval(strlen(strval($_POST['name'])));
        if($len < 3 || $len > 50) {
            $errors['name'] = 'Name must be between 3 and 50 characters. Submited lenght: '.$len;
        }
        
        #Validate string length
        if(intval($_POST['capacity']) < 10 || intval($_POST['capacity'] > 100000)) {
            $errors['capacity'] = 'Capacity must be between 10 and 100 000 people.';
        }
        
        return $errors;
    }
    
    

}
