<?php

//Datenbankzugriffe auf die Adressen
namespace kae\model;
use \kae\core\Model as BaseModel;
class ModelAddress extends \kae\core\Model
{
	const TABLENAME = '`address`';

	protected $schema = [
  	'id'        =>['type' => BaseModel::TYPE_INT],
  	'createdAt' =>['type' => BaseModel::TYPE_STRING],
  	'updatetAt' =>['type' => BaseModel::TYPE_STRING],
  	'zipCode'   =>['type' => BaseModel::TYPE_STRING],
  	'city'      =>['type' => BaseModel::TYPE_STRING],
  	'strNo'     =>['type' => BaseModel::TYPE_STRING],
	];
}
