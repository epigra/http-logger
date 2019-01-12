<?php

namespace Epigra\HttpLogger\Interfaces;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface LogProfileInterface
{
    public function shouldLogRequest(Request $request) : bool;
    public function shouldLogResponse(Response $response) : bool;
}