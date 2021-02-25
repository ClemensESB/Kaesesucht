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
                $_SESSION['loggedIn'] = true;
                $_SESSION['email'] = $email;
                $this->redirect('index.php?c=pages&a=shop&p=1');
            }

        $this->setParam('errors', $errors);
        $this->setParam('success', $success);
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
        if(isset($_POST['submit']))
        {
            $passRegex = "/^(?=.*?[A-Z].*?)(?=.*?[a-z].*?)(?=.*[0-9].*?).{8,}$/m";


            if($_POST['password'] == null || !preg_match($passRegex, $_POST['password']))
            {
                $errors['password'] = 'Passwort ist ungültig, min.8 Zeichen 1 Großbuchstabe, 1 Zahl.';
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



            foreach ($errors as $key => $value) 
            {
                if(is_array($value))
                {
                    foreach ($value as $key => $object) 
                    {
                        $errors[$key] = $object;
                    }   
                }
            }
            //array_walk_recursive($errors, function($a) use (&$return) { $return[] = $a; });
            //pre_r($errors);
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
        $this->setParam('errors', $errors);
        $this->setParam('success', $success);
	}

    public function actionProfil()
    {
        if(!$this->loggedIn())
        {
            $this->redirect('index.php?c=registration&a=login');
        }
        if(isset($_GET['json']) && $_GET['json'] == 'true')
        {
           $userInputData = $GLOBALS['data']['data'];
        }
        else
        {
            $userInputData = $_POST;
        }

        $orders = Orders::find('account_id = "'.$this->currentUser['id'].'"');
        foreach($orders as $key => $value)
        {
            $orders[$key] = OrdersFull::find('orders.id = "'.$value['id'].'"');
        }
        $this->setParam('orders',$orders);

        
        if(isset($_POST['submit']) || $GLOBALS['isJSON'])
        {
            $errors = array();
            $address = new Address($this->currentUser);
            $account = new Account($this->currentUser);

            if($userInputData['email'] != $this->currentUser['email'] || $userInputData['email'] != $this->currentUser['email'])
            {
                $exists = Account::findOne('email = "'.$userInputData['email'].'"');

                if(!empty($exists))
                {
                    $errors['emailExists'] = 'E-Mail wird bereits verwendet';
                }
                else
                {
                    $account->email = $userInputData['email'];
                    $account->validate($errors);
                    if(count($errors) == 0)
                    {
                        $account = new Account($userInputData);
                        $account->id = $this->currentUser['id'];
                        $account->update($errors);
                    }
                }
            }
            if($userInputData['city'] != $address->city || $userInputData['street'] != $address->street || $userInputData['strNo'] != $address->strNo || $userInputData['zipCode'] != $address->zipCode)
            {
                $sql = ' zipCode = "'.$userInputData['zipCode'].'" and city = "'.$userInputData['city'].'" and street = "'.$userInputData['street'].'" and strNo = "'.$userInputData['strNo'].'"';
                $temp = Address::findone($sql);
                if(!empty($temp))
                {
                    $address = new Address($temp);
                }
                else
                {
                    $address = new Address($userInputData);
                    $address->validate($errors);
                    if(count($errors) == 0)
                    {
                        $address->insert($errors);
                    }
                }

                    $account->address_id = $address->id;
                    $account->update($errors);
            }
            if(count($errors) == 0)
            {
                $_SESSION['loggedIn'] = true;
                $_SESSION['email'] = $account->email;
            }
            $this->setParam('errors', $errors);
        }

        if($GLOBALS['isJSON'])
        {
           //pre_r($errors);
            exit();
        }
    }
}