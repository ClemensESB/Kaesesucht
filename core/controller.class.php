<?php


//der Grundlegende Controller von dem die Controller erben

namespace kae\core;


class Controller
{
	protected $controller = null;
	protected $action = null;
	protected $currentUser = null;

	protected $params = [];

	public function __construct($controller,$action)
	{
		$this->controller = $controller;
		$this->action = $action;

		if($this->loggedIn())
		{
			// TODO: Load the current user using the session and the account model
			// 		 write user model object to member variable currentUser


		}
	}

	public function loggedIn()
	{
		return ( isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true);
	}

	public function render()
	{
		// generate the view path
		$viewPath = VIEWSPATH.$this->controller.DIRECTORY_SEPARATOR.$this->action.'.php';

		// check the file exists
		if(!file_exists($viewPath))
		{
			// redirect to error page 404 because not found
			redirect('index.php?c=errors&a=error404&error=viewpath');
			exit(0);
		}

		// extract the params array to get all needed variables for the view
		extract($this->params);
		
		// just include the view here, it's like putting the code of the php file by copy paste on this position.
		include $viewPath;
	}

	/**
	 * Setter for params, which will be used for the render method
	 * @param  String $key   Key in the param array
	 * @param  Mixed  $value Key value
	 */
	public function setParam($key, $value = null)
	{
		$this->params[$key] = $value;
	}

	public function redirect($url)
	{
		header('Location: '.$url);
        exit(0);
	}

	public function __destruct()
	{
		$this->controller = null;
		$this->action = null;
		$this->params = null;
	}

}