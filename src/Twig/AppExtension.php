<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('to_number', [$this, 'toNumber']),
        ];
    }

    public function toNumber($value): float
    {
        if (is_numeric($value)) {
            return (float) $value;
        }
        
        // Replace comma with dot for European number format
        $value = str_replace(',', '.', $value);
        
        if (is_numeric($value)) {
            return (float) $value;
        }
        
        return 0;
    }
}
