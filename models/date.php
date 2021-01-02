<?php

//Datenbankzugriffe auf das Datum
namespace kae\model;

class ModelDate extends kae\core\Model
{
	const TABLENAME = '`date`';

	protected $schema = [
	'id'        =>['type' => BaseModel::TYPE_INT],
  	'createdAt' =>['type' => BaseModel::TYPE_STRING],
  	'updatetAt' =>['type' => BaseModel::TYPE_STRING],
  	'date'      =>['type' => BaseModel::TYPE_STRING],
	];
}
