<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */


$routes = [

  'Category' => [ // Controller
        ['list', '/admin/category', 'GET'], // action, url, method

   'Recipe' => [ // Controller
        ['listRecipe', '/recipe', 'GET'], // action, url, method
      
    ],

];
