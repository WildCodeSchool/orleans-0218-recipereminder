<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 26/04/18
 * Time: 10:07
 */

namespace Model;


class EventRecipe
{
    /**
     * @var int
     */
    private $recipeId;

    /**
     * @var int
     */
    private $eventId;

    /**
     * @return int
     */
    public function getRecipeId(): int
    {
        return $this->recipeId;
    }

    /**
     * @param int $recipeId
     */
    public function setRecipeId(int $recipeId): void
    {
        $this->recipeId = $recipeId;
    }

    /**
     * @return int
     */
    public function getEventId(): int
    {
        return $this->eventId;
    }

    /**
     * @param int $eventId
     */
    public function setEventId(int $eventId): void
    {
        $this->eventId = $eventId;
    }

}
