<?php

namespace App\Filament\Resources\Leads\Schemas;

use App\Models\Lead;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nome e cognome')
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Telefono')
                    ->tel()
                    ->maxLength(50),
                TextInput::make('organization')
                    ->label('Ente / Azienda')
                    ->maxLength(255),
                Select::make('interest')
                    ->label('Interesse')
                    ->options(Lead::INTERESTS),
                Select::make('trainees_per_year')
                    ->label('Corsisti all\'anno')
                    ->options(Lead::TRAINEES_PER_YEAR),
                Select::make('source')
                    ->label('Provenienza')
                    ->options(Lead::SOURCES)
                    ->required(),
                Select::make('status')
                    ->label('Stato')
                    ->options(Lead::STATUSES)
                    ->required(),
                Textarea::make('message')
                    ->label('Messaggio')
                    ->rows(4)
                    ->columnSpanFull(),
                DateTimePicker::make('privacy_accepted_at')
                    ->label('Privacy accettata il')
                    ->disabled(),
            ]);
    }
}
