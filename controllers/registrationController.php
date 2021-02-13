<?php

namespace kae\controller;
use kae\model\ModelAddress as Address;
use kae\model\ModelAccount as Account;

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
            $_POST['password'] = hash( 'md5' , $password , false );

            $account = new Account($_POST);

            if($email == null)
            {
                $errors['email'] = 'Bitte geben sie eine Email ein.';
            }

            if($password == null)
            {
                $errors['password'] = 'Bitte geben sie eine Passwort ein.';
            }

            else if($account->findone('email = "'.$email.'" and passwordHash = "'.$_POST['password'].'"') == null)
            {
                $errors['account'] = 'Anmelde Daten ungültig.';
            }


            // check errors?
            if(count($errors) == 0)
            {


                    //TODO Datenbankanbindung
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['email'] = $email;

            }

        // push to view ;)
        $this->setParam('errors', $errors);
        $this->setParam('success', $success);
        //pre_r($errors);
        //echo($_SESSION['email']);


        }
    }

    public function actionlogout()
    {
        session_destroy();
    }

    public function actionSignup()
	{
        $errors = [];
        $success = false;



        // oh my good, we get data
        if(isset($_POST['submit']))
        {
            #$_POST['password'] = password_hash(, PASSWORD_BCRYPT);
            #$_POST['password1'] = password_hash($_POST['password1'], PASSWORD_BCRYPT);


            /*
            $firstName = $_POST['firstName'] ?? null;
            $lastName = $_POST['lastName'] ?? null;
            $street = $_POST['street'] ?? null;
            $streetNo = $_POST['strNo'] ?? null;
            $zipCode = $_POST['zipCode'] ?? null;
            $city = $_POST['city'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $password1 = $_POST['password1'] ?? null;
            */


            if($_POST['firstName'] == null || mb_strlen($_POST['firstName']) < 1)
            {
                $errors['firstName'] = 'Vorname ist zu kurz, bitte mehr als 1 Zeichen.';
            }

            if($_POST['lastName'] == null || mb_strlen($_POST['lastName']) < 1)
            {
                $errors['lastName'] = 'Nachname ist zu kurz, bitte mehr als 1 Zeichen.';
            }

            if($_POST['street'] == null)    //todo prüfen auf format bei ff?
            {
                $errors['street'] = 'Bitte geben sie ihre Straße an';
            }

            if($_POST['strNo'] == null)
            {
                $errors['streetNo'] = 'Bitte geben sie ihre Straßennummer an';
            }

            if($_POST['zipCode'] == null)
            {
                $errors['zipCode'] = 'Bitte geben sie ihre PLZ an';
            }

            if($_POST['city'] == null)
            {
                $errors['city'] = 'Bitte geben sie ihren Ort an';
            }

            if($_POST['email'] == null || mb_strlen($_POST['email']) < 2)
            {
                $errors['email'] = 'E-Mail ist zu kurz, bitte mehr als 2 Zeichen.';
            }

            if($_POST['password'] == null || mb_strlen($_POST['password']) < 8)
            {
                $errors['password'] = 'Passwort ist zu kurz, bitte mehr als 8 Zeichen.';
            }
            else if($_POST['password1'] == null || $_POST['password'] != $_POST['password1'])
            {
                $errors['password'] = 'Passwort stimmt nicht überein.';
            }

            $_POST['passwordHash'] = hash( 'md5' , $_POST['password1'] , false );
            #pre_r($_POST);
            // check errors?
            if(count($errors) == 0)
            {
                // TODO: save to database
                $address = new Address($_POST);
                $account = new Account($_POST);

                $address->insert($errors);
                $account->__set('address_id',$address->__get('id'));
                pre_r($account);
                $account->insert($errors);
            }
        }
        #pre_r($errors);

        // push to view ;)
        $this->setParam('errors', $errors);
        $this->setParam('success', $success);
	}
}
