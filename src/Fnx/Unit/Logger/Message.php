<?php

namespace Fnx\Unit\Logger;

class Message
{
    /**
     * @var string
     */
    private $content;
    /**
     * @var array
     */
    private $context = [];

    /**
     * Message constructor.
     *
     * @param string $content
     * @param array  $context
     */
    public function __construct (string $content, array $context = [])
    {
        $this->content = $content;
        $this->context = $context;
    }

    public function getContent ()
    {
        return $this->content;
    }

    public function getContext ()
    {
        return $this->context;
    }
}
