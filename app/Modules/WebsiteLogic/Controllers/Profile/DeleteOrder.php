<?php

namespace App\Modules\WebsiteLogic\Controllers\Profile;

use App\Models\User;
use App\Modules\ClientsLogic\Models\Client;
use App\Modules\OrdersLogic\Models\Order;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteOrder
{
    use AsAction;


    public function handle(ActionRequest $request, Order $order)
    {
        $order->update(['status' => 'canceled' , 'details' => $order->details .'- Le client annule la commande']);
    }

    public function asController(ActionRequest $request, Order $order)
    {
        if($order != 'completed'){
            $this->handle($request,$order);
            Session::flash('message',"la commande a été annulée avec succès");   
        }else{
            Session::flash('error',"commande déjà livrée, pas moyen de l'annuler");    
        }

        return redirect()->route('client.account','#step3');
     
    }


}
