<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Plan;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
      public function checkout(Request $request)
    {
        $anuncio = Anuncio::findOrFail($request->anuncio_id);
        $plan = Plan::findOrFail($request->plan_id);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mxn',
                    'product_data' => [
                        'name' => 'Plan premium: ' . $plan->descripcion,
                    ],
                    'unit_amount' => $plan->precio * 100, // en centavos
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success', [], true) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe.cancel'),
            'metadata' => [
                'anuncio_id' => $anuncio->id,
                'plan_id' => $plan->id,
            ],
        ]);

        return redirect($session->url);
    }

    
    public function success(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));

        $anuncio_id = $session->metadata->anuncio_id;
        $plan_id = $session->metadata->plan_id;

        $anuncio = Anuncio::findOrFail($anuncio_id);
        $plan = Plan::findOrFail($plan_id);

        $anuncio->is_premium = true;
        $anuncio->starts_at = now();
        $anuncio->ends_at = now()->addDays($plan->dias);
        $anuncio->premium_level = match ($plan->prioridad) {
            'alta' => 'oro',
            'media' => 'plata',
            'baja' => 'bronce',
        };
        $anuncio->save();

        return redirect()->route('anuncios.index')->with('message', 'Anuncio premium creado con éxito – ' . $plan->descripcion);
    }

    public function cancel()
    {
        return view('stripe.cancel');
    }
}
