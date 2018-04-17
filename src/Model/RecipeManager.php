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
                LEFT JOIN category as c ON c.id = r.categoryId";

        return $this->pdoConnection->query($sql, \PDO::FETCH_ASSOC)->fetchAll();
    }


    public function selectLastRecipes()
    {
        $sql = "SELECT r.id, r.name, r.img, c.name AS category FROM recipe AS r 
                LEFT JOIN category AS c 
                ON r.categoryId = c.id 
                ORDER BY r.id DESC LIMIT 3;";

        return $this->pdoConnection->query($sql, \PDO::FETCH_ASSOC)->fetchAll();
    }


    /**
     * Retrieves all information required for each recipe page
     * @param int $id
     * @return mixed
     */
    public function selectRecipesById(int $id)
    {
        $sql = "SELECT r.id, r.name, r.img, r.url, r.book, r.comment, c.name as category
                FROM recipe AS r
                 LEFT JOIN category AS c ON c.id = r.categoryId 
                 WHERE r.id=:id
                 ";
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function selectRecipesLikeName($name)
    {
        $sql="SELECT id FROM $this->table WHERE name LIKE :name";
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue(':name', '%'.$name.'%', \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
}
