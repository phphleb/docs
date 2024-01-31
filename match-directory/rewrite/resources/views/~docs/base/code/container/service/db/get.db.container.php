<?php
// File /app/Models/ExampleModel.php

namespace App\Models;

use Hleb\Base\Model;
use Hleb\Reference\DbInterface;
use Hleb\Static\DB;

class ExampleModel extends Model
{
    public static function get(): false|array
    {
        $query = '"SELECT * FROM table_name WHERE active=1';

        // variant 1
        $data = self::container()->get(DbInterface::class)->dbQuery($query);

        // variant 2
        $data = self::container()->db()->dbQuery($query);

        // variant 3
        $data = DB::dbQuery($query);

        return $data;
    }
}
