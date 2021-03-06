<?php
class Credits {
    public $credits;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['wat'])) {
            $_SESSION['wat'] = 'wat';
            setcookie('credits', '', time() - 3600, '/');
            $this->credits = 100;
        } else {
            $this->credits = $_COOKIE['credits'];
        }
    }

    public function getCount() {
        if (!isset($_COOKIE['credits'])) {
            setcookie('credits', '100', 0, '/');
            $this->credits = 100;
        }
        return $this->credits;
    }

    public function pay($cost) {
        if ($cost > $this->credits) {
            return false;
        } else {
            setcookie('credits', $this->credits - $cost, 0, '/');
            $this->credits = $this->credits - $cost;
            return true;
        }
    }

}
?>