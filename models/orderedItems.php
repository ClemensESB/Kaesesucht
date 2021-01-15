<?php

//Datenbankzugriffe auf bestellte Produkte
namespace kae\model;
use \kae\core\Model as BaseModel;
class ModelOrderedItems extends \kae\core\Model
{
	const TABLENAME = '`orderedItems`';

	protected $schema = [
	'id'          =>['type' => BaseModel::TYPE_INT],
  'createdAt'   =>['type' => BaseModel::TYPE_STRING],
  'updatetAt'   =>['type' => BaseModel::TYPE_STRING],
  'cheese_id'   =>['type' => BaseModel::TYPE_INT],
  'quantity'    =>['type' => BaseModel::TYPE_INT],
  'actualPrice' =>['type' => BaseModel::TYPE_STRING],
  'orders_id'   =>['type' => BaseModel::TYPE_INT],
	];
}
