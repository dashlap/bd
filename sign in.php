<?php
class User {
    private $username, $password, $re_password;

    public function __construct($username, $password, $re_password) {
        $this->username = $username;
        $this->password = md5($password);
        $this->re_password = md5($re_password);
    }

    public function registration() {
        $query_builder = new Query_builder();
        $response = $query_builder->query("SELECT * FROM users Where `username` = \"$this->username\"");

        if($response) {
            if($response[0][2] === $this->password) {
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

    // 0 - не совпадают пароли
    // 1 - такой пользователь существует
    // 2 - ошибка при создании
    public function registration() {
        
    }
}

$user = new User($data["username"], $data["password"], $data["re-password"]);
$result = $user->authorization();
if($result) {
    echo "Мы вошли";
} else {
    echo "Неверный логин или пароль!";
}

// $result = $user->registration();

// if($result === 0) {
//     echo "не совподают пароли";
// } elseif($result === 1) {
//     echo "такой пользователь существует";
// } elseif($result === 2) {
//     echo "ошибка при создании"; 
// } elseif($result === true) {
//     echo "Зарегестрированы";
// }
?>