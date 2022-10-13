<?php

include_once('connection.php'); 

class Db_Class {

    private $table_name = 'users';

    function createUser($data) {
        $sql = "INSERT INTO PUBLIC.".$this->table_name."(first_name,last_name,email,createddate) "."VALUES('".$this->cleanData($data['firstname'])."','".$this->cleanData($data['lastname'])."','".$this->cleanData($data['email'])."','".$this->cleanData($data['creationDate'])."')";
        return pg_affected_rows(pg_query($sql));
    }

    function getUsers() {             
        $sql ="select * from public." . $this->table_name . " ORDER BY uid DESC";
        return pg_query($sql);
    } 

    function getUserById() {    
        $sql ="select * from public." . $this->table_name . "  where uid='".$this->cleanData($_POST['id'])."'";
        return pg_query($sql);
    } 

    function deleteuser() {    
        $sql ="delete from public." . $this->table_name . " where uid='".$this->cleanData($_POST['uid'])."'";
        return pg_query($sql);
    } 

    function updateUser($data=array()){       
        $sql = "update public.users set name='".$this->cleanData($_POST['name'])."',email='".$this->cleanData($_POST['email'])."' where uid = '".$this->cleanData($_POST['uid'])."' ";
        return pg_affected_rows(pg_query($sql));        
    }

    function cleanData($val){
         return pg_escape_string($val);
    }

}

?>