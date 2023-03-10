<?php

namespace App\Enums;

enum PlanInterval: string
{
    case MONTHLY = 'month';
    case YEARLY  = 'year';
    case WEEKLY  = 'week';
    case DAILY   = 'day';
}
