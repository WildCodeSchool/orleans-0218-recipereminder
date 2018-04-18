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
     * @return array
     */

    public function selectEventLikeName($name)
    {
        $sql = "SELECT e.id, e.name, e.img, e.date
                FROM event AS e
                 WHERE e.name LIKE :name";
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('name', '%'.$name.'%', \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
}
