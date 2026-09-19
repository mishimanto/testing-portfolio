<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name')
                    ->required()
                    ->default('Portfolio'),
                TextInput::make('meta_title'),
                Textarea::make('meta_description')
                    ->columnSpanFull(),
                Textarea::make('meta_keywords')
                    ->helperText('Comma-separated keywords, for example: Laravel developer, web designer')
                    ->columnSpanFull(),
                FileUpload::make('logo')->image()->disk('site_assets')->directory('assets/images/site')->visibility('public'),
                FileUpload::make('dark_logo')->image()->disk('site_assets')->directory('assets/images/site')->visibility('public'),
                FileUpload::make('favicon')->image()->disk('site_assets')->directory('assets/images/site')->visibility('public'),
                FileUpload::make('og_image')->label('Social sharing image (Open Graph)')->image()->disk('site_assets')->directory('assets/images/site')->visibility('public'),
                FileUpload::make('sidebar_image')->image()->disk('site_assets')->directory('assets/images/site')->visibility('public'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('address'),
                Textarea::make('sidebar_title')
                    ->columnSpanFull(),
                Textarea::make('sidebar_description')
                    ->columnSpanFull(),
                Textarea::make('footer_text')
                    ->columnSpanFull(),
            ]);
    }
}
