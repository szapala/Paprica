<?php

class Database
{

    public $pdo;
    private $queries = 0;
    private $execTime;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, array(PDO::
            MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            die('Połączenie nie mogło zostać utworzone: ' . $e->getMessage());
        }
    }

    public function query($sql,$jedenrekord = FALSE)
    {
        try {
            $execStart = microtime(true);
            $result = $this->pdo->query($sql);
            $exec_time = microtime(true) - $execStart;

            $this->queries++;
            $this->execTime += $exec_time;

            if($jedenrekord == true){
                $result->setFetchMode(PDO::FETCH_ASSOC);
                return $result->fetch();
            }

            return $result;
        }
        catch (PDOException $e) {
            throw new Exception('Query problem: ' . $e->getMessage());
        }
    }

    public function exec($sql)
    {
        $query_start = microtime(true);
        $query = $this->pdo->exec($sql);
        $exec_time = microtime(true) - $query_start;

        $this->queryExec += $exec_time;
        $this->queries++;
        return $query;
    }

    public function beginTransaction()
    {
        $this->pdo->beginTransaction();
    }
    public function commit()
    {
        $this->pdo->commit();
    }
    public function rollBack()
    {
        $this->pdo->rollBack();
    }

    public function getLastId()
    {
        return $this->pdo->lastInsertId();
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    public function getQueryNum()
    {
        return $this->queries;
    }

    public function getQueryExec()
    {
        return $this->queryExec;
    }

}

?>