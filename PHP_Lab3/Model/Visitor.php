<?php
class Visitor
{
    private $username;
    private $password;
    private $email;

    public function __construct($username, $password, $email)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setEmail($email);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}