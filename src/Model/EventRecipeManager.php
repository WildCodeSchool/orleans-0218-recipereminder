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
     * Test returning true is a recipe is already linked to one event
     * @param $recipeId
     * @param $eventId
     * @return bool
     */
    public function testNoLink($recipeId, $eventId): bool
    {
        // prepared request
        $statement = $this->pdoConnection->prepare(
            "SELECT COUNT(recipeId) FROM $this->table WHERE recipeId= :recipeId AND eventId=:eventId"
        );
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('recipeId', $recipeId, \PDO::PARAM_INT);
        $statement->bindValue('eventId', $eventId, \PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch();

        return $result[0] == 0;
    }

    /**
     * Return all the recipes corresponding to the searched name ($name) and not already linked to one event ($eventId)
     * @param $name
     * @param null $categoryId
     * @param $eventId
     * @return array
     */
    public function selectNotLinkedRecipes($eventId, $name = null, $categoryId = null, $limit = 5): array
    {

        $sql = "SELECT DISTINCT r.id, r.name, r.img, r.url, r.book, r.comment, c.name as category
                 FROM recipe AS r
                  LEFT JOIN category AS c ON c.id = r.categoryId
                   LEFT JOIN event_recipe AS er ON er.recipeId =r.id  
                    WHERE r.name LIKE :name AND r.id NOT IN (SELECT recipeId FROM event_recipe WHERE eventId = :eventId)";

        if (!empty($categoryId)) {
            $sql .= " AND r.categoryId = :categoryId";
        }
        $sql .= " ORDER BY r.id DESC LIMIT $limit";

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

    public function unlink($eventId, $recipeId)
    {
        $sql = "DELETE FROM $this->table WHERE eventId=:eventId AND recipeId=:recipeId";
        $exec = $this->pdoConnection->prepare($sql);
        $exec->bindValue('eventId', $eventId, \PDO::PARAM_INT);
        $exec->bindValue('recipeId', $recipeId, \PDO::PARAM_INT);
        $exec->execute();
    }
}
