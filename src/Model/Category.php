<?php
/**
 * Created by PhpStorm.
 * User: wilder20
 * Date: 10/04/18
 * Time: 16:28
 */

namespace Model;

/**
 * Class Category
 * @package Model
 */
/**
 * Class Category
 * @package Model
 */
class Category
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $id;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
     * @throws \Exception
     */
    public function setName(string $name): void
    {
        if (empty($name)) {
            throw new \Exception('Le nom de la catégorie est vide');
        }
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
