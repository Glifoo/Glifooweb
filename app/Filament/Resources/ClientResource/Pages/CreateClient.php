<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;

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
        ->title('Cliente creado')
        ->body('El cliente ha sido creado correctamente')
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
