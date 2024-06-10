<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms\Components\Component;

class Register extends BaseRegister
{

    protected function getNameFormComponent(): Component
    {
        return TextInput::make('name')
            ->label(__('username'))
            ->required()
            ->maxLength(255)
            ->autofocus();
    }

}
