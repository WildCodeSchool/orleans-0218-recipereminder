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

    public function selectAllThumb()
    {
        // prepared request
        $sql = "SELECT r.id,r.name,img,c.name as info
                FROM recipe as r
                LEFT JOIN category as c ON c.id = r.id";

        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);

        $statement->execute();

        return $statement->fetchAll();

    }
}
