<?php

namespace App\Filament\Resources\CargoResource\Pages;

use App\Filament\Resources\CargoResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCargo extends CreateRecord
{
    protected static string $resource = CargoResource::class;

        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
            return null;
    }
    protected function afterCreate(){
        Notification::make()
        ->title('Cargo creado')
        ->body('El Cargo se ha creado correctamente')
        ->success()
        ->send();
    }
}
