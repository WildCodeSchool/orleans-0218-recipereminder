<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 03/04/18
 * Time: 14:30
 */

namespace Model;

class EventManager extends AbstractManager
{
    const TABLE = 'event';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


    public function selectLastEvents()
    {
        $limit = 3;
        $sql = "SELECT id, name, date, img FROM event 
                ORDER BY date DESC LIMIT $limit;";

        return $this->pdoConnection->query($sql, \PDO::FETCH_ASSOC)->fetchAll();
    }

    /**
     * @param null $name
     * @param null $dateStart
     * @param null $dateEnd
     * @param int $page
     * @return array
     */
    public function selectEventLimit($name = null, $dateStart = null, $dateEnd = null, $page = 0,$limit=9)
    {

        $offset = $page * $limit;
        $sql = "SELECT e.id, e.name, e.img, e.date
                FROM event AS e
                 WHERE (e.name LIKE :name OR e.guest LIKE :name)";
        if (!empty($dateStart) && !empty($dateEnd)) {
            $sql .= " AND date BETWEEN :dateStart AND :dateEnd";
        }
        $sql.=" ORDER BY e.name LIMIT :offset , :limit";

        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('name', '%' . $name . '%', \PDO::PARAM_STR);
        if (!empty($dateStart) && !empty($dateEnd)) {
            $statement->bindValue('dateStart', $dateStart, \PDO::PARAM_STR);
            $statement->bindValue('dateEnd', $dateEnd, \PDO::PARAM_STR);
        }
        $statement->bindValue('offset', $offset, \PDO::PARAM_INT);
        $statement->bindValue('limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
  
    public function showLinkedRecipes(int $id)
    {
        $sql = "SELECT r.id, r.name, img, categoryId, book, url, comment, eventId, recipeId, ca.name as category 
                FROM recipe as r
                JOIN event_recipe as er ON r.id = er.recipeId
                JOIN category as ca ON r.categoryId = ca.id
                WHERE eventId = :id";
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}


