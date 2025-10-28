<?php

namespace App\Filament\Resources\Coffees\Tables;

use App\Filament\Resources\Coffees\Pages\EditCoffee;
use App\Filament\Resources\Suppliers\Pages\EditSupplier;
use App\Models\Coffee;
use ClickableBadge;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CoffeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('origin')
                    ->searchable(),
                TextColumn::make('roast_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('suppliers.name')
                    ->badge()
                    ->wrap()
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function (Coffee $record, $state) {
                        $supplier = $record->suppliers()->firstWhere('name', '=', $state);
                        $url = EditSupplier::getUrl([
                            'record' => $supplier->id
                        ]);
                        return ClickableBadge::createHtmlBadge($url, $supplier->name);
                    })
                    ->html(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(null);
    }
}
