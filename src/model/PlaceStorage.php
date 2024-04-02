<?php

    interface PlaceStorage{
        public function read($id);
        public function readAll();
        public function create(Place $pl);
        public function delete($id);
        public function update($id, Place $pl);
    }

?>