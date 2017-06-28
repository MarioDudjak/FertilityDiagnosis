<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [ "http://localhost/MLFertilityDiagnosis/public/like", "http://localhost/MLFertilityDiagnosis/public"
        //protected $except = [ "your url", "your url/abc" ];
    ];
}
