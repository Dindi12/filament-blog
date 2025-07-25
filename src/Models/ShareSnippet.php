<?php

namespace Firefly\FilamentBlog\Models;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Firefly\FilamentBlog\Database\Factories\ShareSnippetFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareSnippet extends Model
{
    use HasFactory;

    protected $fillable = [
        'script_code',
        'html_code',
    ];

    protected $casts = [
        'script_code' => 'string',
        'html_code' => 'string',
    ];

    public function scopeActive(Builder $query)
    {
        return $query->where('active', true);
    }

    public static function getForm(): array
    {
        return [
            Textarea::make('script_code')->label('JS Script'),
            Textarea::make('html_code'),
            Toggle::make('active'),
        ];
    }

    protected static function newFactory()
    {
        return new ShareSnippetFactory();
    }
}
