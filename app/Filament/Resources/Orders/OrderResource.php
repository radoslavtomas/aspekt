<?php

namespace App\Filament\Resources\Orders;

use App\Filament\Resources\Orders\Pages\CreateOrder;
use App\Filament\Resources\Orders\Pages\EditOrder;
use App\Filament\Resources\Orders\Pages\ListOrders;
use App\Filament\Resources\Orders\RelationManagers\CommentsRelationManager;
use App\Filament\Resources\Orders\RelationManagers\ItemsRelationManager;
use App\Filament\Resources\Orders\Schemas\OrderForm;
use App\Filament\Resources\Orders\Tables\OrdersTable;
use App\Models\Order;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class OrderResource extends Resource {

    protected static ?string $model = Order::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCurrencyEuro;

    protected static string|\UnitEnum|null $navigationGroup = 'Eshop';

    public static function getNavigationBadge(): ?string {
        return static::getModel()::where('order_status_id', 'processing')
            ->count();
    }

    public static function form(Schema $schema): Schema {
        return OrderForm::configure($schema);
    }

    public static function table(Table $table): Table {
        return OrdersTable::configure($table);
    }

    public static function getRelations(): array {
        return [
            ItemsRelationManager::class,
            CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array {
        return [
            'index' => ListOrders::route('/'),
            'create' => CreateOrder::route('/create'),
            'edit' => EditOrder::route('/{record}/edit'),
        ];
    }

    public static function canDelete(Model $record): bool {
        return FALSE;
    }

}
