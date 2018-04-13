<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace Model;

/**
 *
 */
class RecipeManager extends AbstractManager
{
    const TABLE = 'recipe';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectAllRecipe()
    {
        $sql = "SELECT r.id,r.name,img,c.name as category
                FROM recipe as r
                LEFT JOIN category as c ON c.id = r.id";

        return $this->pdoConnection->query($sql, \PDO::FETCH_ASSOC)->fetchAll();
    }

    public function selectLastsRecipes()
    {
        $sql = "SELECT r.id, r.name, r.img, c.name AS category FROM recipe AS r 
                LEFT JOIN category AS c 
                ON r.categoryId = c.id 
                ORDER BY r.id DESC LIMIT 3;";

        return $this->pdoConnection->query($sql, \PDO::FETCH_ASSOC)->fetchAll();
    }


}
