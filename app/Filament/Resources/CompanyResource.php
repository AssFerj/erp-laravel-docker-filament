<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nome da Empresa'),
                
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Email da Empresa'),

                Forms\Components\TextInput::make('logo')
                    ->nullable()
                    ->label('Logo da Empresa'),

                Forms\Components\Select::make('plan_id')
                    ->required()
                    ->relationship('plan', 'name') // Supondo que você tenha um relacionamento com o modelo Plan
                    ->label('Plano'),

                Forms\Components\Toggle::make('isActive')
                    ->default(true)
                    ->label('Ativo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        // $companies = Company::with('plan')->get(); // Eager load the plan relationship
        // dd($companies);
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Empresa')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('plan.name')
                    ->label('Plano')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\BooleanColumn::make('isActive')
                    ->label('Ativo')
                    ->sortable(),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
