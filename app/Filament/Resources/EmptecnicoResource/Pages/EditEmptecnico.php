<?php

namespace App\Filament\Resources\EmptecnicoResource\Pages;

use App\Filament\Resources\EmptecnicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmptecnico extends EditRecord
{
    protected static string $resource = EmptecnicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
