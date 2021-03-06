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

    /**
     * @return array
     */
    public function selectAllRecipe()
    {
        $sql = "SELECT r.id,r.name,img,c.name as category
                FROM recipe as r
                LEFT JOIN category as c ON c.id = r.categoryId";

        return $this->pdoConnection->query($sql, \PDO::FETCH_ASSOC)->fetchAll();
    }


    public function selectLastRecipes()
    {
        $sql = "SELECT r.id, r.name, r.img, c.name AS category FROM recipe AS r 
                LEFT JOIN category AS c 
                ON r.categoryId = c.id 
                ORDER BY r.id DESC LIMIT 3;";

        return $this->pdoConnection->query($sql, \PDO::FETCH_ASSOC)->fetchAll();
    }


    /**
     * Retrieves all information required for each recipe page
     * @param int $id
     * @return mixed
     */
    public function selectRecipesById(int $id)
    {
        $sql = "SELECT r.id, r.name, r.img, r.url, r.book, r.comment,r.note, c.name as category
                FROM recipe AS r
                 LEFT JOIN category AS c ON c.id = r.categoryId 
                 WHERE r.id=:id
                 ";
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function selectRecipes($name = '', $categoryId = null)
    {
        $sql = "SELECT r.id, r.name, r.img, r.url, r.book, r.comment, c.name as category
                FROM recipe AS r
                 LEFT JOIN category AS c ON c.id = r.categoryId 
                 WHERE r.name LIKE :name ";

        if (!empty($categoryId)) {
            $sql .= "AND r.categoryId = :categoryId";
        }

        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('name', '%'.$name.'%', \PDO::PARAM_STR);
        if (!empty($categoryId)) {
            $statement->bindValue('categoryId', $categoryId, \PDO::PARAM_INT);
        }
        $statement->execute();

        return $statement->fetchAll();
    }

    public function selectRecipesLimit($name = null, $categoryId = null, $page = 0, $limit = 9)
    {
        $offset = $page * $limit;
        $sql = "SELECT r.id, r.name, r.img, r.url, r.book, r.comment, c.name as category
                FROM recipe AS r
                 LEFT JOIN category AS c ON c.id = r.categoryId
                 WHERE r.name LIKE :name ";

        if (!empty($categoryId)) {
            $sql .= "AND r.categoryId = :categoryId";
        }

        $sql .= " ORDER BY r.name LIMIT :offset , :limit";

        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('name', '%'.$name.'%', \PDO::PARAM_STR);
        if (!empty($categoryId)) {
            $statement->bindValue('categoryId', $categoryId, \PDO::PARAM_INT);
        }
        $statement->bindValue('offset', $offset, \PDO::PARAM_INT);
        $statement->bindValue('limit', $limit, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function updateNote(int $recipeId, int $note)
    {
        $sql = 'UPDATE recipe SET note = :note WHERE id = :id';
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue('note', $note, \PDO::PARAM_INT);
        $statement->bindValue('id', $recipeId, \PDO::PARAM_INT);
        $statement->execute();
    }

    public function showLinkedEvent(int $id)
    {
        $sql = "SELECT e.id, e.name, e.date, e.img, e.guest, e.comment, eventId, recipeId 
                FROM event as e
                JOIN event_recipe as er ON e.id = er.eventId
                WHERE recipeId = :id";
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function selectRecipeLikeName($name = null, $dateStart = null, $dateEnd = null)
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
     * @param int $categoryId
     * @return int
     */
    public function countRecipeInCategory(int $categoryId)
    {
        $sql = "SELECT COUNT(id) as nbRecipe FROM recipe WHERE categoryId = :categoryId";
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindValue('categoryId', $categoryId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
