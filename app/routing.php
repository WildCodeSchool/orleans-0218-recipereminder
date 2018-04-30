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

    'GeneralConditions' => [
        ['generalConditions', '/mentions', 'GET'],

    ],

    'Category' => [ // Controller
        ['list', '/admin/category', ['GET', 'POST']], // action, url, method
        ['update', '/admin/category/update', ['GET', 'POST']], // action, url, method
        ['delete', '/admin/category/delete','POST'], // action, url, method
    ],

    'Event' => [
        ['listEvent', '/event', 'GET'],
        ['showEvent', '/event/{id:\d+}', 'GET'],
        ['showAdminEvent', '/admin/event/{id: \d+}', ['GET', 'POST']],
        ['adminListEvent', '/admin/eventList', 'GET'], // action, url, method
        ['addEvent', '/admin/addEvent', ['GET', 'POST']],
        ['deleteEvent', '/event/delete', 'POST'],
        ['deleteLinkRecipeEvent', '/event/deleteLinkRecipe/{id: \d+}', 'POST'],
        ['searchEvent', '/event/search', 'POST'], // action, url, method
        ['searchRecipeToLink', '/admin/event/searchRecipeToLink', 'POST'], // action, url, method
        ['linkRecipeToEvent', '/admin/event/linkRecipeToEvent', 'POST'], // action, url, method
        ['searchEventAdmin', '/admin/event/search', 'POST'], // action, url, method
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
        ['deleteLinkEventRecipe', '/recipe/deleteLinkEvent/{id: \d+}', 'POST'],
        ['setNote', '/recipe/{recipeId: \d+}/setNote/{note: \d+}', 'GET'],
        ['searchRecipeAdmin', '/admin/recipeList/search', 'POST'], // action, url, method
        ['updateRecipe', '/admin/updateRecipe/{id:\d+}', ['GET', 'POST']]
    ],

    'Company' => [
      ['changeCatchPhrase','/admin/changeCatchPhrase','POST'],
    ],

];
