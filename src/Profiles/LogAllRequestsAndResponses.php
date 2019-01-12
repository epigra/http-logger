<?php

namespace Epigra\HttpLogger\Profiles;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Epigra\HttpLogger\Interfaces\LogProfileInterface;

class LogAllRequestsAndResponses implements LogProfileInterface
{
    public function shouldLogRequest(Request $request) : bool
    {
        return true;
    }

    public function shouldLogResponse(Response $request) : bool
    {
        return true;
    }
}
