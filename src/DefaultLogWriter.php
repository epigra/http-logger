<?php

namespace Epigra\HttpLogger;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Illuminate\Support\Facades\Log;

use Epigra\HttpLogger\Interfaces\LogWriterInterface;

class DefaultLogWriter implements LogWriterInterface
{
    private $message = '';
    private $hasMessage = false;

    public function saveLogs()
    {
        Log::info($this->message);
    }

    public function setRequestMessage(Request $request)
    {
        $method = strtoupper($request->getMethod());

        $uri = $request->getPathInfo();

        $bodyAsJson = json_encode($request->except(config('http-logger.except')));

        $files = array_map(function (UploadedFile $file) {
            return $file->getClientOriginalName();
        }, iterator_to_array($request->files));

        $message = "
--- HTTP REQUEST LOG ---
";
        $message .= "{$method} {$uri}
Body: {$bodyAsJson}
Files: " . implode(', ', $files);
        $message .= "
--- /HTTP REQUEST LOG ---";

        $this->message .= $message;
        return $message;
    }

    public function setResponseMessage(Response $response)
    {
        $message = "
--- HTTP RESPONSE LOG ---
";
$message.= $response;
        $message .= "
--- /HTTP RESPONSE LOG ---";

        $this->message .= $message;
        return $message;
    }

}
