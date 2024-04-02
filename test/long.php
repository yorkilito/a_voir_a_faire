<?php


        function getGeoCode($address)
        {
        $address = str_replace(' ', '+', $address);
        // geocoding api url
        $key = "AIzaSyDBe9xj_EUjCRfGeOYcFQtiIuaEnT8Ukhw";
        $key = urlencode($key);
        $url = "https://maps.google.com/maps/api/geocode/json?address=$address&key=$key";
        // send api request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        $data['lat'] = $json->results[0]->geometry->location->lat;
        $data['lng'] = $json->results[0]->geometry->location->lng;
        $val = "Latitude:".$data['lat'].","."Longitude:".$data['lng']."\n";
        return $val;
        }
        
        echo getGeoCode("1 Impasse des Marroniers, 14540, France");

?>
