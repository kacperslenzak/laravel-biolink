<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinksResource\Pages;
use App\Filament\Resources\LinksResource\RelationManagers;
use App\Models\Links;
use App\Models\LinkType;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LinksResource extends Resource
{
    protected static ?string $model = Links::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('link_url')
                    ->label('Website Username')
                    ->required()
                    ->startsWith(function (Forms\Get $get){
                        return [LinkType::all()->where('link_name', $get('link_type') )->first()->link_url];
                    }),
                Select::make('link_type')->options(LinkType::all()->pluck('link_label', 'link_name'))->required()
                ->debounce(100)
                ->afterStateUpdated(function (Forms\Get $get, Forms\Set $set) {
                    $link_type = $get('link_type');
                    if ($link_type) {
                        $link = LinkType::all()->where('link_name', $link_type )->first()->link_url;
                        $set('link_url', $link);
                    } else {
                        $set('link_url', '');
                    }
                }),
                Hidden::make('user_id')->default(auth()->user()->id)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('link_type')
                ->getStateUsing(function (Model $record) {
                    return LinkType::where('link_name', $record->link_type)->first()->link_label;
                }),
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
            'index' => Pages\ListLinks::route('/'),
            'create' => Pages\CreateLinks::route('/create'),
            'edit' => Pages\EditLinks::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
    }
}
