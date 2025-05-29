<?php

namespace App\Enums;

enum PostStatus: int
{
    case DRAFT = 1;
    case SCHEDULED = 2;
    case PUBLISHED = 3;

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::SCHEDULED => 'Scheduled',
            self::PUBLISHED => 'Published',
        };
    }
    
    public static function values(): array
    {
        return array_map(
            fn($status) => $status->value,
            self::cases()
        );
    }
}