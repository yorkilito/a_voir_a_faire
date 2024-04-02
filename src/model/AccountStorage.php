<?php

    interface AccountStorage {
        public function checkAuth($login, $pass);
        public function register(Account $user);
    }

?>