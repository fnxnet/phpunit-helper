<?php

namespace Fnxnet\Unit;

use Psr\Log\LoggerInterface;

class InMemoryLogger
    implements LoggerInterface
{

    private $messages = [];

    private function logMessage ($level, $message, array $context = [])
    {
        $this->messages[ $level ][] = [
            'message' => $message,
            'context' => $context,
        ];
    }

    public function emergency ($message, array $context = [])
    {
        $this->logMessage(__FUNCTION__, $message);
    }

    public function alert ($message, array $context = [])
    {
        $this->logMessage(__FUNCTION__, $message);
    }

    public function critical ($message, array $context = [])
    {
        $this->logMessage(__FUNCTION__, $message);
    }

    public function error ($message, array $context = [])
    {
        $this->logMessage(__FUNCTION__, $message);
    }

    public function warning ($message, array $context = [])
    {
        $this->logMessage(__FUNCTION__, $message);
    }

    public function notice ($message, array $context = [])
    {
        $this->logMessage(__FUNCTION__, $message);
    }

    public function info ($message, array $context = [])
    {
        $this->logMessage(__FUNCTION__, $message);
    }

    public function debug ($message, array $context = [])
    {
        $this->logMessage(__FUNCTION__, $message);
    }

    public function log ($level, $message, array $context = [])
    {
        $this->logMessage('default', $message);
    }

    public function count ($level = NULL)
    {
        if ($level) {
            return isset($this->messages[ $level ]) ? count($this->messages[ $level ]) : 0;
        }
        $sum = 0;
        foreach (array_keys($this->messages) as $lvl) {
            $sum += count($this->messages[ $lvl ]);
        }

        return $sum;
    }

    public function getMessages ()
    {
        return $this->messages;
    }
}
