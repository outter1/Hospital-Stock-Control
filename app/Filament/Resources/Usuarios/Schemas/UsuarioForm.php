<?php

namespace App\Filament\Resources\Usuarios\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UsuarioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('id_usuario')
                    ->label('id usuario')
                    ->required(),
                TextInput::make('cargo')
                    ->required(),
            ]);
    }
}
