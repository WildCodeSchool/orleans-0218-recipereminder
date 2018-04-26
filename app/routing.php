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
        ['adminIndex', '/admin/', 'GET'],

    ],

    'Mentions' => [
        ['mentionsLegales', '/mentions', 'GET'],

    ],

    'Category' => [ // Controller
        ['list', '/admin/category', ['GET', 'POST']], // action, url, method
        ['delete', '/admin/category/delete','POST'], // action, url, method
    ],

    'Event' => [
        ['listEvent', '/event', 'GET'],
        ['showEvent', '/event/{id:\d+}', 'GET'],
        ['showAdminEvent', '/admin/event/{id: \d+}', 'GET'],
        ['adminListEvent', '/admin/eventList', 'GET'], // action, url, method
        ['addEvent', '/admin/addEvent', ['GET', 'POST']],
        ['deleteEvent', '/event/delete', 'POST'],
        ['searchEvent', '/event/search', 'POST'], // action, url, method
        ['updateEvent', '/admin/updateEvent/{id:\d+}', ['GET', 'POST']]
      ],

    'Recipe' => [ // Controller
        ['listRecipe', '/recipe', 'GET'], // action, url, method
        ['showRecipe', '/recipe/{id:\d+}', 'GET'],
        ['showAdminRecipe', '/admin/recipe/{id: \d+}', 'GET'],
        ['addRecipe', '/admin/addRecipe', ['GET', 'POST']],
        ['adminlistRecipe', '/admin/recipeList', 'GET'], // action, url, method
        ['searchRecipe', '/recipe/search', 'POST'], // action, url, method
        ['deleteRecipe', '/recipe/delete', 'POST'],
        ['setNote', '/recipe/{recipeId: \d+}/setNote/{note: \d+}', 'GET'],
        ['searchRecipeAdmin', '/admin/recipeList/search', 'POST'], // action, url, method
        ['updateRecipe', '/admin/updateRecipe/{id:\d+}', ['GET', 'POST']]
    ],

];
