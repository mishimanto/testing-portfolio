<?php

namespace App\Filament\Pages\Auth;

use Filament\Actions\Action;
use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class Login extends BaseLogin
{
    protected string $view = 'filament.pages.auth.login';

    protected Width|string|null $maxWidth = Width::Large;

    public function hasLogo(): bool
    {
        return false;
    }

    public function getHeading(): string|Htmlable|null
    {
        return 'Welcome Back';
    }

    public function getSubheading(): string|Htmlable|null
    {
        return 'Login to your account';
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Email')
            ->placeholder('Enter your email')
            ->prefixIcon(Heroicon::OutlinedEnvelope)
            ->email()
            ->required()
            ->autocomplete()
            ->autofocus();
    }

    protected function getPasswordFormComponent(): Component
    {
        return parent::getPasswordFormComponent()
            ->placeholder('Enter your password')
            ->prefixIcon(Heroicon::OutlinedLockClosed);
    }

    protected function getAuthenticateFormAction(): Action
    {
        return Action::make('authenticate')
            ->label('Login')
            ->submit('authenticate');
    }
}
