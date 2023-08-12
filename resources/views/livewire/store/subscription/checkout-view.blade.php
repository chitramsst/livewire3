<div class="ltr:flex flex-1 rtl:flex-row-reverse w-full">
    <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-230px)] px-4 pt-[54px] duration-300">
        <div class="xl:w-full">
            <div class="flex flex-wrap">
                <div class="flex items-center py-4 w-full">
                    <div class="w-full">
                        <div class="">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">{{$this->translate('checkout')}}</h1>
                                    <ol class="list-reset flex text-sm">
                                        <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate('home')}}</a></li>
                                        <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                        <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate('subscription')}}</a></li>
                                        <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                        <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">
                                        {{$this->translate('checkout')}}
                                        </li>
                                    </ol>
                                </div>
                                <div class="flex items-center">
                                    <a href="{{ route('store.subscription') }}"
                                        class="px-2 py-1 lg:px-4 bg-transparent  text-primary text-sm  rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium mb-2">{{$this->translate('back')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="min-h-[calc(100vh-138px)] relative pb-14  flex justify-between w-full">
            <div class="w-full flex justify-center items-center">
                <div class="h-full flex justify-between gap-8 w-[100%] ">
                    <div class="w-full flex flex-col">
                        <div class="w-full text-xl font-semibold  ">{{$this->translate('payment_gateways')}}</div>
                        @if(getPaypalActiveStatus()==1)
                        <a class="hover:cursor-pointer flex gap-2 items-center mt-4 w-full p-3 rounded-lg hover:bg-neutral-50  border border-neutral-200 justify-between" wire:click.prevent="paymentRedirect(1)">
                            <div class="flex gap-3 items-center" >
                                <img src="{{asset('assets/images/paymentLogos/paypal.png')}}" class="w-9 h-9" alt="">
                                <div class="text-xl">
                                    <p class="text-xl dark:text-white">{{$this->translate('paypal')}}</p>
                                </div>
                            </div>
                        </a>
                        @endif
                        @if(getRazorpayActiveStatus()==1)
                        <a class="hover:cursor-pointer flex gap-2 items-center mt-4 w-full p-3 rounded-lg hover:bg-neutral-50  border border-neutral-200 justify-between" wire:click.prevent="paymentRedirect(2)">
                            <div class="flex gap-3 items-center">
                                <img src="{{asset('assets/images/paymentLogos/razorpay.png')}}" class="w-9 h-9" alt="">
                                <div class="text-xl ">
                                    <p class="text-xl dark:text-white">{{$this->translate('razorpay')}}</p>
                                </div>
                            </div>
                        </a>
                        @endif
                        @if(getPaystackActiveStatus()==1)
                        <a class="hover:cursor-pointer flex gap-2 items-center mt-4 w-full p-3 rounded-lg hover:bg-neutral-50  border border-neutral-200 justify-between" wire:click.prevent="paymentRedirect(3)">
                            <div class="flex gap-3 items-center">
                                <img src="{{asset('assets/images/paymentLogos/paystack.png')}}" class="w-9 h-9" alt="">
                                <div class="text-xl ">
                                    <p class="text-xl dark:text-white">{{$this->translate('paystack')}}</p>
                                </div>
                            </div>
                        </a>
                        @endif
                        @if(getFlutterwaveActiveStatus()==1)
                        <a class="hover:cursor-pointer flex gap-2 items-center mt-4 w-full p-3 rounded-lg hover:bg-neutral-50  border border-neutral-200 justify-between" wire:click.prevent="paymentRedirect(4)">
                            <div class="flex gap-3 items-center">
                                <img src="{{asset('assets/images/paymentLogos/flutterwave.png')}}" class="w-9 h-9" alt="">
                                <div class="text-xl ">
                                    <p class="text-xl dark:text-white">{{$this->translate('flutterwave')}}</p>
                                </div>
                            </div>
                        </a>
                        @endif
                    </div>
                    <div class="w-[60%]">
                        <div class="p-4 shadow rounded-xl bg-white shrink-0">
                            <div class="w-full flex items-center">
                                <div class="flex flex-col gap-2">
                                    <span class="text-4xl font-extrabold">{{getCurrencyFormat($subscription->amount)}} <span class="text-xs font-medium"> /
                                            {{getSubscriptionType($subscription->type)}}</span></span>
                                    <span class="text-lg font-semibold text-gray-600">{{$subscription->name}}</span>
                                </div>
                            </div>
                            <div class="w-full mt-6">
                                <ul role="list" class="mb-8 space-y-4 text-left">
                                    @php
                                    $features = explode(',', $subscription->features);
                                    @endphp
                                    @foreach( $features as $feature)
                                    <li class="flex items-center space-x-3">
                                        <!-- Icon -->
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>{{$feature}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 -left-4 -right-4 block print:hidden ">
                <div class="">
                    <livewire:components.footer/>
                </div>
            </div>
        </div>
    </div>
    @push('js')
    <script>
        "use strict"
        /* razorpay initialization */
        window.livewire.on('initiateRazorpay', (total, currencyCode, razorpayKey , transactionId) => {
            var options = {
                "key": razorpayKey,
                "amount": total,
                "currency": currencyCode,
                "name": @this.applicationName,
                "description": @this.description,
                "image": @this.logoUrl,
                "handler": function(response) {
                    if (response.razorpay_payment_id) {
                        @this.call('successRazorpay', response.razorpay_payment_id);
                    } else {
                        alert("error");
                    }
                },
                "prefill": {
                    "name": @this.prefillName,
                    "contact": @this.prefillContactNumber,
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        })
    </script>
    <script>
        /* paystack initialization */
        "use strict"
        Livewire.on('payWithPaystack', (amount) => {
            let handler = PaystackPop.setup({
                key: 'pk_test_d4f9824b28526f6981685c37fe817e37e29c764c',
                email: "chitra.xfortech@gmail.com",
                amount: amount * 100,
                ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                onClose: function() {
                    alert('Window closed.');
                },
                callback: function(response) {
                    let message = 'Payment complete! Reference: ' + response.reference;
                    @this.call('successPaystack', response);
                }
            });
            handler.openIframe();
        });
    </script>
    @endpush
</div>