<?php

namespace App\Classes;

class Corus {

    public static function getPhone($location = null) {
        if($location == 'norcross') {
            return 'You can reach our main office at 770-300-4700';
        } elseif($location == 'denver') {
            return 'You can reach our Denver office at 303-218-2602';
        } elseif($location == 'charlotte') {
            return 'You can reach our Charlotte office at 704-594-9870';
        } elseif ($location == 'raleigh') {
            return 'You can reach our Raleigh office at 919-875-8819';
        } else {
            return 'You can reach our main office at 770-300-4700';
        }
    }

}