<?php


namespace kae\controller;

class LoginController extends \kae\core\Controller
{
	protected $controller = null;
	protected $action = null;
	protected $currentUser = null;

	protected $params = [];

    public function actionLogin()
    {
        // store error message
        $errMsg = null;

        // retrieve inputs
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // check user send login field
        if(isset($_POST['submit']))
        {

            // TODO: Validate input first
            // TODO: Check login values with database accounts
            // TODO: Store useful variables into the session like account and also set loggedIn = true
            $db = $GLOBALS['db'];

            $login = \dwp\model\Login::findOne('username = '.$db->quote($username));

            if($login !== null && password_verify($password, $login->passwordHash))
            {
                echo "login success";
            }
            else
            {
                $errMsg = 'Nutzer oder Passwort nicht korrekt.';
            }

            // if there is no error reset mail
            if($errMsg === null)
            {
                $username = '';
            }

        }

        // set param email to prefill login input field
        $this->setParam('username', $username);
        $this->setParam('errMsg', $errMsg);
        $this->setParam('test', 'Hello World!');
    }
}
