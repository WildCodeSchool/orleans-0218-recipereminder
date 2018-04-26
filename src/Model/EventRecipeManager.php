<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 25/04/18
 * Time: 16:08
 */

namespace Model;

class EventRecipeManager extends AbstractManager
{
    const TABLE = 'event_recipe';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @param int $eventId
     * @return mixed
     */
    public function selectRecipesLinkedToOneEvent(int $eventId)
    {
        // prepared request
        $statement = $this->pdoConnection->prepare("SELECT recipeId FROM $this->table WHERE eventId=:eventId");
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('eventId', $eventId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function selectNotLinkedRecipes($name, $categoryId=null, $eventId)
    {

        $sql = "SELECT r.id, r.name, r.img, r.url, r.book, r.comment, c.name as category
                FROM recipe AS r
                 LEFT JOIN category AS c ON c.id = r.categoryId
                  LEFT JOIN event_recipe AS er ON er.recipeId =r.id  
                  WHERE r.name LIKE :name AND r.id NOT IN (SELECT recipeId FROM event_recipe WHERE eventId = :eventId)";

        if (!empty($categoryId)) {
            $sql .= "AND r.categoryId = :categoryId";
        }

        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('name', '%'.$name.'%', \PDO::PARAM_STR);
        $statement->bindValue('eventId', $eventId, \PDO::PARAM_INT);
        if (!empty($categoryId)) {
            $statement->bindValue('categoryId', $categoryId, \PDO::PARAM_INT);
        }
        $statement->execute();

        return $statement->fetchAll();
    }

    public function selectNotLinkedLastRecipes($eventId)
    {
        $sql = "SELECT r.id, r.name, r.img, c.name AS category FROM recipe AS r 
                LEFT JOIN category AS c ON r.categoryId = c.id
                LEFT JOIN event_recipe AS er ON r.id = er.recipeId
                WHERE r.id NOT IN (SELECT recipeId FROM event_recipe WHERE eventId = :eventId)  
                ORDER BY r.id DESC LIMIT 5;";

        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindValue(':eventId', $eventId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}
