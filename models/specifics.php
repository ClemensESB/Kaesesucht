<?php

//Datenbankzugriffe auf die Besonderheiten
namespace kae\model;

class ModelSpecifics extends kae\core\Model
{
	const TABLENAME = '`specifics`';

	protected $schema = [
    'id' 		     =>['type' => BaseModel::TYPE_INT],
  	'createdAt'  =>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'  =>['type' => BaseModel::TYPE_STRING],
  	'taste' 	   =>['type' => BaseModel::TYPE_STRING],
  	'lactose' 	 =>['type' => BaseModel::TYPE_INT],
  	'milkType' 	 =>['type' => BaseModel::TYPE_STRING],
  	'rawMilk' 	 =>['type' => BaseModel::TYPE_INT],
	];
}
