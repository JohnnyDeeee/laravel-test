<?php

namespace App\Filament\Resources\Suppliers\Tables;

use App\Filament\Resources\Coffees\Pages\EditCoffee;
use App\Models\Coffee;
use App\Models\Supplier;
use ClickableBadge;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SuppliersTable
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
                TextColumn::make('coffees.name')
                    ->badge()
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function (Supplier $record, $state) {
                        $coffee = $record->coffees()->firstWhere('name', '=', $state);
                        $url = EditCoffee::getUrl([
                            'record' => $coffee->id
                        ]);
                        return ClickableBadge::createHtmlBadge($url, $coffee->name);
                    })
                    ->html()
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
