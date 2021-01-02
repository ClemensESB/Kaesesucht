<?php


//der Grundlegende Controller von dem die Controller erben

namespace kae\core;

use \kae\model\accounts;

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
	public function __destruct()
	{
		$this->controller = null;
		$this->action = null;
		$this->params = null;
	}

}