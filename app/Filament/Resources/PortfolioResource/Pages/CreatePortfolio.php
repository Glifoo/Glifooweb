<?php

namespace App\Filament\Resources\PortfolioResource\Pages;

use App\Filament\Resources\PortfolioResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreatePortfolio extends CreateRecord
{
    protected static string $resource = PortfolioResource::class;

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
        ->title('Portafolio creado')
        ->body('El portafolio ha sido creado correctamente')
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
