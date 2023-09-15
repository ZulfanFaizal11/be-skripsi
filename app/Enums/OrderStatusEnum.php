<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case UNPAID = '0';
    case PAID = '1';
    case DONE = '2';
}
