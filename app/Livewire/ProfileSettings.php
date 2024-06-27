<?php

namespace App\Livewire;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Livewire\Component;

class ProfileSettings extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        $user_settings_object = \App\Models\ProfileSettings::all()->where('user_id', auth()->user()->id)->first();
        $user_settings = array();
        if($user_settings_object) {
            $user_settings = $user_settings_object->attributesToArray();
        }

        return $form
            ->schema([
                Split::make([
                    Section::make([
                        TextInput::make('description')
                            ->default(($user_settings) ? $user_settings['description'] : ''),
                        Select::make('background_effect')
                            ->label('Background Effects')
                            ->options(['Snowflakes', 'Rain'])
                            ->default(($user_settings) ? $user_settings['background_effect'] : ''),
                        Select::make('username_effect')
                            ->label('Username Effects')
                            ->options(['Rainbow Name', 'Red Sparkles'])
                            ->default(($user_settings) ? $user_settings['username_effect'] : '')
                    ]),
                    Section::make([
                        TextInput::make('profile_opacity')
                        ->label('Profile opacity (%)')
                        ->default(($user_settings) ? $user_settings['profile_opacity'] : '')
                        ->maxLength(3)
                        ->minLength(1),
                        TextInput::make('profile_blur')
                        ->label('Profile Blur (px)')
                        ->default(($user_settings) ? $user_settings['profile_blur'] : ''),
                        Toggle::make('username_glow')
                        ->default(($user_settings) ? $user_settings['username_glow'] : ''),
                        Toggle::make('badge_glow')
                        ->default(($user_settings) ? $user_settings['badge_glow'] : '')
                    ])
                ])
            ])->statePath('data');
    }

    public function create(): void
    {
        \App\Models\ProfileSettings::updateOrCreate(['user_id' => auth()->user()->id], $this->form->getState());

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }

    public function render(Set $set)
    {
        return view('livewire.profile-settings');
    }
}
