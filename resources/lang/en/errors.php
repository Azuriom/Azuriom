<?php

return [
    'error' => 'Error',
    'code' => 'Error :code',
    'home' => 'Back to home',
    'whoops' => 'Whoops!',

    '401' => [
        'title' => 'Unauthorized',
        'message' => 'You are not authorized to access this page.',
    ],
    '403' => [
        'title' => 'Forbidden',
        'message' => 'You are forbidden from accessing this page.',
    ],
    '404' => [
        'title' => 'Not Found',
        'message' => 'The page you are looking for could not be found.',
    ],
    '419' => [
        'title' => 'Page Expired',
        'message' => 'Your session has expired. Please refresh and try again.',
    ],
    '429' => [
        'title' => 'Too Many Requests',
        'message' => 'You are making too many requests to our servers. Please try again later.',
    ],
    '500' => [
        'title' => 'Server Error',
        'message' => 'Whoops, something went wrong on our servers. Please try again later.',
    ],
    '503' => [
        'title' => 'Service Unavailable',
        'message' => 'We are doing some maintenance. Please check back soon.',
    ],

    'fallback' => [
        'message' => 'An error occurred. Please try again.',
    ],
];
