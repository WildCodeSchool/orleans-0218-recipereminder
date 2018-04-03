<?php
/**
 * Created by PhpStorm.
 * User: wilder20
 * Date: 03/04/18
 * Time: 15:12
 */

namespace Model;


class CategoryManager extends AbstractManager
{
    const TABLE = 'category';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}