<?php


namespace kae\controller;

class ShoppingController extends \kae\core\Controller
{
	protected $controller = null;
	protected $action = null;
	protected $currentUser = null;

	protected $params = [];

	public function actionCheckout()
	{

	}
	public function actionShoppingCart()
	{
		
		if(isset($_SESSION['cart']))
		{
			$cart = $_SESSION['cart']; //TODO: wie werden die Items gespeichert cookie? session?
		}
		else
		{
			$cart = null;
		}
		
	}

}