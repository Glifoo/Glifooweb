<?php

namespace App\Filament\Resources\PositionResource\Pages;

use App\Filament\Resources\PositionResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreatePosition extends CreateRecord
{
    protected static string $resource = PositionResource::class;
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

        protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->color('success'),
        ];
    }
}
