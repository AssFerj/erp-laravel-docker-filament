<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Client;

class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function update()
    {
        $client = Client::find($this->record->id);
        $client->update($this->form->getState());

        // Atualizar o endereço
        $client->address()->update($this->form->getState()['address']);

        // Redirecionar ou fazer outra ação após a atualização
        $this->redirect(static::getResource()::getUrl('index'));
    }
}
