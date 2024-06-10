<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkTypesResource\Pages;
use App\Filament\Resources\LinkTypesResource\RelationManagers;
use App\Models\LinkType;
use App\Models\LinkTypes;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LinkTypesResource extends Resource
{
    protected static ?string $model = LinkType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('link_label')->required()->afterStateUpdated(fn ($state, callable $set) => $set('link_name', strtolower(str_replace(" ", "-", $state)))),
                TextInput::make('link_url')->required(),
                Hidden::make('link_name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('link_label'),
                Tables\Columns\TextColumn::make('link_url')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLinkTypes::route('/'),
            'create' => Pages\CreateLinkTypes::route('/create'),
            'edit' => Pages\EditLinkTypes::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        $user = auth()->user();
        if($user->is_admin){
            return true;
        }

        return false;
    }
}
