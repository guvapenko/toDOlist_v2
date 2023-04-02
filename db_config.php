<?php
require_once 'const.php';
class dbConnect
{
    private $link;

    public function __construct()   //метод, осуществляющий подключение к БД
    {
        $this->connect();
    }

    public function query($sql, $params=[]) //метод для запросов MySQL (ввод/вывод/удаление)
    {
        $exec = $this->link->prepare($sql);
        if (is_array($params) && isset($params))
        {
            foreach ($params as $i => $value)
            {
                $exec->bindParam($i+1, $value[0], NUM);
            }
        }
        $exec->execute();
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

    private function connect()  //метод для подготовки подкдючения к БД
    {
        $this->link = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';charset=utf8',  USERNAME, '');

        return $this;
    }
}