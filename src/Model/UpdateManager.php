<?php
/**
 * Created by PhpStorm.
 * User: wilder18
 * Date: 12/04/18
 * Time: 22:45
 */

namespace Model;

class UpdateManager extends AbstractManager

{

    public function update(int $id, array $post)
    {
            var_dump($_POST);
            $query = "UPDATE event SET name=:name, img=:img, guest=:guest, comment=:comment, date=:date WHERE id=:id";
            $statement = $this->pdoConnection->prepare($query);
            $statement->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);
            $statement->bindValue(':name', $_POST['name'], \PDO::PARAM_STR);
            $statement->bindValue(':img', $_POST['img'], \PDO::PARAM_STR);
            $statement->bindValue(':guest', $_POST['guest'], \PDO::PARAM_STR);
            $statement->bindValue(':comment', $_POST['comment'], \PDO::PARAM_STR);
            $statement->bindValue(':date', $_POST['date'], \PDO::PARAM_STR);


        $statement->execute();

    }

}
