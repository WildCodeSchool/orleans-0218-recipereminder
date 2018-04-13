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

    'Homepage' => [
        ['index', '/', 'GET'],
    ],

    'Category' => [ // Controller
        ['list', '/admin/category', ['GET', 'POST']], // action, url, method
    ],

    'Event' => [
        ['listEvent', '/event', 'GET'],
        ['adminListEvent', '/admin/eventList', 'GET'], // action, url, method
        ['addEvent', '/admin/addEvent', ['GET', 'POST']],
      ],

    'Recipe' => [ // Controller
        ['listRecipe', '/recipe', 'GET'], // action, url, method      
        ['showRecipe', '/recipe/{id:\d+}', 'GET'],
        ['addRecipe', '/admin/addRecipe', ['GET', 'POST']],
        ['adminlistRecipe', '/admin/recipeList', 'GET'], // action, url, method

    ],

];
