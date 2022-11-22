<?php

namespace App\Enums;

enum UserState:int
{
    const PUBLISHED = 1;
    const HIDDEN = 0;
    const DRAFT = 1;
}
