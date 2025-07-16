<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\EventResource\Pages;
use App\Filament\Admin\Resources\EventResource\RelationManagers;
use App\Filament\Admin\Resources\EventResource\RelationManagers\TicketsRelationManager;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Events';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)->schema([
                    Forms\Components\Section::make('Event Details')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),

                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->unique(Event::class, 'slug', ignoreRecord: true),

                            Forms\Components\Select::make('event_category_id')
                                ->relationship('eventCategory', 'name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->label('Category'),

                            Forms\Components\RichEditor::make('description')
                                ->required()
                                ->columnSpanFull(),

                            Forms\Components\FileUpload::make('thumbnail')
                                ->image()
                                ->directory('events'),
                        ])->columnSpan(2),

                    Forms\Components\Section::make('Location & Time')
                        ->schema([
                            Forms\Components\TextInput::make('location_name')
                                ->required(),

                            Forms\Components\TextInput::make('location_city')
                                ->required(),

                            Forms\Components\DateTimePicker::make('start_time')
                                ->required(),

                            Forms\Components\DateTimePicker::make('end_time'),

                            Forms\Components\Toggle::make('is_published')
                                ->label('Published?')
                                ->required(),

                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('latitude')
                                    ->numeric(),
                                Forms\Components\TextInput::make('longitude')
                                    ->numeric(),
                            ]),
                        ])->columnSpan(1),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('eventCategory.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('location_city')
                    ->label('City')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label('Published'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TicketsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        return $user?->hasRole('admin') ?? false;
    }
}
