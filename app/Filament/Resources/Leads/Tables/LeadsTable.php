<?php

namespace App\Filament\Resources\Leads\Tables;

use App\Models\Lead;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->placeholder('—')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('organization')
                    ->label('Ente / Azienda')
                    ->placeholder('—')
                    ->searchable(),
                TextColumn::make('interest')
                    ->label('Interesse')
                    ->formatStateUsing(fn (?string $state): ?string => Lead::INTERESTS[$state] ?? $state)
                    ->placeholder('—'),
                TextColumn::make('trainees_per_year')
                    ->label('Corsisti/anno')
                    ->formatStateUsing(fn (?string $state): ?string => Lead::TRAINEES_PER_YEAR[$state] ?? $state)
                    ->placeholder('—')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('source')
                    ->label('Provenienza')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Lead::SOURCES[$state] ?? $state),
                SelectColumn::make('status')
                    ->label('Stato')
                    ->options(Lead::STATUSES)
                    ->selectablePlaceholder(false),
                TextColumn::make('created_at')
                    ->label('Ricevuto')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Stato')
                    ->options(Lead::STATUSES),
                SelectFilter::make('source')
                    ->label('Provenienza')
                    ->options(Lead::SOURCES),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
