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
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
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
                            ->maxLength(255)
                           ->unique(User::class, 'email', fn (?Model $record) => $record)
                           ->validationMessages([
                               'unique' => 'El correo electrónico ya está en uso.',
                           ]),
                        Forms\Components\TextInput::make('password')
                            ->label('Contraseña')
                            ->password()
                            ->required()
                            ->hiddenOn(['edit']),
                        Forms\Components\FileUpload::make('foto_perfil')
                            ->image()
                            ->disk('public')
                            ->directory('foto'),
                  
                            
                            //seleccion de cargos y servicio 
//   Section::make('Cargo al cual pertenece')
//     ->columns(3)
//     ->schema([
//         Forms\Components\Select::make('service_id')
//             ->options(Service::all()->pluck('nombre','id'))
//             ->label('Servicio')
//             ->preload()
//             ->live()
//             // Resetea position_id cuando service_id cambia
//             ->afterStateUpdated(function (Set $set) {
//                 $set('position_id', null);
//             })
//             // Al cargar el formulario, si hay un position_id, establece el service_id
//             ->afterStateHydrated(function (Set $set, ?int $state, Get $get) {
//                 if ($get('position_id')) {
//                     $position = Position::find($get('position_id'));
//                     if ($position) {
//                         $set('service_id', $position->service_id);
//                     }
//                 }
//             })
//             ->required()
//             ->dehydrated(false), // Sigue sin guardar service_id en el modelo

//         Forms\Components\Select::make('position_id')
//             ->options(fn (Get $get): Collection => Position::query()
//                 ->where('service_id', $get('service_id'))
//                 ->pluck('nombre','id'))
//             ->label('Cargo')
//             ->preload()
//             ->live()
//             // Cuando position_id cambia, actualiza service_id
//             ->afterStateUpdated(function (Set $set, ?int $state) {
//                 if ($state) { // Si se ha seleccionado una posición
//                     $position = Position::find($state);
//                     if ($position) {
//                         $set('service_id', $position->service_id);
//                     }
//                 } else {
//                     $set('service_id', null); // Si se deselecciona la posición
//                 }
//             })
//             ->required(),
//     ])

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
