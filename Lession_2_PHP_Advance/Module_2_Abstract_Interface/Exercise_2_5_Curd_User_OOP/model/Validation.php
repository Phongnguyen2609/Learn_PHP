<?php
class Validation {
    public function check_empty($data, $fields){
        $msg = null;
        foreach($fields as $value){
            if(empty($data[$value])){
                $msg .= "$value field empty"."<br>";
            }
        }
        return $msg;
    }

    public function is_age_valid($age){
        if(preg_match("/^[0-9]+$/", $age)){
            return true;
        }
        return false;
    }
}