<?php

namespace App\Http\Livewire\Store\Subscription;

use App\Http\Livewire\Traits\TranslationsTrait;
use Livewire\Component;
use App\Models\Subscription;
use App\Models\Transaction;
use Razorpay\Api\Api;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Exception;

class CheckoutView extends Component
{
    use TranslationsTrait;
    public $subscription, $paymentKey,  $applicationName, $description, $logoUrl, $prefillName, $prefillContactNumber, $paymentSecretKey, $processing = false;
    /* render the page */
    public function render()
    {
        return view('livewire.store.subscription.checkout-view')->layout('layouts.store');
    }
    /* initiate on mount */
    public function mount($id)
    {
        $this->subscription = Subscription::find($id);
        if ($this->subscription) {
        } else {
            abort(404);
        }
    }
    /* mode of payment redirection */
    public function paymentRedirect($id)
    {
        switch ($id) {
            case 1:
                /* paypal */
                $currencyCode = getPaypalCurrency();
                $this->paymentKey  = getPaypalKey();
                $this->paymentSecretKey = getPaypalSecretKey();
                /* currencycode availability checking for paypal*/
                if ($currencyCode != null) {
                    /* paypal key availability checking */
                    if ($this->paymentKey != null) {
                        /* paypal secretkey availability checking */
                        if ($this->paymentSecretKey != null) {
                            $amount = $this->subscription->amount;
                            $this->paymentPaypal();
                        } else {
                            $this->dispatchBrowserEvent('alert', [
                                'type' => 'error',
                                'message' => 'Please set paypal Secret Key.'
                            ]);
                        }
                    } else {
                        $this->dispatchBrowserEvent('alert', [
                            'type' => 'error',
                            'message' => 'Please set paypal Key.'
                        ]);
                    }
                } else {
                    $this->dispatchBrowserEvent('alert', [
                        'type' => 'error',
                        'message' => 'Please set paypal currency code.'
                    ]);
                }
                return;
            case 2:
                /* razorpay */
                $currencyCode = getRazorpayCurrency();
                $this->paymentKey  = getRazorpayKey();
                $this->paymentSecretKey = getRazorpaySecretKey();
                /* currencycode availability checking for razorpay*/
                if ($currencyCode != null) {
                    /* razorpay key availability checking */
                    if ($this->paymentKey != null) {
                        /* razorpay secretkey availability checking */
                        if ($this->paymentSecretKey != null) {
                            if ($this->processing == false) {
                                $transaction = new Transaction();
                                $transaction->user_id = Auth::user()->id;
                                $transaction->plan_name = $this->subscription->name;
                                $transaction->plan_id = $this->subscription->id;
                                $transaction->amount = $this->subscription->amount;
                                $transaction->billing_type = 2;
                                $transaction->transaction_id = $this->generateTransactionCode();
                                $transaction->status = Transaction::TRANSACTION_STATUS_PENDING;
                                $transaction->payment_method = Transaction::PAYMENT_TYPE_RAZORPAY;
                                $transaction->save();
                                $this->processing = true;
                            }
                            $amount = $this->subscription->amount * 100;
                            $this->applicationName = getApplicationName();
                            $this->description = "subscription payment";
                            $this->logoUrl = url(getSiteLogo());
                            $this->prefillName = Auth::user()->name;
                            $this->prefillContactNumber = Auth::user()->phone;
                            $this->emit('initiateRazorpay', $amount, $currencyCode, $this->paymentKey, $transaction->transaction_id);
                        } else {
                            $this->dispatchBrowserEvent('alert', [
                                'type' => 'error',
                                'message' => 'Please set razorpay Secret Key.'
                            ]);
                        }
                    } else {
                        $this->dispatchBrowserEvent('alert', [
                            'type' => 'error',
                            'message' => 'Please set razorpay Key.'
                        ]);
                    }
                } else {
                    $this->dispatchBrowserEvent('alert', [
                        'type' => 'error',
                        'message' => 'Please set razorpay currency code.'
                    ]);
                }
                return;
            case 3:
                /* paystack */
                $currencyCode = getPaypalCurrency();
                $this->paymentKey  = getPaystackKey();
                $this->paymentSecretKey = getPaystackKey();
                /* currencycode availability checking for paystack*/
                if ($currencyCode != null) {
                    /* paypal key availability checking */
                    if ($this->paymentKey != null) {
                        /* paypal secretkey availability checking */
                        if ($this->paymentSecretKey != null) {
                            if ($this->processing == false) {
                                $transaction = new Transaction();
                                $transaction->user_id = Auth::user()->id;
                                $transaction->plan_name = $this->subscription->name;
                                $transaction->plan_id = $this->subscription->id;
                                $transaction->amount = $this->subscription->amount;
                                $transaction->billing_type = 2;
                                $transaction->transaction_id = $this->generateTransactionCode();
                                $transaction->status = Transaction::TRANSACTION_STATUS_PENDING;
                                $transaction->payment_method = Transaction::PAYMENT_TYPE_PAYSTACK;
                                $transaction->save();
                                $this->processing = true;
                            }
                            $amount = $this->subscription->amount;
                            $this->emit('payWithPaystack', $amount);
                        } else {
                            $this->dispatchBrowserEvent('alert', [
                                'type' => 'error',
                                'message' => 'Please set paypal Secret Key.'
                            ]);
                        }
                    } else {
                        $this->dispatchBrowserEvent('alert', [
                            'type' => 'error',
                            'message' => 'Please set paypal Key.'
                        ]);
                    }
                } else {
                    $this->dispatchBrowserEvent('alert', [
                        'type' => 'error',
                        'message' => 'Please set paypal currency code.'
                    ]);
                }
                return;
            case 4:
                /* flutterwave */
                $currencyCode = getFlutterwaveCurrency();
                $this->paymentKey  = getFlutterwaveKey();
                $this->paymentSecretKey = getFlutterwaveSecretKey();
                /* currencycode availability checking for flutterwave*/
                if ($currencyCode != null) {
                    /* flutterwave key availability checking */
                    if ($this->paymentKey != null) {
                        /* flutterwave secretkey availability checking */
                        if ($this->paymentSecretKey != null) {
                            if ($this->processing == false) {
                                $transaction = new Transaction();
                                $transaction->user_id = Auth::user()->id;
                                $transaction->plan_name = $this->subscription->name;
                                $transaction->plan_id = $this->subscription->id;
                                $transaction->amount = $this->subscription->amount;
                                $transaction->billing_type = 2;
                                $transaction->transaction_id = $this->generateTransactionCode();
                                $transaction->status = Transaction::TRANSACTION_STATUS_PENDING;
                                $transaction->payment_method = Transaction::PAYMENT_TYPE_FLUTTERWAVE;
                                $transaction->save();
                                $this->processing = true;
                            }
                            $this->paymentFlutterwave();
                        } else {
                            $this->dispatchBrowserEvent('alert', [
                                'type' => 'error',
                                'message' => 'Please set Flutterwave Secret Key.'
                            ]);
                        }
                    } else {
                        $this->dispatchBrowserEvent('alert', [
                            'type' => 'error',
                            'message' => 'Please set Flutterwave Key.'
                        ]);
                    }
                } else {
                    $this->dispatchBrowserEvent('alert', [
                        'type' => 'error',
                        'message' => 'Please set Flutterwave currency code.'
                    ]);
                }
                return;
        }
    }
    /* razorpay success section */
    public function successRazorpay($payment_id)
    {
        $this->processing = false;
        $paymentSecretKey = getRazorpaySecretKey();
        $razorpay_payment_id = $payment_id;
        $api = new Api($this->paymentKey, $paymentSecretKey);
        $payment = $api->payment->fetch($razorpay_payment_id);
        if (!empty($razorpay_payment_id)) {
            /* fetch transaction status */
            try {
                $response = $api->payment->fetch($razorpay_payment_id)->capture(array('amount' => $payment['amount']));
                if ($response['captured'] == true) {
                    $transaction = Transaction::whereUserId(Auth::user()->id)->wherePaymentMethod(Transaction::PAYMENT_TYPE_RAZORPAY)->latest()->first();
                    if ($transaction) {
                        $transaction->payment_id = $response['id'];
                        $transaction->status = Transaction::TRANSACTION_STATUS_COMPLETE;
                        $transaction->save();
                        $this->saveSubscription($transaction);
                    }
                }
                $this->dispatchBrowserEvent('save', [
                    'type' => 'error',
                    'message' => "Payment Sent Successfully"
                ]);
            } catch (\Exception $e) {
                return redirect()->back();
            }
        }
    }
    /*paypal payment section */
    public function paymentPaypal()
    {
        $amount = $this->subscription->amount;
        $data = [
            'mode'    => getPaypalMode(),
            'sandbox' => [
                'client_id'         => getPaypalKey(),
                'client_secret'     => getPaypalSecretKey(),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => getPaypalKey(),
                'client_secret'     => getPaypalSecretKey(),
                'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
            ],
            'payment_action' => 'Sale',
            'currency'       => getPaypalCurrency(),
            'notify_url'     => '',
            'locale'         => 'en_US',
            'validate_ssl'   => true,
        ];
        $provider = new PayPalClient($data);
        $provider->setApiCredentials($data);
        $paypalToken = $provider->getAccessToken();
        $currencyCode = getPaypalCurrency();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('store.paypal.checkout'),
                // "cancel_url" => route('store.paypal.checkout'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $currencyCode,
                        "value" => $amount,
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            if ($this->processing == false) {
                $transaction = new Transaction();
                $transaction->user_id = Auth::user()->id;
                $transaction->plan_name = $this->subscription->name;
                $transaction->plan_id = $this->subscription->id;
                $transaction->amount = $this->subscription->amount;
                $transaction->billing_type = 2;
                $transaction->payment_id = $response['id'];
                $transaction->transaction_id = $this->generateTransactionCode();
                $transaction->status = Transaction::TRANSACTION_STATUS_PENDING;
                $transaction->payment_method = Transaction::PAYMENT_TYPE_PAYPAL;
                $transaction->save();
                $this->processing = true;
            }
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
        } else {
            return redirect()->route('store.dashboard');
        }
    }
    public function paypalCheckout()
    {
        $this->processing = false;
        $data = [
            'mode'    => getPaypalMode(),
            'sandbox' => [
                'client_id'         => getPaypalKey(),
                'client_secret'     => getPaypalSecretKey(),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => getPaypalKey(),
                'client_secret'     => getPaypalSecretKey(),
                'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
            ],
            'payment_action' => 'Sale',
            'currency'       => getPaypalCurrency(),
            'notify_url'     => '',
            'locale'         => 'en_US',
            'validate_ssl'   => true,
        ];
        $provider = new PayPalClient($data);
        $provider->setApiCredentials($data);
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder(request()->token);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $transaction = Transaction::whereUserId(Auth::user()->id)->wherePaymentMethod(Transaction::PAYMENT_TYPE_PAYPAL)->latest()->first();
            $this->subscription = Subscription::find($transaction->plan_id);
            if ($transaction) {
                $transaction->payment_id = $response['id'];
                $transaction->status = Transaction::TRANSACTION_STATUS_COMPLETE;
                $transaction->save();
                $this->saveSubscription($transaction);
            }

            $this->dispatchBrowserEvent('alert-save', [
                'type' => 'success',
                'message' => 'Payment Sent successfully',
            ]);
            return redirect()->route('store.billing');
        } else {
            return redirect()->route('store.dashboard');
        }
    }
    /* paystack process */
    public function successPaystack($data)
    {
        $this->processing = false;
        if ($data['status'] == 'success') {
            $transaction = Transaction::whereUserId(Auth::user()->id)->wherePaymentMethod(Transaction::PAYMENT_TYPE_PAYSTACK)->latest()->first();
            if ($transaction) {
                $transaction->payment_id = $data['transaction'];
                $transaction->status = Transaction::TRANSACTION_STATUS_COMPLETE;
                $transaction->save();
                $this->saveSubscription($transaction);
            }
        }
        $this->dispatchBrowserEvent('save', [
            'type' => 'error',
            'message' => $data['status']
        ]);
        return redirect()->route('store.billing');
    }

    // save subscription
    public function saveSubscription($transaction)
    {


        $amount = $this->subscription->amount;
        $store = Auth::user();
        $expiry = null;
        //Add Day if plan type 1
        if ($this->subscription->type == 1) {
            //If store expired add date from today or add to the existing plan
            if ($this->isExpired($store)) {
                $expiry = Carbon::today()->addDays($this->subscription->duration)->endOfDay()->toDateString();
            } else {
                $expiry = Carbon::parse($store->store_expiry)->addDays($this->subscription->duration)->endOfDay()->toDateString();
            }
        }
        //Add Months if plan type 2
        elseif ($this->subscription->type == 2) {
            //If store expired add date from today or add to the existing plan
            if ($this->isExpired($store)) {
                $expiry = Carbon::today()->addMonths($this->subscription->duration)->endOfDay()->toDateString();
            } else {
                $expiry = Carbon::parse($store->store_expiry)->addMonths($this->subscription->duration)->endOfDay()->toDateString();
            }
        }
        //Add Years if plan type 3
        elseif ($this->subscription->type == 3) {
            //If store expired add date from today or add to the existing plan
            if ($this->isExpired($store)) {
                $expiry = Carbon::today()->addYear($this->subscription->duration)->endOfDay()->toDateString();
            } else {
                $expiry = Carbon::parse($store->store_expiry)->addYear($this->subscription->duration)->endOfDay()->toDateString();
            }
        }
        $transaction->valid_till = $expiry;
        $transaction->from = Carbon::today()->startOfDay();
        $store->store_expiry = Carbon::parse($expiry)->setTime(23, 59, 0);
        $store->save();
        $transaction->save();
    }

    //generate transaction code
    public function generateTransactionCode()
    {
        return (string) Str::uuid();
    }

    //Check if store has expired
    public function isExpired($data)
    {
        if (Carbon::now() >= $data->store_expiry) {
            return true;
        }
        return false;
    }
    /* flutterwave section */
    public function paymentFlutterwave()
    {
        $this->amount = $this->subscription->amount;
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $redirect_url = route('store.flutterwave.checkout');
        $key = getFlutterwaveKey();
        $currency = getFlutterwaveCurrency();
        $secretKey = getFlutterwaveSecretKey();
        try {
            $request = [
                'tx_ref' => time(),
                'amount' => $this->amount,
                'currency' => $currency,
                "public_key" => $key,
                'redirect_url' => $redirect_url,
                'customer' => [
                    'email' => $email,
                    'name' => $name,
                ],
                'meta' => [
                    'price' => $this->amount
                ],
                'customizations' => [
                    'title' => 'Paying for a service',
                    'description' => 'Subscription Payment'
                ]
            ];
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.flutterwave.com/v3/payments', //don't change this
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($request),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $secretKey,
                    'Content-Type: application/json'
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $res = json_decode($response);
            if ($res->status == 'success') {
                $link = $res->data->link;
                return redirect($link);
            } else {
                $this->dispatchBrowserEvent('alert-save', [
                    'type' => 'error',
                    'message' => 'Something went wrong. Please try again later.'
                ]);
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function flutterwaveCheckout()
    {
        $this->processing = false;
        $status = request()->status;
        $tx_ref = request()->tx_ref;
        $secretKey = getFlutterwaveSecretKey();
        //if payment is successful
        if ($status ==  'successful') {
            if (isset(request()->transaction_id)) {
                $transaction_id = request()->transaction_id;
                $query = array(
                    "SECKEY" => $secretKey,
                    "txref" => $tx_ref
                );
                $data_string = json_encode($query);
                $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                $response = curl_exec($ch);
                $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $header = substr($response, 0, $header_size);
                $body = substr($response, $header_size);
                curl_close($ch);
                $response = json_decode($response, true);
                if ($response['status'] == 'success') {
                    $paymentStatus = $response['data']['status'];
                    $chargeResponsecode = $response['data']['chargecode'];
                    $chargeAmount = $response['data']['amount'];
                    $chargeCurrency = $response['data']['currency'];
                    if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeCurrency == getFlutterwaveCurrency())) {
                        $transaction = Transaction::whereUserId(Auth::user()->id)->wherePaymentMethod(Transaction::PAYMENT_TYPE_FLUTTERWAVE)->latest()->first();
                        $this->subscription = Subscription::find($transaction->plan_id);
                        if ($transaction) {
                            $transaction->payment_id = $response['data']['paymentid'];
                            $transaction->status = Transaction::TRANSACTION_STATUS_COMPLETE;
                            $transaction->save();
                            $this->saveSubscription($transaction);
                        }
                        $this->dispatchBrowserEvent('alert-save', [
                            'type' => 'success',
                            'message' => 'Payment Sent successfully.'
                        ]);
                        return redirect()->route('store.billing');
                    } else {
                        $this->dispatchBrowserEvent('alert-save', [
                            'type' => 'error',
                            'message' => 'Something went wrong. Please contact Admin.'
                        ]);
                    }
                } else {
                    $this->dispatchBrowserEvent('alert-save', [
                        'type' => 'error',
                        'message' => 'Something went wrong. Please contact Admin.'
                    ]);
                }
            }
        } elseif ($status ==  'cancelled') {
            $this->dispatchBrowserEvent('alert-save', [
                'type' => 'error',
                'message' => 'Subscription updation Cancelled.'
            ]);
        } else {
            $this->dispatchBrowserEvent('alert-save', [
                'type' => 'error',
                'message' => 'Something went wrong. Please contact Admin.'
            ]);
        }
    }
}
