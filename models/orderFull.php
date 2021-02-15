<?php

//Datenbankzugriffe auf die Bestellungen
namespace kae\model;
use \kae\core\Model as BaseModel;
class ModelOrdersFull extends \kae\core\Model
{
	const TABLENAME = '`orders`';
	protected $schema = [
		'orderId'			=>['type' => BaseModel::TYPE_INT],
		'orderDate'		=>['type' => BaseModel::TYPE_STRING],
		'account'	=>['type' => BaseModel::TYPE_INT],
		'payMethod' =>['type' => BaseModel::TYPE_STRING],
		'cheeseName'=>['type' => BaseModel::TYPE_STRING],
		'quantity'    =>['type' => BaseModel::TYPE_INT],
		'price' =>['type' => BaseModel::TYPE_STRING],
		'pictureName' =>['type' => BaseModel::TYPE_STRING]
	];


	public static function find($where = '')
    {
        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT orders.id as orderId, orders.createdAt as orderDate,orders.account_id as account,orders.payMethod as payMethod,cheese.cheeseName as cheeseName,orderedItems.quantity as quantity,orderedItems.actualPrice as price,cheese.pictureName as pictureName
				FROM orders 
				JOIN orderedItems ON orders.id = orderedItems.orders_id
				JOIN account ON orders.account_id = account.id
				JOIN cheese ON ordereditems.cheese_id = cheese.id';

            if(!empty($where))
            {
                $sql .= ' WHERE '.$where.';'; 
            }
            $result = $db->query($sql)->fetchAll();
        }
        catch(\PDOException $e)
        {
            die('Select statement failed: '. $e->getMessage());
        }

        return $result;
    }
    public static function findOne($where = '1')
    {
       $results = self::find($where);
       if(count($results) > 0)
        {
            return $results[0];
        }
        return null;
    }

}