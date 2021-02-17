<?php

namespace App\Http\Middleware;

use Closure;

class APILogger
{
    private $startTime;

    public function handle($request, Closure $next)
    {
        $this->startTime = microtime(true);
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if ( env('APP_ENV') != "testing" && env('API_DATALOGGER', true) ) {

            $endTime = microtime(true);
            $filename = 'api_datalogger_' . date('d-m-y') . '.log';
            $dataToLog  = 'Time: '   . gmdate("F j, Y, g:i a") . "\n";
            $dataToLog .= 'Duration: ' . number_format($endTime - LARAVEL_START, 3) . "\n";
            $dataToLog .= 'IP Address: ' . $request->ip() . "\n";
            $dataToLog .= 'URL: '    . $request->fullUrl() . "\n";
            $dataToLog .= 'Method: ' . $request->method() . "\n";
            $dataToLog .= 'app_version: ' . $request->headers->get('app_version','') . "\n";
            $dataToLog .= 'mobile_version: ' . $request->headers->get('mobile_version','') . "\n";
            $dataToLog .= 'Input: '  . $request->getContent() . "\n";
            $dataToLog .= 'Output: ' . $response->getContent() . "\n";
            \File::append( storage_path('logs/api' . DIRECTORY_SEPARATOR . $filename), $dataToLog . "\n" . str_repeat("=", 20) . "\n\n");
        }
    }

}
