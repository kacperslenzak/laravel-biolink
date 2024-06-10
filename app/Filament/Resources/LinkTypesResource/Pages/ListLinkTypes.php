<?php

namespace App\Filament\Resources\LinkTypesResource\Pages;

use App\Filament\Resources\LinkTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLinkTypes extends ListRecords
{
    protected static string $resource = LinkTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
