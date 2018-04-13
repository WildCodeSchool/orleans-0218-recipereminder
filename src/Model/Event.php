<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 10/04/18
 * Time: 15:27
 */

namespace Model;

class Event
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
    private $date;

    /**
     * @var string
     */
    private $img;

    /**
     * @var string
     */
    private $guest;

    /**
     * @var string
     */
    private $comment;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Event
     */
    public function setId($id): Event
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return Event
     */
    public function setName($name): Event
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDate() : string
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     *
     * @return Event
     */
    public function setDate($date): Event
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getImg() : String
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     *
     * @return Event
     */
    public function setImg($img): Event
    {
        $this->img = $img;

        return $this;
    }

    /**
     * @return string
     */
    public function getGuest() : string
    {
        return $this->guest;
    }

    /**
     * @param mixed $guest
     *
     * @return Event
     */
    public function setGuest($guest): Event
    {
        $this->guest = $guest;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment() : string
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     *
     * @return Event
     */
    public function setComment($comment): Event
    {
        $this->comment = $comment;

        return $this;
    }
}
