<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;
    
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
        ->title('Servicio creado')
        ->body('El servicio ha sido creado correctamente')
        ->success()
        ->send();
    }

        protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->color('success'),
        ];
    }
}
