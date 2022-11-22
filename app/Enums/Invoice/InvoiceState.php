<?php

namespace App\Enums\Invoice;

enum InvoiceState:int
{
    const UNPAID = 0;
    const PAID = 1;
    const REJECTED = 2;
    const NOTICE = 3;
}
