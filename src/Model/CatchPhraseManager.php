<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 26/04/18
 * Time: 16:24
 */

namespace Model;

class catchPhraseManager extends AbstractManager
{
    const TABLE = 'catchPhrase';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function changeCatchPhrase(string $text)
    {
        $sql = "UPDATE catchPhrase SET value = :catchPhrase WHERE name= 'catchPhrase' ";
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue(':catchPhrase', $text);
        $statement->execute();
    }

    public function selectCatchPhrase():string
    {
        $sql = "SELECT value FROM catchPhrase WHERE name='catchPhrase'";
        $catchPhrase = $this->pdoConnection->query($sql, \PDO::FETCH_CLASS, $this->className)->fetch();
        return $catchPhrase->getValue();
    }
}
