<?php

namespace FpDbTest;

use mysqli;
use Exception;

class Database implements DatabaseInterface
{
    private mysqli $mysqli;

    public function __construct(mysqli $mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function buildQuery(string $query, array $args = []): string
    {
        throw new Exception();
    }

    public function skip()
    {
        throw new Exception();
    }
}
