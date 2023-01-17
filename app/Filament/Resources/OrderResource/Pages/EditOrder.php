<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;

use App\Mail\OrderCompletedCustomer;
use App\Mail\OrderCreatedCustomer;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // dd($data);
        $data['order_total']= $data['order_total'] * 100;
        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['order_total'] = $data['order_total'] / 100;
        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if($data['order_status_id'] == 'completed') {
            Mail::to($data['primary_email'])->send(new OrderCompletedCustomer());
        }

        $record->update($data);

        return $record;
    }
}
