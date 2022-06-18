<?php 

namespace App\Enums;



enum GemTransactionTagEnum: string {
    case System = 'system';
    case Admin = 'admin';
    case Operator = 'operator';
    case User = 'user';
}