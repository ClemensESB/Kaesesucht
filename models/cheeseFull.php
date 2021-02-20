<?php

//Datenbankzugriffe auf die Produkte
namespace kae\model;
use \kae\core\Model as BaseModel;

class ModelCheeseFull extends \kae\core\Model
{
	const TABLENAME = 'cheese';

	protected $schema = [
	  'id'			      =>['type' => BaseModel::TYPE_INT],
  	'createdAt'		  =>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'		  =>['type' => BaseModel::TYPE_STRING],
  	'cheeseName'	  =>['type' => BaseModel::TYPE_STRING],
  	'sort_id'		    =>['type' => BaseModel::TYPE_INT],
  	'price_id'		  =>['type' => BaseModel::TYPE_INT],
  	'qtyInStock'	  =>['type' => BaseModel::TYPE_INT],
  	'descrip'		    =>['type' => BaseModel::TYPE_STRING],
  	'recipe'		    =>['type' => BaseModel::TYPE_STRING],
    'taste'         =>['type' => BaseModel::TYPE_STRING],
    'lactose'       =>['type' => BaseModel::TYPE_INT],
    'milkType'      =>['type' => BaseModel::TYPE_STRING],
    'rawMilk'       =>['type' => BaseModel::TYPE_INT],
    'pictureName'   =>['type' => BaseModel::TYPE_STRING],
    'sortName'      =>['type' => BaseModel::TYPE_STRING],
    'pricePerUnit'  =>['type' => BaseModel::TYPE_FLOAT],
	];

  private $quantity = 1;
  public function getQuantity(){
    return $this->quantity;
  }
  public function setQuantity($qty){
    $this->quantity= $qty;
  }


  public static function find($where = '')
    {
        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT cheese.id, cheese.createdAt, cheese.updatetAt, cheeseName, sort_id, price_id, qtyInStock, descrip, recipe, taste, lactose, milkType, rawMilk, pictureName, sortName, pricePerUnit FROM '.self::tablename().' JOIN sort ON cheese.sort_id = sort.id JOIN price ON cheese.price_id = price.id';

            if(!empty($where))
            {
                $sql .= ' WHERE cheese.'.$where.';';
            }

            $result = $db->query($sql)->fetchAll();
        }
        catch(\PDOException $e)
        {
            die('Select statement failed: '. $e->getMessage());
        }
       // echo($sql);
        //pre_r($result);
        return $result;
    }
    public static function findNProducts($where = '',$key)
    {
        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT cheese.id, cheese.createdAt, cheese.updatetAt, cheeseName, sort_id, price_id, qtyInStock, descrip, recipe, taste, lactose, milkType, rawMilk, pictureName, sortName, pricePerUnit FROM '.self::tablename().' JOIN sort ON cheese.sort_id = sort.id JOIN price ON cheese.price_id = price.id';

            if(!empty($where))
            {
                $sql .= ' WHERE cheese.'.$where.';';
            }
            $sql .= ' LIMIT '.$key.';';
            $result = $db->query($sql)->fetchAll();
        }
        catch(\PDOException $e)
        {
            die('Select statement failed: '. $e->getMessage());
        }
        // echo($sql);
        //pre_r($result);
        return $result;
    }
    public static function findNewProducts()
    {
        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT cheese.id, cheese.createdAt, cheese.updatetAt, cheeseName, sort_id, price_id, qtyInStock, descrip, recipe,
             taste, lactose, milkType, rawMilk, pictureName, sortName, pricePerUnit FROM '.self::tablename().' 
             JOIN sort ON cheese.sort_id = sort.id JOIN price ON cheese.price_id = price.id
             ORDER BY cheese.createdAt DESC LIMIT 3
             ';


            $result = $db->query($sql)->fetchAll();
        }
        catch(\PDOException $e)
        {
            die('Select statement failed: '. $e->getMessage());
        }
        // echo($sql);
        //pre_r($result);
        return $result;
    }
    public static function findOne($whereStr = '1')
    {
        $results = self::find($whereStr);

        if(count($results) > 0)
        {
            return $results[0];
        }

        return null;
    }
    public static function countEntries()
    {
        $db = $GLOBALS['db'];
        $total = null;

        try {
            $sql = ' SELECT COUNT(*) FROM ' . self::tablename() . ' ';
            $total = $db->query($sql)->fetchAll();
        }
        catch (\PDOException $e)
        {
            die('Select statement failed: ' . $e->getMessage());
        }
        return $total;
    }
    public static function nProducts($key)
    {
        $db = $GLOBALS['db'];
        $result = null;

        try {
            $sql = 'SELECT * FROM ' . self::tablename();

            $sql .= ' ORDER BY createdAt desc LIMIT ' . $key . ';';

            $result = $db->query($sql)->fetchAll();
        } catch (\PDOException $e) {
            die('Select statement failed: ' . $e->getMessage());
        }

        return $result;
    }

}
