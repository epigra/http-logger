<?php

return [

    /*
     * The log profile which determines whether a request should be logged.
     * It should implement `LogProfileInterface`.
     */
    'log_profile' => \Epigra\HttpLogger\Profiles\LogAllRequestsAndResponses::class,

    /*
     * The log writer used to write the request to a log.
     * It should implement `LogWriterInterface`.
     */
    'log_writer' => \Epigra\HttpLogger\DefaultLogWriter::class,

    /*
     * Filter out body fields which will never be logged.
     */
    'except' => [
        'password',
        'password_confirmation',
    ],
    
];
