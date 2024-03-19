<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    // Create constants for the status
    const ACTIVE = 1;
    const INACTIVE = 2;
    const NOT_SHOWING = 3;
    const PENDING = 4;
    const PAID = 5;
    const OVERDUE = 6;
    const CANCELLED = 7;
}
