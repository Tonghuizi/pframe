<?php
class AUser
{
	public function isGuest()
    {
        if($_SESSION['is_valid'] === 1)
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
}