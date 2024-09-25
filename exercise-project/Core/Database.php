<?php

namespace Core;
use PDO;
class Database{
    public $connection;
    public $statement;
    public function __construct($config, $username = 'root', $password = 'root')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    public function query($query, $params = [])
    {
        // statement koji dobivamo preko PDO od baze
        $this->statement = $this->connection->prepare($query);

        // bindanje parametara u upit
        $this->statement->execute($params);

        // vise ne vracam statement nego vracam instancu klase
        return $this;
    }
    public function get()
    {
        return $this->statement->fetchAll();
    }
    public function find()
    {
        return $this->statement->fetch();
    }
    public function findOrFail()
    {
        $result = $this->find();

        if (!$result){
            abort();
        }

        return $result;
    }
}

//    // dsn: data source name - connection string
//    $dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";
//    $username = 'root';
//    $password = 'root';
//
//    // PDO: PHP Data Objects
//    // -------------------------------------------------------------
//    // database access layer koji pruza uniformne metode
//    // za pristup bazama podataka
//    // -------------------------------------------------------------
//    // mogu koristiti iste funkcije za komunikaciju bez obzira
//    // na bazu podataka koju koristim
//
//    $pdo = new PDO($dsn, $username, $password);
//
//    $statement = $pdo->prepare("select * from posts");
//
//    $statement->execute();
//
//    // :: je scope resolution operator
//    // daje pristup konstantama u klasi
//    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//    foreach ($posts as $post) {
//        echo "<li>" . $post['title'] . "</li>";
//    }