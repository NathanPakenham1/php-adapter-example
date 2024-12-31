<?php

interface Logger {
    public function log(string $message): void;
}

class ConsoleLogger implements Logger {
    public function log(string $message): void {
        echo 'Logging To Console'. $message;
    }
}

class NullLogger implements Logger {
    public function log(string $message): void {
        // Do Nothing
    }
}

function performTask(Logger $logger) {
    $logger->log('Logging To Console');
}

$consoleLogger = new ConsoleLogger();
$consoleLogger->log('Logging To Console');

$nullLogger = new NullLogger();
$nullLogger->log('Logging To Console');