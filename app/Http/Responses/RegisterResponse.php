<?php

namespace App\Http\Responses;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContrat;
use Symfony\Component\HttpFoundation\Response;

class RegisterResponse implements RegisterResponseContrat

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
