<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Client;

class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;

    protected function save(): void
    {
        // Salvar o cliente
        $client = Client::create($this->form->getState());

        // Salvar o endereço
        $client->address()->create($this->form->getState()['address']);

        // Redirecionar ou fazer outra ação após a criação
        $this->redirect(static::getResource()::getUrl('index'));
    }
}
