<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KesenianResource\Pages\{CreateKesenian, EditKesenian, ListKesenians};
use Filament\Forms\Components\{TextInput, FileUpload, Grid, Hidden, MarkdownEditor, Radio, View};
use Filament\Tables\Actions\{EditAction, DeleteAction, BulkActionGroup, DeleteBulkAction};
use App\Models\Kesenian;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;

class KesenianResource extends Resource
{
    protected static ?string $model = Kesenian::class;

    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $pluralLabel = 'Kesenian';
    protected static ?string $modelLabel = 'Kesenian';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Hidden::make('user_id')
                ->default(fn() => Auth::id()),

            TextInput::make('penulis')
                ->label('Penulis')
                ->default(fn($record) => $record?->user?->name ?? Auth::user()?->name)
                ->disabled()
                ->dehydrated(false),

            Grid::make(2)->schema([
                TextInput::make('judul')
                    ->required()
                    ->maxLength(100)
                    ->live(true)
                    ->afterStateUpdated(
                        fn($state, callable $set) =>
                        $set('sub_judul', Str::slug($state))
                    ),
                TextInput::make('sub_judul')
                    ->label('Sub Judul')
                    ->required()
                    ->hidden()
                    ->dehydrated()
                    ->maxLength(100),
            ]),

            Grid::make()
                ->columns(2)
                ->schema([
                    MarkdownEditor::make('deskripsi')
                        ->label('Deskripsi')
                        ->live(true)
                        ->required()
                        ->columnSpan(1),

                    View::make('livewire.components.markdown-preview')
                        ->label('Preview')
                        ->visible(fn($get) => filled($get('deskripsi')))
                        ->viewData(fn($get) => [
                            'html' => Str::markdown($get('deskripsi')),
                        ])
                        ->columnSpan(1),
                ])
                ->columnSpanFull(),

            Radio::make('tipe_banner')
                ->label('Tipe Banner')
                ->inline()
                ->options([
                    'url' => 'URL Gambar',
                    'upload' => 'Upload File',
                ])
                ->default('upload')
                ->live(),

            TextInput::make('banner_image_url')
                ->label('URL Banner')
                ->visible(fn($get) => $get('tipe_banner') === 'url')
                ->url(),

            FileUpload::make('banner_image_upload')
                ->label('Upload Banner')
                ->image()
                ->directory('kesenian/banner')
                ->visible(fn($get) => $get('tipe_banner') === 'upload'),

            TextInput::make('link_youtube')
                ->label('Link YouTube')
                ->nullable()
                ->url(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->searchable(),
                TextColumn::make('user.name')
                    ->label('Penulis')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'Super Admin' => 'success',
                        'Admin Bidang' => 'primary',
                        'Admin' => 'warning',
                        'Staf' => 'info',
                    })
                    ->sortable()
                    ->searchable(),
                TextColumn::make('link_youtube')->label('Link Youtube'),
                TextColumn::make('updated_at')->dateTime('d M Y H:i')->label('Diperbarui Pada')
            ])
            ->actions([
                EditAction::make()->label('Edit'),
                DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Hapus Kesenian Banten Ini?')
                    ->modalDescription('Apakah anda Yakin ingin menghapus Data Kesenian Banten ini?')
                    ->modalSubmitActionLabel('Ya, Hapus')
                    ->modalCancelActionLabel('Batal'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->label('Hapus Terpilih'),
                ])->label('Aksi')
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKesenians::route('/'),
            'create' => CreateKesenian::route('/create'),
            'edit' => EditKesenian::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Kesenian';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Konten';
    }

    public static function canAccess(): bool
    {
        /** @var \App\Models\User|\Spatie\Permission\Traits\HasRoles $user */
        $user = Auth::user();

        return $user->hasRole(['Super Admin', 'Admin']);
    }
}
