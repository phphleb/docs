<?php
// File /app/Models/DefaultModel.php

namespace App\Models;

use App\Bootstrap\Services\RequestIdInterface;
use Hleb\Base\Model;

class DefaultModel extends Model
{
    public static function getCollection(): array
    {
        // variant 1
        $requestIdService = self::container()->get(RequestIdInterface::class);
        // variant 2
        $requestIdService = self::container()->requestId();

        return [];
    }
}
