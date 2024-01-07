<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RevisionesResource\Pages;
use App\Filament\Resources\RevisionesResource\RelationManagers;
use App\Models\Revisiones;
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
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class RevisionesResource extends Resource
{
    protected static ?string $model = Revisiones::class;
    protected static ?string $modelLabel = 'Revisiones';
    
    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationLabel = 'Revisiones';
    protected static ?int $navigationSort = 4;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() < 1 ? 'danger' : 'gray';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('fecharev')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Select::make('id_ordens')
                ->preload()
                ->relationship('ordenes','id')
                    ->required(),
                Forms\Components\TextInput::make('tecnicos')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('tipoequip')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('marca')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('capacidad')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('voltajeplacaq')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('voltajeconsumoq')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('amperajeplaceq')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('amperajel1q')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('amperajel2q')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('amperajel3q')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('tempambientec')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('tiporefric')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('modelevaporc')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('serialevaporc')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('voltajeplacac')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('voltajeconsumoc')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('amperajeplacec')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('amperajel1c')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('amperajel2c')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('amperajel3c')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('psuccionq')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('pdescargaq')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('modelcondensaq')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('serialcondensaq')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('funciona')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('cargarefri')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('sepertinc')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('serpetine')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('filtro')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('ventiladorc')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('ventiladore')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('compresor')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('tuboescape')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('tuboaislado')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('tubosoporte')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('breakers')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('protector')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('cableadoe')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('lugartrabajo')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('notas')
                    ->required()
                    ->maxLength(191),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->emptyStateHeading('Aun no hay revisiones')
        ->emptyStateDescription('Agrega algo mi loco')
            ->columns([
                Tables\Columns\TextColumn::make('fecharev')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_ordens'),
                Tables\Columns\TextColumn::make('tecnicos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipoequip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('marca')
                    ->searchable(),
                Tables\Columns\TextColumn::make('capacidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('voltajeplacaq')
                    ->searchable(),
                Tables\Columns\TextColumn::make('voltajeconsumoq')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amperajeplaceq')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amperajel1q')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amperajel2q')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amperajel3q')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempambientec')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tiporefric')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modelevaporc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('serialevaporc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('voltajeplacac')
                    ->searchable(),
                Tables\Columns\TextColumn::make('voltajeconsumoc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amperajeplacec')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amperajel1c')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amperajel2c')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amperajel3c')
                    ->searchable(),
                Tables\Columns\TextColumn::make('psuccionq')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pdescargaq')
                    ->searchable(),
                Tables\Columns\TextColumn::make('modelcondensaq')
                    ->searchable(),
                Tables\Columns\TextColumn::make('serialcondensaq')
                    ->searchable(),
                Tables\Columns\TextColumn::make('funciona')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cargarefri')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sepertinc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('serpetine')
                    ->searchable(),
                Tables\Columns\TextColumn::make('filtro')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ventiladorc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ventiladore')
                    ->searchable(),
                Tables\Columns\TextColumn::make('compresor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tuboescape')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tuboaislado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tubosoporte')
                    ->searchable(),
                Tables\Columns\TextColumn::make('breakers')
                    ->searchable(),
                Tables\Columns\TextColumn::make('protector')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cableadoe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lugartrabajo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('notas')
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
            'index' => Pages\ListRevisiones::route('/'),
            'create' => Pages\CreateRevisiones::route('/create'),
            'edit' => Pages\EditRevisiones::route('/{record}/edit'),
        ];
    }    
}
