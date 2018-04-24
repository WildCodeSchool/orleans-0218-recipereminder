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

    public function selectEventLikeName($name = null, $dateStart = null, $dateEnd = null)
    {

        $sql = "SELECT e.id, e.name, e.img, e.date
                FROM event AS e
                 WHERE (e.name LIKE :name OR e.guest LIKE :name)";
        if (!empty($dateStart) && !empty($dateEnd)) {
            $sql .= " AND date BETWEEN :dateStart AND :dateEnd";
        }

        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('name', '%'.$name.'%', \PDO::PARAM_STR);
        if (!empty($dateStart) && !empty($dateEnd)) {

            $statement->bindValue('dateStart', $dateStart, \PDO::PARAM_STR);
            $statement->bindValue('dateEnd', $dateEnd, \PDO::PARAM_STR);
        }
        $statement->execute();

        return $statement->fetchAll();
    }
    /**
     * @param int $id
     * @param array $data
     */
    public function update(int $id, array $data)
    {
        if (!isset($data['img'])){
            $query = "UPDATE event SET name=:name, guest=:guest, comment=:comment, date=:date WHERE id=:id";
        }
        else{
            $query = "UPDATE event SET name=:name, img=:img, guest=:guest, comment=:comment, date=:date WHERE id=:id";
        }

        $statement = $this->pdoConnection->prepare($query);
        $statement->bindValue(':id', $data['id'], \PDO::PARAM_INT);
        $statement->bindValue(':name', $data['name'], \PDO::PARAM_STR);
        if (isset($data['img'])) {
            $statement->bindValue(':img', $data['img'], \PDO::PARAM_STR);
        }
        $statement->bindValue(':guest', $data['guest'], \PDO::PARAM_STR);
        $statement->bindValue(':comment', $data['comment'], \PDO::PARAM_STR);
        $statement->bindValue(':date', $data['date'], \PDO::PARAM_STR);


        $statement->execute();
    }


}
