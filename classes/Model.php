<?php

abstract class Model {

    protected static $dbh;
    protected $stmt;

    public function __construct() {
        self::$dbh = self::getInstance();
    }

    public static function getInstance() {

        if (!isset(self::$dbh)) {
            try {
                self::$dbh = new PDO('sqlite:fredux.db');
                self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return self::$dbh;
    }

    public function query($query) {
        $this->stmt = self::$dbh->prepare($query);
    }

    //Binds the prep statement
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
       // self::$dbh->beginTransaction(); 
         //try {
			$this->stmt->execute();
	  //} catch (PDOException $e) {
               //echo $e->getMessage();
      //}	
       // self::$dbh->commit();
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function lastInsertId() {
        return self::$dbh->lastInsertId();
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

}

