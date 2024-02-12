<?php

namespace Src\Exceptions;

use Exception;
use Throwable;

/**
 * Class FileNotFound
 *
 * @package Src\Exceptions
 */
class FileNotFound extends Exception
{

    /**
     *
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(
        string $filepath,
        int $code = 404,
        Throwable $previous = null
    ) {
        parent::__construct("File $filepath Not Found", $code, $previous);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
