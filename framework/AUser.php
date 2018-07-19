<?php
class AUser
{
	public function isGuest()
    {
        if(isset($_SESSION['is_valid'])  && $_SESSION['is_valid'] === 1)
        {
            return false;
        }
        return true;
    }

    public function changeIdentity($info)
    {
        $_SESSION = $info;
        $_SESSION['is_valid'] = 1;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
//        unset($_SESSION);
    }
}