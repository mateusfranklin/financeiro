<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    // Create constants for the account type
    const PERSONAL_ACCOUNT = 1;
    const BUSINESS_ACCOUNT = 2;
    const SAVINGS_ACCOUNT = 3;
    const CREDIT_CARD = 4;
    const LOAN = 5;
    const INVESTMENT = 6;
    const OTHER = 7;

}
