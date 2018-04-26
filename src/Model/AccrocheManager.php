<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 26/04/18
 * Time: 16:24
 */

namespace Model;


class AccrocheManager extends AbstractManager
{
    const TABLE = 'accroche';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function changeAccroche(string $text)
    {
        $sql = "UPDATE accroche SET value = :accroche WHERE name= 'accroche' ";
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue(':accroche', $text);
        $statement->execute();

    }


}