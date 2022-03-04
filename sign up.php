<?php
class Person {
    private $username, $password, $re_password, $email;

    public function __construct($username, $password, $re_password, $email)
    {
    $this->username = $username;
    $this->password = md5($password);
    }

    public function autorization() {
        $query_builder = new Query_builder();
        $response = $query_builder->query("SELECT * FROM users Where `username` = \"$this->username\"");
        if($response) {
            if($response[0][1] === $this->password) {
                session_start();
                $_SESSION['session_username'] = $this->username;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // 0 - неправильный пароль
    // 1 - такого пользователя не существует, зарегестрироваться?
    
    $user = new User($data["username"], $data["password"], $data["re-password"]);
    $result = $user->authorization();
    if($result) {
        echo "Мы вошли";
    } else {
        echo "Неверный логин или пароль!";
    } 

?>