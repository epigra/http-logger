<?php

namespace Epigra\HttpLogger\Interfaces;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

interface LogWriterInterface
{
    public function saveLogs();

    public function setRequestMessage(Request $request);
    public function setResponseMessage(Response $response);
}