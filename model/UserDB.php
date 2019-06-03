<?php
/**
 * Created by PhpStorm.
 * User: lequangnghia
 * Date: 31/05/2019
 * Time: 15:52
 */

namespace Model;


class UserDB
{

    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function create($user)
    {
        $sql = "INSERT INTO Users(name,password,job) VALUES (?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $user->name);
        $statement->bindParam(2, $user->password);
        $statement->bindParam(3, $user->job);
        return $statement->execute();

    }
    public function login($name, $password)
    {
        $sql = "SELECT * FROM Users WHERE name = '$name' AND password = '$password'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }
    public function findById($id){
        $sql = "SELECT * FROM Users WHERE id = '$id'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetch();
        $user = new User( $result['name'], $result['password'],$result['job']);
        $user->id = $result['id'];
        return $user;
    }
    public function update($id, $editName, $editJob){
        $sql = "UPDATE Users SET name = '$editName', job = '$editJob' WHERE id = '$id'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }
    public function find($name)
    {
        $sql = "SELECT * FROM Users WHERE name = '$name'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetch();
        $user = new User($result['name'], $result['password'], $result['job']);
        $user->id = $result['id'];
        return $user;
    }
    public function getAll()
    {
        $sql = "SELECT * FROM Users";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }
}

