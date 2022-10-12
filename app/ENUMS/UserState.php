<?php

namespace App\ENUMS;

enum UserState:int
{
    const PUBLISHED = 1;
    const HIDDEN = 0;
    const DRAFT = 1;
}
