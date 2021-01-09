<?php

/**
 * @author Kristof Friess <kristof.friess@fh-erfurt.de>
 * @copyright Since 2021 by Kristof Friess
 * @version 1.0.0
 */

namespace kae\controller;

class RegistrationController extends \kae\core\Controller
{

	public function actionSignup()
	{
        $errors = [];
        $success = false;

        // oh my good, we get data
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['email'] ?? null;

            if($username === null || mb_strlen($username) < 2)
            {
                $errors['username'] = 'Nutzername ist zu kurz, bitte mehr als 2 Zeichen.';
            }

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
                // TODO: save to database
                if( true ) // fake true because no db connected yet
                {
                    $success = true;
                }
            }
        }

        // push to view ;)
        $this->setParam('errors', $errors);
        $this->setParam('success', $success);
	}
}
