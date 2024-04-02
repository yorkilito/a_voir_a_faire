<?php

require_once("model/Account.php");
require_once("model/AccountStorage.php");


class AccountStorageMySQL implements AccountStorage {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function checkAuth($login, $pass) {
        if(!isset($_SESSION)) {
            session_start();
        }
        $req = "SELECT * FROM user WHERE login=?";
        $stmt = $this->db->prepare($req);
        $stmt->execute([$login]);
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($pass, $user['pass'])) {
                $_SESSION['user'] = $user;
                return new Account($user['userName'], $user['login'], $user['pass'], $user['status']);
            } else {
                return null;
            }
        }
        
    }

    public function register(Account $user) {
        $req = "SELECT * FROM user WHERE login=?";
        $stmt = $this->db->prepare($req);
        $stmt->execute([$user->login]);
        if ($stmt->rowCount() === 0) {
            $hashPassword = password_hash($user->pass, PASSWORD_DEFAULT);
            $req = "INSERT INTO user (`userName`, `login`, `pass`, `status`) VALUES (?,?,?,?)";
            $stmt = $this->db->prepare($req);
            $stmt->execute(array($user->name, $user->login, $hashPassword, $user->status));
            $lastId = $this->db->lastInsertId();
            return $lastId;
        }
        return null;
    }
}

?>