<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        return view('subscriptions.index', [
            'intent'    => auth()->user()->createSetupIntent(),
            'plan'      => session('plan')
        ]);
    }

    public function store(Request $request)
    {
        $plan = session('plan');
        if(auth()->user()->subscribed('default'))
        {
            return redirect()->route('subscriptions.premium');
        }

        $request->user()
                ->newSubscription('default', $plan->stripe_id)
                ->create($request->token);

        return redirect()->route('subscriptions.premium');
    }

    public function premium()
    {
        return view('subscriptions.premium');
    }

    public function account()
    {
        $user           = auth()->user();
        $invoices       = $user->invoices();
        $subscription   = $user->subscription('default');

return view('subscriptions.account', [
            'user'          => $user,
            'invoices'      => $invoices,
            'subscription'  => $subscription,
        ]);

        // return view('subscriptions.account', [
        //     'user'          => $user,
        //     'invoices'      => $invoices,
        //     'subscription'  => $subscription,
        // ]);
    }

    public function invoiceDownload($invoiceId)
    {
        return Auth::user()->downloadInvoice($invoiceId, [
            'vendor'    => config('app.name'),
            'product'   => 'Assinatura VIP'
        ]);
    }

    public function cancel()
    {
        auth()->user()->subscription('default')->cancel();

        return redirect()->route('subscriptions.account');
    }

    public function resume()
    {
        auth()->user()->subscription('default')->resume();

        return redirect()->route('subscriptions.account');
    }
}
