<?php

namespace App\Http\Responses;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContrat;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements LoginResponseContrat

{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param Request $request
     *
     * @return Response
     */

    public function toResponse($request) {

        return $request->wantsJson()
            ? new JsonResponse('', 204)
            : redirect('/');

    }

}
