<?php

namespace Fnx\Unit\Logger;

use Psr\Log\LoggerInterface;

class InMemoryLogger
    implements LoggerInterface
{

    private $messages = [];

    private function addMessage ($level, $content, array $context = [])
    {
        $this->messages[ $level ][] = new Message($content, $context);
    }

    public function emergency ($content, array $context = [])
    {
        $this->addMessage(__FUNCTION__, $content, $context);
    }

    public function alert ($content, array $context = [])
    {
        $this->addMessage(__FUNCTION__, $content, $context);
    }

    public function critical ($content, array $context = [])
    {
        $this->addMessage(__FUNCTION__, $content, $context);
    }

    public function error ($content, array $context = [])
    {
        $this->addMessage(__FUNCTION__, $content, $context);
    }

    public function warning ($content, array $context = [])
    {
        $this->addMessage(__FUNCTION__, $content, $context);
    }

    public function notice ($content, array $context = [])
    {
        $this->addMessage(__FUNCTION__, $content, $context);
    }

    public function info ($content, array $context = [])
    {
        $this->addMessage(__FUNCTION__, $content, $context);
    }

    public function debug ($content, array $context = [])
    {
        $this->addMessage(__FUNCTION__, $content, $context);
    }

    public function log ($level, $content, array $context = [])
    {
        $this->addMessage($level, $content, $context);
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
