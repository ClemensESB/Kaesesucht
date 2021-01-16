<?php

namespace kae\controller;

class RegistrationController extends \kae\core\Controller
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
                    session_start();
                    $_SESSION['email'] = $email;

        // push to view ;)
        $this->setParam('errors', $errors);
        $this->setParam('success', $success);
                }
            }
        }
    }
    
    public function actionlogout()
    {
        \session_destroy();
    }

    public function actionSignup()
	{
        $errors = [];
        $success = false;

        // oh my good, we get data
        if(isset($_POST['submit']))
        {
            $firstName = $_POST['firstName'] ?? null;
            $lastName = $_POST['lastName'] ?? null;
            $street = $_POST['street'] ?? null;
            $streetNo = $_POST['strNo'] ?? null;
            $zipCode = $_POST['zipCode'] ?? null;
            $city = $_POST['city'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $password1 = $_POST['password1'] ?? null;

            if($firstName === null || mb_strlen($firstName) < 1)
            {
                $errors['firstName'] = 'Vorname ist zu kurz, bitte mehr als 1 Zeichen.';
            }

            if($lastName === null || mb_strlen($lastName) < 1)
            {
                $errors['lastName'] = 'Nachname ist zu kurz, bitte mehr als 1 Zeichen.';
            }

            if($street === null)    //todo prüfen auf format bei ff?
            {
                $errors['street'] = 'Bitte geben sie ihre Straße an';
            }
            
            if($streetNo === null)
            {
                $errors['streetNo'] = 'Bitte geben sie ihre Straßennummer an';
            }
            
            if($zipCode === null)
            {
                $errors['zipCode'] = 'Bitte geben sie ihre PLZ an';
            }

            if($city === null)
            {
                $errors['city'] = 'Bitte geben sie ihren Ort an';
            }

            if($email === null || mb_strlen($email) < 2)
            {
                $errors['email'] = 'E-Mail ist zu kurz, bitte mehr als 2 Zeichen.';
            }

            if($password === null || mb_strlen($password) < 8)
            {
                $errors['password'] = 'Passwort ist zu kurz, bitte mehr als 8 Zeichen.';
            }
            else if($password === null || $password === $password1)
            {
                $errors['password'] = 'Passwort stimmt nicht überein.';
            }

            // check errors?
            if(count($errors) === 0)
            {
                // TODO: save to database
                if( true ) // fake true because no db connected yet
                {
                    $success = true;
                    //TODO:Login nach Signup
                }
            }
        }

        // push to view ;)
        $this->setParam('errors', $errors);
        $this->setParam('success', $success);
	}
}
