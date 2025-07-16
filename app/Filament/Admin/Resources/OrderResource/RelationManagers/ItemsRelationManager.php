<?php

namespace App\Filament\Admin\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form->schema([]); // Read-only
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ticket_code')
            ->columns([
                Tables\Columns\TextColumn::make('ticket_code'),
                Tables\Columns\TextColumn::make('event.name'),
                Tables\Columns\TextColumn::make('attendee_name'),
                Tables\Columns\TextColumn::make('price')->money('IDR'),
                Tables\Columns\IconColumn::make('is_scanned')
                    ->label('Checked In')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(), // Non-aktif
            ])
            ->actions([
                // Tables\Actions\EditAction::make(), // Non-aktif
                // Tables\Actions\DeleteAction::make(), // Non-aktif
            ])
            ->bulkActions([
                //
            ]);
    }
}
