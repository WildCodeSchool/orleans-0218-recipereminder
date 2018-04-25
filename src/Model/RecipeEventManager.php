<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 25/04/18
 * Time: 16:08
 */

namespace Model;

class RecipeEventManager extends AbstractManager
{
    const TABLE = 'event_recipe';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
