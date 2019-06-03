<?php
/**
 * Created by PhpStorm.
 * User: lequangnghia
 * Date: 31/05/2019
 * Time: 15:52
 */

namespace Model;


class User
{
    public $name;
    public $password;
    public $job;

    public function __construct($name, $password, $job)
    {
        $this->name = $name;
        $this->password = $password;
        $this->job = $job;
    }
}
