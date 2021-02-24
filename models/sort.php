<?php

//Datenbankzugriffe auf die Sorten
namespace kae\model;
use \kae\core\Model as BaseModel;


class ModelSort extends \kae\core\Model
{
	const TABLENAME = '`sort`';
	protected $schema = [
	'id'		=>['type' => BaseModel::TYPE_INT],
  	'createdAt'	=>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'	=>['type' => BaseModel::TYPE_STRING],
  	'sortName'	=>['type' => BaseModel::TYPE_STRING],
	];
}



