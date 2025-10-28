<?php

namespace App\Filament\Resources\Coffees;

use App\Filament\Resources\Coffees\Pages\CreateCoffee;
use App\Filament\Resources\Coffees\Pages\EditCoffee;
use App\Filament\Resources\Coffees\Pages\ListCoffees;
use App\Filament\Resources\Coffees\Schemas\CoffeeForm;
use App\Filament\Resources\Coffees\Tables\CoffeesTable;
use App\Models\Coffee;
use BackedEnum;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CoffeeResource extends Resource
{
    protected static ?string $model = Coffee::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CoffeeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoffeesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\SuppliersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCoffees::route('/'),
            'create' => CreateCoffee::route('/create'),
            'edit' => EditCoffee::route('/{record}/edit'),
        ];
    }
}
