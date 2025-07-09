<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Position;
use App\Models\Service;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $label = User::class;


    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Usuarios';
    protected static ?string $pluralModelLabel = 'Usuarios';
    protected static ?string $modelLabel = 'Usuario';

    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Llene los campos')
                     ->schema([

                        Forms\Components\TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('password')
                            ->label('Contraseña')
                            ->password()
                            ->required()
                            ->hiddenOn(['edit']),
                        Forms\Components\FileUpload::make('foto_perfil')
                            ->image()
                            ->disk('public')
                            ->directory('foto'),
                            
                        
                        Section::make('Cargo al cual pertenece')
                            ->columns(3)
                            ->schema([
                        Forms\Components\Select::make('service_id')
                            // ->relationship(name:'service' , titleAttribute:'nombre')
                            ->options(Service::all()->pluck('nombre','id'))
                            ->label('Servicio')
                            ->preload()
                            ->live()
                            // ->options(Position::all()->pluck('nombre','id'))
                            ->afterStateUpdated(function(Set $set)
                            {
                                $set('position_id',null);
                            })
                            ->required()
                            ->dehydrated(false),
                        Forms\Components\Select::make('position_id')
                            ->options(fn (Get $get): Collection => Position::query()
                            ->where('service_id',$get('service_id'))
                            ->pluck('nombre','id'))
                            ->label('Cargo')
                            ->preload()
                            ->live()
                            // ->afterStateUpdated(function(Set $set)
                            // {
                            //     $set('service_id',null);
                            // })
                            ->required(),
                            // ->default(fn () => Position::where('id', 1)->exists() ? 1 : null),
                        ])
                        ]),
                        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado en')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado en')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('foto_perfil')
                    // ->searchable()
                    ->width(100)
                    ->height(100),
                Tables\Columns\TextColumn::make('position.nombre')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
