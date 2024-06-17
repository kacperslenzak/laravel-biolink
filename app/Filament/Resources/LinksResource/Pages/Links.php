<?php

namespace App\Filament\Resources\LinksResource\Pages;

use App\Filament\Resources\LinksResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\Page;

class Links extends Page
{
    protected static string $resource = LinksResource::class;

    protected static string $view = 'filament.resources.links-resource.pages.links';

}
