<?php

class MysqlConnector
{
    private string $hostName;
    private string $userName;
    private string $password;

    /**
     * @var false|PDO
     */
    public false|PDO $pdo;

    public function __construct(string $hostName, string $userName, string $password)
    {
        $this->hostName = $hostName;
        $this->userName = $userName;
        $this->password = $password;

        $this->connect();
    }

    private function connect(): void
    {
        try {
            $this->pdo = new PDO($this->hostName, $this->userName, $this->password);
        } catch (Exception $e){
            $this->connect();
        }
    }
}

$mysql = new MysqlConnector('localhost', 'root', '123');

// always TRUE => $mysql instanceof MysqlConnector

if(!($mysql->pdo instanceof PDO)){
    echo "DB ERROR!!!";
    die;
}

//....line 12 345

$mysqlAnother = new MysqlConnector('localhost1', 'admin', '345');


//...
