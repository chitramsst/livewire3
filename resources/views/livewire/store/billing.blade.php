<div class="ltr:flex flex-1 rtl:flex-row-reverse">
    <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-230px)] px-4 pt-[54px] duration-300">
        <div class="xl:w-full">
            <div class="flex flex-wrap">
                <div class="flex items-center py-4 w-full">
                    <div class="w-full">
                        <div class="">
                        <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">{{$this->translate('billing')}}</h1>
                                    <ol class="list-reset flex text-sm">
                                        <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate('home')}}</a></li>
                                        <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                        <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">{{$this->translate('billing')}}</li>
                                    </ol>
                                </div>
                                <div class="flex items-center">
                                    <a wire:click.prevent="renew"  data-fc-type="modal" data-fc-target="modalcenter" class="px-2 flex items-center gap-1 py-1 lg:px-4 bg-transparent  text-primary text-sm  rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                        </svg>
                                        {{$this->translate('renew')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14 ">
            <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
                    <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                        <div class="grid grid-cols-1 p-4">
                            <div class="sm:-mx-6 lg:-mx-8">
                                <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                    <div class="">
                                        @if(count($transactions) > 0)
                                        <table class="w-full">
                                            <thead class="bg-gray-50 dark:bg-gray-700/20">
                                                <tr>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        #
                                                    </th>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    {{$this->translate('date')}}
                                                    </th>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    {{$this->translate('payed_by')}}
                                                    </th>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    {{$this->translate('plan')}}
                                                    </th>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    {{$this->translate('amount')}}
                                                    </th>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    {{$this->translate('valid_till')}}
                                                    </th>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    {{$this->translate('payment_method')}}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transactions as $item)
                                                <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        <span class="text-slate-700 dark:text-slate-400 text-[13px] font-medium">{{$loop->index + 1}}</span>
                                                    </td>
                                                    <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                        <div class="flex items-center">
                                                            <div class="self-center">
                                                                <h5 class="text-sm font-semibold text-slate-700 dark:text-gray-400">
                                                                    {{$item->created_at->format('d/m/Y')}}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                        <img src="assets/images/users/avatar-1.png" alt="" class="mr-2 h-8 rounded-full inline-block">
                                                        <span>{{$item->user->name}}</span>
                                                    </td>
                                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        <span class="bg-gray-500/10 text-gray-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">{{$item->subscription?->name}}</span>
                                                    </td>
                                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        <span class="text-slate-700 dark:text-slate-400 text-[13px] font-medium">{{getCurrencyFormat($item->amount)}}</span>
                                                    </td>
                                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        <span class="text-slate-700 dark:text-slate-400 text-[13px] font-medium">{{Carbon\Carbon::parse($item->valid_till)->format('d/m/Y h:i A')}}</span>
                                                    </td>
                                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        <span class="text-slate-700 dark:text-slate-400 text-[13px] font-medium">{{getPaymentTypeMethod($item->payment_method)}}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <x-empty-component title="{{$this->translate('som_empty')}}" message="{{$this->translate('empty_transaction_note')}}." />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 -left-4 -right-4 block print:hidden ">
                <div class="">
                    <livewire:components.footer />
                </div>
            </div>
        </div>
    </div>
</div>