<?php

namespace kae\controller;
use kae\model\ModelAddress as Address;
use kae\model\ModelAccount as Account;
use kae\model\ModelOrders as Orders;
use kae\model\ModelOrdersFull as OrdersFull;

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


            if(count($errors) == 0)
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

    public function actionProfil()
    {
        if(!$this->loggedIn())
        {
            $this->redirect('index.php?c=registration&a=login');
        }

        $orders = Orders::find('account_id = "'.$this->currentUser['id'].'"');
        foreach($orders as $key => $value)
        {
            $orders[$key] = OrdersFull::find('orders.id = "'.$value['id'].'"');
        }
        $this->setParam('orders',$orders);


        if(isset($_POST['submit']))
        {
            $errors = array();
            $address = new Address($this->currentUser);
            $account = new Account($this->currentUser);
            #pre_r($address);
            #pre_r($account);
            if($_POST['email'] != $this->currentUser['email'])
            {
                $exists = Account::findOne('email = "'.$_POST['email'].'"');

                if(!empty($exists))
                {
                    $errors['emailExists'] = 'E-Mail wird bereits verwendet';
                }
                else
                {

                    $account->email = $_POST['email'];
                    $account->validate($errors);
                    #pre_r($account);
                    if(count($errors) == 0)
                    {
                        $account = new Account($_POST);
                        $account->id = $this->currentUser['id'];
                        #pre_r($account);
                        $account->update($errors);
                    }
                    else
                    {

                        #pre_r($errors);
                    }
                }
            }
            if($_POST['city'] != $address->city || $_POST['street'] != $address->street || $_POST['strNo'] != $address->strNo || $_POST['zipCode'] != $address->zipCode)
            {
                $sql = ' zipCode = "'.$_POST['zipCode'].'" and city = "'.$_POST['city'].'" and street = "'.$_POST['street'].'" and strNo = "'.$_POST['strNo'].'"';
                $temp = Address::findone($sql);
                #pre_r($temp);
                if(!empty($temp))
                {
                    $address = new Address($temp);
                }
                else
                {
                    $address = new Address($_POST);
                    $address->validate($errors);
                    if(count($errors) == 0)
                    {
                        $address->insert($errors);
                    }
                }

                    $account->address_id = $address->id;
                    #pre_r($account);
                    $account->update($errors);
            }
            if(count($errors) == 0)
            {
                $_SESSION['loggedIn'] = true;
                $_SESSION['email'] = $account->email;
            }
            $this->setParam('errors', $errors);
        }
    }
}