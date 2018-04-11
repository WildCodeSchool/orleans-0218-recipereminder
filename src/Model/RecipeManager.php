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

    /**
     * @return array
     */
    public function selectAllRecipe()
    {
        $sql = "SELECT r.id,r.name,img,c.name as category
                FROM recipe as r
                LEFT JOIN category as c ON c.id = r.id";

        return $this->pdoConnection->query($sql, \PDO::FETCH_ASSOC)->fetchAll();
    }

    /**
     * Retrieves all information required for each recipe page
     * @param int $id
     * @return mixed
     */
    public function selectOneRecipe(int $id)
    {
        $statement = $this->pdoConnection->prepare("SELECT r.id, r.name, r.img, r.url, r.book, r.comment, c.name as category
                FROM recipe AS r
                 JOIN category AS c ON c.id = r.categoryId WHERE r.id=:id");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();


    }
}

