<?php

class Account {

    protected $name;
    protected $login;
    protected $pass;
    protected $status;

    public function __construct($n, $l, $p, $s) {
        
        $this->name = $n;
        $this->login = $l;
        $this->pass = $p;
        $this->status = $s;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function name(){
        return $this->name;
    }

}

?>