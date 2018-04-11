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
    'Event' => [
        ['listEvent', '/event', 'GET'],
      ],
    'Homepage' => [
        ['index', '/', 'GET'],
    ],
    'Recipe' => [ // Controller
        ['listRecipe', '/recipe', 'GET'], // action, url, method
    ],
];
