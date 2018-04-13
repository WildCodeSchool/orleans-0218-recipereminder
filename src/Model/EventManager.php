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


    public function selectLastsEvents()
    {
        $sql = "SELECT id, name, date, img FROM event 
                ORDER BY id DESC LIMIT 3;";

        return $this->pdoConnection->query($sql, \PDO::FETCH_ASSOC)->fetchAll();
    }

}
