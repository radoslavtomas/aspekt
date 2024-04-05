<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Mail\OrderCompletedCustomer;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['order_total'] = $data['order_total'] * 100;
        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['order_total'] = $data['order_total'] / 100;
        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if (
            // only send email when order_status_id has changed to completed
            // ignore updates on other fields
            $record->getOriginal()['order_status_id'] != $data['order_status_id'] &&
            $data['order_status_id'] == 'completed'
        ) {
            // get formatted basket
            $basket = $record->items()->with('book')->get()->map(function ($item) {
                return [
                    'cover' => $item['book']['cover'],
                    'authors' => $item['book']['authors'],
                    'aspekt_price' => number_format($item['price'] / 100, 2).' €',
                    'title' => $item['title'],
                    'qty' => $item['qty']
                ];
            })->toArray();

            // send email
            Mail::to($data['primary_email'])->send(
                new OrderCompletedCustomer(
                    $basket,
                    $record['order_total']
                )
            );
        }

        $record->update($data);

        return $record;
    }
}
