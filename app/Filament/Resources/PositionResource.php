<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PositionResource\Pages;
use App\Filament\Resources\PositionResource\RelationManagers;
use App\Models\Position;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PositionResource extends Resource
{
    protected static ?string $model = Position::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Cargos';
    protected static ?string $pluralModelLabel = 'Cargos';
    protected static ?string $modelLabel = 'Cargo';
    protected static ?int $navigationSort = 4;


    public static function form(Form $form): Form
    {
        return $form

        ->schema([
                Forms\Components\Select::make('service_id')
                    ->required()
                    ->options(Service::all()->pluck('nombre','id'))
                    ->label('Servicio al que pertenece')
                    // ->searchable()
                    ->preload()
                    ->live()
                    ->default(fn () => Service::where('id', 1)->exists() ? 1 : null),
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre del cargo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('funcion')
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('funcion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service.nombre')
                    ->label('Servicio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPositions::route('/'),
            'create' => Pages\CreatePosition::route('/create'),
            'edit' => Pages\EditPosition::route('/{record}/edit'),
        ];
    }
}
