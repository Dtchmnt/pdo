<?php

class DataBase
{
    public $connect;
    protected $database;
    /**
     * DataBase constructor.
     * @param string $user
     * @param string $password
     * @param string $host
     * @param string $dbname
     * @throws Exception
     */
    public function __construct($user = "root", $password = "", $host = "localhost", $dbname = "db")
    {
        $this->connect = TRUE;
        try {
            $this->database = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $user, $password);
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw  new Exception($e->getMessage());
        }
    }

// отключение от базы данных
    public function disconnect()
    {
        $this->database = NULL;
        $this->connect = FALSE;
    }

    /**
     * @param $query
     * @param array $params
     * @return array
     * @throws Exception
     */
// Получение всех данных
    public function getAll($query, $params = [])
    {
        try {
            $stmt = $this->database->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw  new  Exception($e->getMessage());
        }
    }
}