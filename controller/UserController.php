<?php
/**
 * Created by PhpStorm.
 * User: lequangnghia
 * Date: 31/05/2019
 * Time: 15:52
 */

namespace Controller;

use Model\DBConnection;
use Model\User;
use Model\UserDB;

class UserController
{
    public $userDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=Ecommage4", "root", "0912828401");
        $this->userDB = new UserDB($connection->connect());
    }
    public function register()
    {
        $name = $_POST['name'];
        $password = md5($_POST['password']);
        $job = $_POST['job'];
        $user = new User($name, $password, $job);
        return $this->userDB->create($user);
    }
    public function login()
    {
        $name = $_POST['name'];
        $password = md5($_POST['password']);
        return $this->userDB->login($name, $password);
    }
    public function findName($name)
    {
        return $this->userDB->find($name);
    }
    public function logout()
    {
        session_destroy();
    }
    public function update($id,$editName, $editJob){
        return $this->userDB->update($id,$editName,$editJob);
    }
    public function findId($id){
        return $this->userDB->findById($id);
    }
    public function index(){
        return $this->userDB->getAll();
    }

}
