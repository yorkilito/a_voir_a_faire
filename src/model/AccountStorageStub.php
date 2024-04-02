<?php
require_once("AccountStorage.php");
class AccountStorageStub implements AccountStorage{
    private $accountTab;

    public function __construct(){
        $this->accountTab = array(
            'user1' => new Account('Pascal Vanier','vanier', password_hash('toto',PASSWORD_BCRYPT),'user'),
            'user2' => new Account('Jean-Marc LeCarpentier','lecarpentier', password_hash('toto',PASSWORD_BCRYPT),'user'),
            'admin' => new Account('Admin','admin', password_hash('toto',PASSWORD_BCRYPT),'admin'),
        );        
    }

    public function checkAuth($login, $password){
        foreach($this->accountTab as $key => $val){
            if($login == $val->getLogin() && password_verify($password, $val->getPassword())){
                return $val;
            }else{

            }
        }
        return null;
    }

    public function read($id){
        foreach($this->accountTab as $key => $val){
            if($key == $id){
                return $val;
            }elseif(!array_key_exists($id,$this->accountTab)){
                return null;
            } 
        }

    }

    public function readAll(){
        return $this->accountTab;

    }

    public function van(){
        return $this->accountTab["user1"];
    }

    public function register(Account $user){
        
    }


}

?>