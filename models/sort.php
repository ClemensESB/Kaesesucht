<?php

//Datenbankzugriffe auf die Sorten
namespace kae\model;

class ModelSorts extends kae\core\Model
{
	const TABELNAME = '`sort`';
	protected $schema = [
	'id'		=>['type' => BaseModel::TYPE_INT],
  	'createdAt'	=>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'	=>['type' => BaseModel::TYPE_STRING],
  	'sortName'	=>['type' => BaseModel::TYPE_STRING],
	];
}



