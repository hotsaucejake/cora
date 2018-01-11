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

    public static function getSocial($social = null) {
        if($social == 'facebook') {
            return 'You can find our Facebook page here: https://www.facebook.com/Corus360/';
        } elseif ($social == 'twitter') {
            return 'You can find our Twitter handle here: https://twitter.com/corus360';
        } elseif ($social == 'instagram') {
            return 'You can find our Instagram account here: https://www.instagram.com/corus360/';
        } elseif ($social == 'youtube') {
            return 'You can find our YouTube channel here: https://www.youtube.com/user/Corus360Videos';
        } elseif ($social == 'google+') {
            return 'You can find us on Google+ here: https://plus.google.com/101699694934043147244';
        } elseif ($social == 'linkedin') {
            return 'You can follow us on LinkedIn here: https://www.linkedin.com/company/corus360/';
        } else {
            return 'You can view our Social Stream here: http://corus360.com/newsroom/social-stream/';
        }
    }

}