<?php
/**
 * Created by PhpStorm.
 * User: wilder20
 * Date: 03/04/18
 * Time: 15:12
 */

namespace Model;

class CategoryManager extends AbstractManager
{
    const TABLE = 'category';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @param Category $category
     * @throws \Exception
     */
    public function addCategory(Category $category)
    {
            $sql = 'INSERT INTO category (name) VALUES (:name)';
            $statement = $this->pdoConnection->prepare($sql);
            $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
            $statement->bindValue(':name', $category->getName());
            $statement->execute();
    }
}
