<?php

namespace App\Classes;

class Corus {

    public static function getPhone($location = null) {
        if($location == 'norcross') {
            return 'You can reach our main office at 770-300-4700.  You can also view all of our contact information here: http://corus360.com/company/contact/';
        } elseif($location == 'denver') {
            return 'You can reach our Denver office at 303-218-2602.  You can also view all of our contact information here: http://corus360.com/company/contact/';
        } elseif($location == 'charlotte') {
            return 'You can reach our Charlotte office at 704-594-9870.  You can also view all of our contact information here: http://corus360.com/company/contact/';
        } elseif ($location == 'raleigh') {
            return 'You can reach our Raleigh office at 919-875-8819.  You can also view all of our contact information here: http://corus360.com/company/contact/';
        } else {
            return 'You can reach our main office at 770-300-4700.  You can also view all of our contact information here: http://corus360.com/company/contact/';
        }
    }

}