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
    'Home' => [
      ['index', '/', 'GET'], // action, url, method
    ],
    'Movie' => [ // Controller
        ['index', '/movies', 'GET'], // action, url, method
        ['add', '/movie/add', ['POST', 'GET']], // action, url, method
        ['edit', '/movie/edit/{id:\d+}', 'GET'], // action, url, method
        ['show', '/movie/{id:\d+}', 'GET'], // action, url, method
    ],
    'Director' => [ // Controller
        ['index', '/directors', 'GET'], // action, url, method
        ['add', '/director/add', 'GET'], // action, url, method
        ['edit', '/director/edit/{id:\d+}', 'GET'], // action, url, method
        ['show', '/director/{id:\d+}', 'GET'], // action, url, method
    ],
];
