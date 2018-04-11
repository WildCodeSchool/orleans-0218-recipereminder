<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 * PHP version 7
 */

namespace Model;

/**
 * Class Item
 *
 */
class Recipe
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $img;
    /**
     * @var int
     */
    private $category_id;
    /**
     * @var string
     */
    private $ref_book;
    /**
     * @var string
     */
    private $ref_url;
    /**
     * @var string
     */
    private $comment;

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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        if (empty($name)) {
            throw new \Exception('Le champ nom ne doit pas etre vide !');
        }
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {

        $this->img = $img;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     */
    public function setCategoryId(int $category_id): void
    {
        if(empty($category_id)){
            throw new \Exception('Merci de choisir une catégorie!');
        }
        $this->category_id = $category_id;
    }

    /**
     * @return string
     */
    public function getRefBook(): string
    {
        return $this->ref_book;
    }

    /**
     * @param string $ref_book
     */
    public function setRefBook(string $ref_book): void
    {
        $this->ref_book = $ref_book;
    }

    /**
     * @return string
     */
    public function getRefUrl(): string
    {
        return $this->ref_url;
    }

    /**
     * @param string $ref_url
     */
    public function setRefUrl(string $ref_url): void
    {
        $this->ref_url = $ref_url;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        if(empty($comment)){
            throw new \Exception('Merci d\'ajouter un commentaire!');
        }
        $this->comment = $comment;
    }

}
