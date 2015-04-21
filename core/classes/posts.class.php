<?php

require_once("core/classes/dbc.class.php");




class Posts
{
    private $handler;
    private $sql;
    private $query;
    private $result;

    private function connectToDB()
    {
        /**
         * Подключение к БД
         */
        $this->handler = new Dbc();
        $this->handler = $this->handler->startConnection();
    }

    public function getMessages()
    {
        self::connectToDB();
        $this->sql = "SELECT * FROM posts ORDER BY postdate DESC LIMIT 20";

        try{
            $this->query = $this->handler->query($this->sql);
            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

            $this->query->closeCursor();
            $this->handler = null;
            return $this->result;
        }
        catch(Exception $e){
            echo "Error: Ошибка с запросом";
            return false;
        }
    }


    public function insertMessage($username, $message)
    {
        self::connectToDB();
        $this->sql = "INSERT INTO posts (username, post, postdate) VALUES (?, ?, NOW())";

        try{
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($username, $message));

            $this->handler = null;
            $this->query->closeCursor();
            return true;
        }
        catch(Exception $e){
            echo "Error: Ошибка с запросом";
            return false;
        }
    }

}