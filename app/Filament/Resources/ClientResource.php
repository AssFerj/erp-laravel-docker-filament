<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->label('Empresa')
                    ->relationship('company', 'name')
                    ->visible(fn (string $operation): bool => $operation === 'create' && Auth::user() && Auth::user()->hasRole('admin')), 

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nome'),
                
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->label('Email'),

                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->label('Telefone'),

                // Campos de endereço
                Forms\Components\TextInput::make('address.street')
                    ->required()
                    ->label('Rua'),

                Forms\Components\TextInput::make('address.city')
                    ->required()
                    ->label('Cidade'),

                Forms\Components\TextInput::make('address.state')
                    ->required()
                    ->label('Estado'),

                Forms\Components\TextInput::make('address.postal_code')
                    ->required()
                    ->label('Código Postal'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Telefone')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery(); // Chama a consulta padrão

        $user = Auth::user();
        if ($user && $user->hasRole('company')) {
            return $query->where('company_id', $user->company_id);
        }

        return $query; // Retorna a consulta original se o usuário não for da empresa
    }
}
