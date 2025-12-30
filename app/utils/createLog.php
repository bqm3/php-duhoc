<?php

function createLog(string $message, string $level = 'INFO', string $file = 'app.log'): void
{
    // logs nằm trong app/logs
    $logDir = __DIR__ . '/../logs';

    if (!is_dir($logDir)) {
        mkdir($logDir, 0777, true);
    }

    $line = sprintf(
        "[%s][%s] %s\n",
        date('Y-m-d H:i:s'),
        strtoupper($level),
        $message
    );

    error_log($line, 3, $logDir . '/' . $file);
}
