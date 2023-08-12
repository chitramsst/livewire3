<div class="ltr:flex flex-1 rtl:flex-row-reverse" x-data="viewCheckIn">
    <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-230px)] px-4 pt-[54px] duration-300">
        <div class="xl:w-full">
            <div class="flex flex-wrap">
                <div class="flex items-center py-4 w-full">
                    <div class="w-full">
                        <div class="">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <div class="font-bold text-3xl mb-1">
                                        {{$this->translate('check_in')}} #{{ $checkIn->checkin_id }}
                                    </div>
                                    <ol class="list-reset flex text-sm">
                                        <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate('home')}}</a></li>
                                        <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                        <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate('check_in')}}</a>
                                        </li>
                                        <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                        <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">{{$this->translate('view')}} -
                                            #{{ $checkIn->checkin_id }}</li>
                                    </ol>
                                </div>
                                <div class="flex items-center">
                                    <a href="{{ route('store.check-inn') }}"
                                        class="px-2 py-1 lg:px-4 bg-transparent  text-primary text-sm  rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium mb-2">{{$this->translate('view')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14 flex gap-4 ">
           
            <div class="w-full flex  ">
                <div class="p-5 h-full w-full flex flex-col border rounded-lg mt-4">
                    <div class="w-full flex justify-between">
                        <div class=""></div>
                        <div class="">
                        </div>
                    </div>
                    <div class="">
                        <div class="">
                            <p class="font-semibold text-lg text-neutral-800">{{$this->translate('checkin_details')}}</p>
                        </div>
                        <div class="flex gap-11 justify-between">
                            <div class="grid grid-cols-2 text-sm mt-2 gap-2 ">
                                <div class="flex gap-2">
                                    <div class="text-neutral-600">{{$this->translate('check_in_date')}} :</div>
                                </div>
                                <div class="text-end">
                                    {{ \Carbon\Carbon::parse($checkIn->checkin_date)->format('d/m/Y') }}</div>
                                <div class="flex gap-2">
                                    <div class="text-neutral-600">{{$this->translate('check_out_date')}} :</div>
                                </div>
                                <div class="text-end">
                                    {{ \Carbon\Carbon::parse($checkIn->checkout_date)->format('d/m/Y') }}</div>
                                <div class="flex gap-2 ">
                                    <div class="text-neutral-600">{{$this->translate('total_occupants')}} :</div>
                                </div>
                                <div class="text-end">{{ $checkIn->details->sum('occupants') }}</div>
                            </div>
                            <div class="grid grid-cols-2 text-sm mt-2 ">
                                <div class="flex gap-2">
                                    <div class="text-neutral-600">{{$this->translate('customer_name')}} :</div>
                                </div>
                                <div class="text-end">{{ $checkIn->customer?->name }}</div>
                                <div class="flex gap-2">
                                    <div class="text-neutral-600">{{$this->translate('customer_phone')}} :</div>
                                </div>
                                <div class="text-end">{{ $checkIn->customer?->phone }}</div>
                                <div class="flex gap-2">
                                    <div class="text-neutral-600">{{$this->translate('customer_email')}} :</div>
                                </div>
                                <div class="text-end">{{ $checkIn->customer?->email }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="mb-2">
                            <p class="font-semibold text-lg text-neutral-800">{{$this->translate('room_details')}}</p>
                        </div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-700 dark:text-gray-400 ">
                                <tr>
                                    <th scope="col" class=" py-3 ">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3 ">
                                        {{$this->translate('room')}}
                                    </th>
                                    <th scope="col" class="py-3 text-start">
                                        {{$this->translate('occupants')}}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right w-auto md:w-[18%]">
                                        {{$this->translate('rate')}}
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checkIn->details as $room)
                                    <tr
                                        class="border-b dark:bg-gray-800 dark:border-slate-700 odd:bg-white even:bg-gray-50 odd:dark:bg-slate-800 even:dark:bg-slate-700">
                                        <td class=" py-2 text-start">
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <th scope="row"
                                            class="px-4 py-2 text-gray-900 dark:text-white whitespace-nowrap">
                                            <h5 class=" text-sm font-medium">{{ $room->room_name }}</h5>
                                        </th>
                                        <td class=" py-2 text-start">
                                            {{ $room->occupants }}
                                        </td>
                                        <td class="px-4 py-2 text-right">
                                            {{ getCurrencyFormat($room->price) }}
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr class="border-b dark:border-gray-700 ">
                                    <td></td>
                                    <th scope="row"
                                        class="px-4 py-2 text-gray-900 dark:text-white whitespace-nowrap">
                                    </th>
                                    <td class=" py-2 text-start">
                                        <span class="font-bold text-slate-600 dark:text-slate-400">{{$this->translate('base_room_rate')}}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        <span
                                            class="font-bold text-slate-600 dark:text-slate-300 ">{{ getCurrencyFormat($checkIn->room_rate) }}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right print:hidden">
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-gray-700 ">
                                    <td></td>
                                    <th scope="row"
                                        class="px-4 py-2 text-gray-900 dark:text-white whitespace-nowrap">
                                    </th>
                                    <td class=" py-2 text-start">
                                        <span class="font-bold text-slate-600 dark:text-slate-400">{{$this->translate('no_of_nights')}}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        <span
                                            class="font-bold text-slate-600 dark:text-slate-300">{{ $checkIn->no_of_nights }}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right print:hidden">
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-gray-700 ">
                                    <td></td>
                                    <th scope="row"
                                        class="px-4 py-2 text-gray-900 dark:text-white whitespace-nowrap">
                                    </th>
                                    <td class=" py-2 text-start">
                                        <span class="font-bold text-slate-600 dark:text-slate-400">{{$this->translate('original_price')}}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        <span
                                            class="font-bold text-slate-600 dark:text-slate-300">{{ getCurrencyFormat($checkIn->sub_total) }}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right print:hidden">
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-gray-700 ">
                                    <td></td>
                                    <th scope="row"
                                        class="px-4 py-2 text-gray-900 dark:text-white whitespace-nowrap">
                                    </th>
                                    <td class=" py-2 text-start">
                                        <span class="font-bold text-slate-600 dark:text-slate-400">{{$this->translate('tax')}}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        <span
                                            class="font-bold text-slate-600 dark:text-slate-300">{{ getCurrencyFormat($checkIn->hotel_tax) }}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right print:hidden">
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-gray-700 ">
                                    <td></td>
                                    <th scope="row"
                                        class="px-4 py-2 text-gray-900 dark:text-white whitespace-nowrap">
                                    </th>
                                    <td class=" py-2 text-start">
                                        <span class="font-bold text-slate-600 dark:text-slate-400">{{$this->translate('fees')}}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        <span
                                            class="font-bold text-slate-600 dark:text-slate-300">{{ getCurrencyFormat($checkIn->hotel_fees) }}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right print:hidden">
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-gray-700 ">
                                    <td></td>
                                    <th scope="row"
                                        class="px-4 py-2 text-gray-900 dark:text-white whitespace-nowrap">
                                    </th>
                                    <td class=" py-2 text-start">
                                        <span class="font-bold text-xl text-slate-600 dark:text-slate-400">{{$this->translate('total')}}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        <span
                                            class="font-bold text-slate-600 dark:text-slate-300 text-xl">{{ getCurrencyFormat($checkIn->total) }}</span>
                                    </td>
                                    <td class="px-4 py-2 text-right print:hidden">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5 ">
                        <div class="w-full flex justify-between">
                            @if(file_exists(public_path('uploads/' . $checkIn->id_proof)))
                            <div class="flex gap-2 items-center">
                                <a type="button" href="{{ asset('uploads/' . $checkIn->id_proof) }}" download
                                    class="text-blue-700 border grow-0 shrink-0 hover:bg-blue-600 hover:text-white  focus:outline-none font-medium rounded-full text-sm h-8 w-8 flex justify-center text-center items-center dark:border-primary-500 dark:text-red-500 dark:hover:text-red">
                                    <i class="fas fa-arrow-down"></i>
                                </a>
                                <div class="font-semibold">{{$this->translate('download_id_proof')}}</div>
                            </div>
                            @else
                            <div class=""></div>
                            @endif
                            <div class="">
                                <div class="mt-5 w-[20rem] ">
                                    <div class="">
                                        <small class="dark:text-slate-400 text-center">{{$this->translate('customer')}}</small>
                                        <div class="w-full flex justify-center">
                                            <img src="{{ asset('uploads/' . $checkIn->signature) }}" alt=""
                                                class="mt-2 mb-1 h-12 object-cover">
                                        </div>
                                        <p
                                            class="border-t border-dashed border-slate-400 dark:text-slate-400 text-center">
                                            {{$this->translate('signature')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-[30%] h-full">
                <div class="p-5 h-full w-full flex flex-col border rounded-lg mt-4">
                    <div class="w-full flex justify-between">
                        <div class=""></div>
                        <div class="">
                        </div>
                    </div>
                    <div class="">
                        <div class="">
                            <p class="font-semibold text-lg text-neutral-800">{{$this->translate('payment_details')}}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 text-sm mt-2 gap-2 ">
                        <div class="flex gap-2">
                            <div class="text-neutral-600">{{$this->translate('status')}} :</div>
                        </div>
                        <div class="text-end text-xs flex justify-end">
                            @if($remaining_balance <= 0)
                            <span class="bg-green-500 text-white text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded-full">{{$this->translate('paid')}}</span>
                            @elseif($remaining_balance > 0 && $remaining_balance != $checkIn->total)
                            <span class="bg-indigo-500 text-white text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded-full ">{{$this->translate('partially_paid')}}</span>
                            @else
                            <span class="bg-red-500 text-white text-[11px] font-medium px-2.5 py-0.5 rounded-full ">{{$this->translate('unpaid')}}</span>
                            @endif
                        </div>
                        <div class="flex gap-2">
                            <div class="text-neutral-600">{{$this->translate('total_paid')}} :</div>
                        </div>
                        <div class="text-end text-xs">
                            {{getCurrencyFormat($total_paid)}}
                        </div>
                        <div class="flex gap-2">
                            <div class="text-neutral-600">{{$this->translate('remaining_balance')}} :</div>
                        </div>
                        <div class="text-end text-xs">
                            {{getCurrencyFormat($remaining_balance)}}
                        </div>
                    </div>
                    @if($remaining_balance > 0)
                    <div class="mt-2">
                        <div class="">
                            <p class="font-semibold text-sm text-neutral-600">{{$this->translate('actions')}}</p>
                        </div>
                    </div>
                    <div class="mt-2 flex items-center gap-2 w-full">
                        <button type="button" wire:click="fullPayment" @click="hidePartialPay" class="px-2 py-1 lg:px-4  grow bg-transparent  text-green text-sm  rounded transition hover:bg-green-600 hover:text-white border border-green font-medium mb-2">Full Pay</button>
                        <button type="button" @click="clickPartialyPay" class="px-2 py-1 lg:px-4 bg-transparent grow text-blue text-sm  rounded transition hover:bg-blue-600 hover:text-white border border-blue font-medium mb-2">Pay Partially</button>
                    </div>
                    <div class="mt-1" x-show="showActionExtend" x-cloak x-transition>
                        <div class="flex">                            
                            <input type="text"  x-ref="paymentinput" wire:model="amount" aria-describedby="button-addon2" class="rounded-none rounded-l-md bg-gray-50/5 border border-gray-200 text-gray-900 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm  p-2.5  dark:bg-slate-800 dark:border-slate-600 dark:placeholder-gray-400 dark:text-white  dark:focus:border-blue-400 focus-visible:outline-none" placeholder="Enter amount">
                            <button wire:click="addPayment" type="button" @click="focusInput" class="copy_cut inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-r-0 border border-l-0 border-gray-300 dark:bg-slate-700 dark:text-gray-400 dark:border-slate-600">
                                Pay 
                            </button>
                        </div>
                        @error('amount') <span class="text-danger text-red-500">{{$message}}</span> @enderror
                    </div>
                    @endif
                    <div class="mt-2">
                        <div class="">
                            <p class="font-semibold text-sm text-neutral-600">{{$this->translate('payments')}}</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        @if(count($payments) > 0)
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-700 dark:text-gray-400 ">
                                <tr>
                                    <th scope="col" class=" py-3 px-3">
                                        #
                                    </th>
                                    <th scope="col" class=" py-3 ">
                                        {{$this->translate('date')}}
                                    </th>
                                    <th scope="col" class="py-3 ">
                                        {{$this->translate('amount')}}
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr class="border-b dark:border-gray-700 ">
                                        <td class=" py-2 text-start px-3">
                                            <span class=" text-slate-600 dark:text-slate-400">{{$loop->index +1 }}</span>
                                        </td>
                                        <td class=" py-2 text-start">
                                            <span class=" text-slate-600 dark:text-slate-400">{{\Carbon\Carbon::parse($payment->created_at)->format('d/m/Y')}}</span>
                                        </td>
                                        <td class=" py-2 text-start">
                                            <span class=" text-slate-600 dark:text-slate-400">{{getCurrencyFormat($payment->amount)}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="w-full text-center text-xs text-slate-500">{{$this->translate('no_payment_note')}}.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>