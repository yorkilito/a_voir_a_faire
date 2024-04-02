<?php

require_once("model/Account.php");

class AccountBuilder {

    public $data;
    public $error;

    const NAME_REF = "name";
    const LOGIN_REF = "login";
    const PASS_REF = "pass";
    const STATUS_REF = "status";


    public function __construct($data=null) {
        if ($data === null) {
            $data = array(
                self::NAME_REF => "",
                self::LOGIN_REF => "",
                self::PASS_REF => "",
                self::STATUS_REF => "",
            );
        }
        $this->data = $data;
        $this->error = array();
    }

    public function getData($ref) {
		return key_exists($ref, $this->data)? $this->data[$ref]: '';
	}

    public function getError($ref) {
		return key_exists($ref, $this->error)? $this->error[$ref]: null;
	}

    public function registerUser() {
        if (!key_exists(self::NAME_REF, $this->data) 
        || !key_exists(self::LOGIN_REF, $this->data) 
        || !key_exists(self::PASS_REF, $this->data))
            throw new Exception("Un des éléments a été oublié pour l'inscription");
        if (!key_exists(self::STATUS_REF, $this->data))
            $this->data[self::STATUS_REF] = "user";
        return new Account($this->data[self::NAME_REF], $this->data[self::LOGIN_REF], 
        $this->data[self::PASS_REF], $this->data[self::STATUS_REF]);
    }

    public function isValid() {
        $this->error = array();

        if (!key_exists(self::NAME_REF, $this->data) || $this->data[self::NAME_REF] === "")
            $this->error[self::NAME_REF] = "Entrez votre nom";
        else if (mb_strlen($this->data[self::NAME_REF], 'UTF-8') >= 30)
            $this->error[self::NAME_REF] = "Le nom doit faire moins de 30 caractères";
        if (!key_exists(self::LOGIN_REF, $this->data) || $this->data[self::LOGIN_REF] === "")
            $this->error[self::LOGIN_REF] = "Entrez un nom d'utilisateur";
        else if (mb_strlen($this->data[self::NAME_REF], 'UTF-8') >= 30)
            $this->error[self::LOGIN_REF] = "Le nom d'utilisateur doit faire moins de 30 caractères";
        if (!key_exists(self::PASS_REF, $this->data) || $this->data[self::PASS_REF] === "")
            $this->error[self::PASS_REF] = "Entrez un mot de passe";
        return count($this->error) === 0;
    }

    public static function buildFromSpecie(Account $spe) {
        return new AccountBuilder(array(
            self::NAME_REF => $spe->name,
            self::LOGIN_REF => $spe->login,
            self::pass_REF => $spe->pass,
            self::STATUS_REF => $spe->status,
        ));
    }
}

?>