<?php

namespace kae\controller;

class LoginController extends \kae\core\Controller
{

	public function actionlogin()
	{
        $errors = [];
        $success = false;

        // oh my good, we get data
        if(isset($_POST['submit']))
        {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if($email === null || mb_strlen($email) < 2)
            {
                $errors['email'] = 'E-Mail ist zu kurz, bitte mehr als 2 Zeichen.';
            }

            if($password === null || mb_strlen($password) < 8)
            {
                $errors['password'] = 'Passwort ist zu kurz, bitte mehr als 8 Zeichen.';
            }

            // check errors?
            if(count($errors) === 0)
            {
                
                if( true )
                {
                    //TODO Datenbankanbindung
                    $success = true;
                    $_SESSION['email'->$email];
                }
            }
        }

        // push to view ;)
        $this->setParam('errors', $errors);
        $this->setParam('success', $success);
	}
}
