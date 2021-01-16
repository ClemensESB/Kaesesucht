<?php

//Datenbankzugriffe auf die Preise
namespace kae\model;
use \kae\core\Model as BaseModel;
class ModelPrice extends \kae\core\Model
{
	const TABLENAME = '`price`';

	protected $schema = [
	'id'            =>['type' => BaseModel::TYPE_INT],
  	'createdAt'     =>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'     =>['type' => BaseModel::TYPE_STRING],
  	'pricePerUnit'  =>['type' => BaseModel::TYPE_FLOAT],
	];
}
