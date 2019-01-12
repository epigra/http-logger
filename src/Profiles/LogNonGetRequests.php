<?php

namespace Epigra\HttpLogger\Profiles;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Epigra\HttpLogger\Interfaces\LogProfileInterface;

class LogNonGetRequests implements LogProfileInterface
{
    public function shouldLogRequest(Request $request): bool
    {
        return in_array(strtolower($request->method()), ['post', 'put', 'patch', 'delete']);
    }

    public function shouldLogResponse(Response $request) : bool
    {
        return false;
    }
}
