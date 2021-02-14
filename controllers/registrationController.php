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
            $passRegex = "/^(?=.*?[A-Z].*?)(?=.*?[a-z].*?)(?=.*[0-9].*?).{8,}$/m";


            if($_POST['password'] == null || !preg_match($passRegex, $_POST['password']))
            {
                $errors['password'] = 'Passwort ist bullshit, min.8 Zeichen 1 Großbuchstabe, 1 Zahl.';
            }
            else if($_POST['password1'] == null || $_POST['password'] != $_POST['password1'])
            {
                $errors['password'] = 'Passwort stimmt nicht überein.';
            }

            $_POST['passwordHash'] = hash( 'md5' , $_POST['password1'] , false );

            $exists = Account::findOne('email = "'.$_POST['email'].'"');

            if(!empty($exists))
            {
                $errors['emailExists'] = 'E-Mail wird bereits verwendet';
            }

            $account = new Account($_POST);
            $address = new Address($_POST);
            $address->validate($errors);
            $account->validate($errors);

            pre_r($errors);


            if(count($errors) == 0 && false)
            {
                // TODO: save to database
                $sql = ' zipCode = "'.$address->zipCode.'" and city = "'.$address->city.'" and street = "'.$address->street.'" and strNo = "'.$address->strNo.'"';
                $temp = Address::findone($sql);
                if(!empty($temp))
                {
                    $address = new Address($temp);
                }
                else
                {
                    $address->insert($errors);
                }
                $account->address_id = $address->id;
                $account->insert($errors);
            }
        }

        // push to view ;)
        $this->setParam('errors', $errors);
        $this->setParam('success', $success);
	}
}
