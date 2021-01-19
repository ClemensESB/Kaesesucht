<?php

//Datenbankzugriffe auf die Bestellungen
namespace kae\model;
use \kae\core\Model as BaseModel;
class ModelOrders extends \kae\core\Model
{
	const TABLENAME = '`orders`';
	protected $schema = [
	'id'			=>['type' => BaseModel::TYPE_INT],
  	'createdAt'		=>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'		=>['type' => BaseModel::TYPE_STRING],
  	'account_id'	=>['type' => BaseModel::TYPE_INT],
  	'payMethod' =>['type' => BaseModel::TYPE_STRING],
	];

}
