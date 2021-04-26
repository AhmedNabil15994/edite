<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/pages/add/uploadImage',
        '/pages/edit/*/editImage',

        '/sliders/add/uploadImage',
        '/sliders/edit/*/editImage',

        '/events/add/uploadImage',
        '/events/edit/*/editImage',
        '/events/edit/*/deleteImage',
        '/events/edit/*/uploadImage',

        '/users/add/uploadImage',
        '/users/edit/*/editImage',

        '/panelSettings/deleteImage',
        '/panelSettings/*',

        '/photos/add/uploadImage',
        '/photos/edit/*/editImage',
        '/photos/edit/*/deleteImage',
        '/photos/edit/*/uploadImage',


    ];
}
