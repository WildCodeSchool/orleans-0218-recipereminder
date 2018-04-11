<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace Model;

/**
 *
 */
class RecipeManager extends AbstractManager
{
    const TABLE = 'recipe';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectAllRecipe()
    {
        $sql = "SELECT r.id,r.name,img,c.name as category
                FROM recipe as r
                LEFT JOIN category as c ON c.id = r.id";

        return $this->pdoConnection->query($sql, \PDO::FETCH_ASSOC)->fetchAll();
    }
    public function addRecipe()
    {
            $statement = "INSERT INTO recipe (name,img,category_id,ref_book,ref_url,comment) 
                          VALUES (:name,:img,:category_id,:ref_book,:ref_url,:comment)";
            $stm = $this->pdoConnection->prepare($statement);
            $stm->bindValue(':name', $_POST['name'], \PDO::PARAM_INT);
            $stm->bindValue(':img', $_POST['img'], \PDO::PARAM_INT);
            $stm->bindValue(':category_id', $_POST['category_id'], \PDO::PARAM_INT);
            $stm->bindValue(':ref_book', $_POST['ref_book'], \PDO::PARAM_INT);
            $stm->bindValue(':ref_url', $_POST['ref_url'], \PDO::PARAM_INT);
            $stm->bindValue(':comment', $_POST['comment'], \PDO::PARAM_INT);
            $stm->execute();
    }
}
