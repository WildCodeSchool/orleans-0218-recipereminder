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

    /**
     * @return array
     */
    public function listAllEvents() : array
    {
        $statement = $this->pdoConnection->prepare('SELECT id, name, img, date as info FROM event');
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->execute();

        return $statement->fetchAll();
    }
}
