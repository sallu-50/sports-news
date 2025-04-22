<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Models\Category;
use App\Models\Subcategory;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;


class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Articles';
    protected static ?string $pluralLabel = 'Articles';
    protected static ?string $slug = 'articles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255),

                TextInput::make('content')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('author')
                    ->maxLength(255)
                    ->default(Auth::user()->name),

                FileUpload::make('image')
                    ->image()
                    ->directory('articles')
                    ->required()
                    ->visibility('public')
                    ->maxSize(5000),

                Select::make('category_id')
                    ->label('Category')
                    ->options(Category::pluck('name', 'id'))
                    ->reactive()
                    ->afterStateUpdated(fn($set) => $set('subcategory_id', null))
                    ->required(),

                Select::make('subcategory_id')
                    ->label('Subcategory')
                    ->options(fn($get) => Subcategory::where('category_id', $get('category_id'))->pluck('name', 'id'))
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->circular(),
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('category.name')->label('Category')->sortable(),
                TextColumn::make('subcategory.name')->label('Subcategory')->sortable(),
                TextColumn::make('author')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime('d M, Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
