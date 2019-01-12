<?php

namespace Epigra\HttpLogger\Middlewares;

use Closure;
use Illuminate\Http\Request;

use Epigra\HttpLogger\Interfaces\LogWriterInterface;
use Epigra\HttpLogger\Interfaces\LogProfileInterface;

class HttpLogger
{
    protected $logProfile;
    protected $logWriter;

    public function __construct(LogProfileInterface $logProfile, LogWriterInterface $logWriter)
    {
        $this->logProfile = $logProfile;
        $this->logWriter = $logWriter;
    }

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($this->logProfile->shouldLogRequest($request) && env('LOG_REQUESTS', false)) {
            $this->logWriter->setRequestMessage($request);
        }
        if ($this->logProfile->shouldLogResponse($response) && env('LOG_RESPONSES', false)) {
            $this->logWriter->setResponseMessage($response);
        }

        $this->logWriter->saveLogs();

        return $response;
    }
}
