<?php

namespace App\Services;

interface NewsfilterService
{
    public function subscribe(string $email): bool;
}
