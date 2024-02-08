<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrdenesResource\Pages;
use App\Filament\Resources\OrdenesResource\RelationManagers;
use App\Models\empresa;
use App\Models\Ordenes;
use App\Models\revisiones;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class OrdenesResource extends Resource
{
    protected static ?string $model = Ordenes::class;

    protected static ?string $modelLabel = 'Ordenes';
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Ordenes';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 5 ? 'danger' : 'gray';
    }
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\Select::make('empresas_id')
                ->preload()
                ->relationship('empresas','empresa')
                    ->required(),
                Forms\Components\Select::make('emptecnicos_id')
                ->label("Tecnico Encargado")
                ->relationship('emptecnicos','nombre')
                ->preload()
                    ->required(),
                Forms\Components\DatePicker::make('fechainc')
                ->label("Fecha de inicio")
                    ->required(),
                Forms\Components\DatePicker::make('fechafn')
                ->label("Fecha de Finalizacion")
                    ->required(),
                Forms\Components\TextInput::make('tiporevis')
                ->label("Tipo de Revision")
                    ->required()
                    ->maxLength(191),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->emptyStateHeading('Aun no hay ordenes')
        ->emptyStateDescription('Agrega algo mi loco')
        ->striped()
            ->columns([
                Tables\Columns\TextColumn::make('fecha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('empresas.empresa')
                    ->sortable(),
                Tables\Columns\TextColumn::make('emptecnicos.nombre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('fechainc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fechafn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tiporevis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                    ExportAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListOrdenes::route('/'),
            'create' => Pages\CreateOrdenes::route('/create'),
            'edit' => Pages\EditOrdenes::route('/{record}/edit'),
        ];
    }    
}
