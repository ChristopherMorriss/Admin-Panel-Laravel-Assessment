<?php

namespace App\Models;
class Employees{
    public static function all(): array{
        return[
            [
                'id' => 1,
                'first_name' => 'Johnathan',
                'last_name' => 'Monathan',
            ]

        ];
    }
}