<?php

//Datenbankzugriffe auf die Bestellungen
namespace kae\model;

class ModelOrders extends kae\core\Model
{
	const TABLENAME = '`orders`';
	protected $schema = [
	'id'			=>['type' => BaseModel::TYPE_INT],
  	'createdAt'		=>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'		=>['type' => BaseModel::TYPE_STRING],
  	'account_id'	=>['type' => BaseModel::TYPE_INT],
  	'shipingDate'	=>['type' => BaseModel::TYPE_STRING],
	];

}
