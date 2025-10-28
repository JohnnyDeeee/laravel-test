<?php

namespace App\Filament\Resources\Coffees\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CoffeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('origin')
                    ->required(),
                DatePicker::make('roast_date')
                    ->required(),
                TextInput::make('stock')
                    ->required()
                    ->numeric(),
            ]);
    }
}
