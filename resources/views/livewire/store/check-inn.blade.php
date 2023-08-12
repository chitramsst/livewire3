<div class="ltr:flex flex-1 rtl:flex-row-reverse">
    <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-230px)] px-4 pt-[54px] duration-300">
        <div class="xl:w-full">
            <div class="flex flex-wrap">
                <div class="flex items-center py-4 w-full">
                    <div class="w-full">
                        <div class="">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">{{$this->translate('check_in')}}</h1>
                                    <ol class="list-reset flex text-sm">
                                        <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate('home')}}</a></li>
                                        <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                        <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">{{$this->translate('check_in')}}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14 ">
            <div class="grid md:grid-cols-1 gap-4 mb-4">
                @if (count($checkIns) > 0)
                    <div
                        class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative overflow-hidden">
                        <div class="grid grid-cols-1 p-4">
                            <div class="sm:-mx-6 lg:-mx-8">
                                <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                    <div class=" ">
                                        <table class="w-full">
                                            <thead class="bg-gray-50 dark:bg-gray-600/20">
                                                <tr>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        {{$this->translate('check_in_number')}} #
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        {{$this->translate('customer_name')}}
                                                    </th>
                                                    <th scope="col"
                                                        class="text-xs font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                                        {{$this->translate('no_of_rooms')}}
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        {{$this->translate('checkin_date')}}
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        {{$this->translate('checkout_date')}}
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        {{$this->translate('status')}}
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        {{$this->translate('actions')}}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($checkIns as $checkIn)
                                                    <tr
                                                        class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                                                        <td
                                                            class="p-2 text-sm font-medium whitespace-nowrap dark:text-white">
                                                            <div class="flex items-center">
                                                                <div class="self-center">
                                                                    <h5
                                                                        class="text-sm font-semibold text-slate-700 dark:text-gray-400">
                                                                        #{{ $checkIn->checkin_id }}</h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="p-2 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $checkIn->customer->name }}
                                                        </td>
                                                        <td
                                                            class="p-2 text-sm text-gray-500  dark:text-gray-400 whitespace-pre-line text-start">
                                                            {{ $checkIn->details->count() }}
                                                        </td>
                                                        <td
                                                            class="p-2 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ \Carbon\Carbon::parse($checkIn->checkin_date)->format('d/m/Y') }}
                                                        </td>
                                                        <td
                                                            class="p-2 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ \Carbon\Carbon::parse($checkIn->checkout_date)->format('d/m/Y') }}
                                                        </td>
                                                        <td
                                                            class="p-2 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            <span
                                                                class="bg-green-600/5 text-green-500 text-[11px] font-medium px-2.5 py-0.5 rounded h-5">Active</span>
                                                        </td>
                                                        <td
                                                            class="p-2 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            <div class="w-full">
                                                                <div class="flex justify-start gap-3">
                                                                    <a type="button"
                                                                        href="{{ route('store.view-check-in', $checkIn->id) }}"
                                                                        class="text-primary-700 border  shrink-0 hover:bg-primary-600 hover:text-white  focus:outline-none font-medium rounded-full text-sm p-2 text-center inline-flex items-center dark:border-primary-500 dark:text-primary-500 dark:hover:text-white mb-2">
                                                                        <i class="fas fa-arrow-right"></i>
                                                                    </a>
                                                                    <button type="button"
                                                                        class="text-red-700 border shrink-0 hover:bg-red-600 hover:text-white  focus:outline-none font-medium rounded-full text-sm p-2 text-center inline-flex items-center dark:border-primary-500 dark:text-red-500 dark:hover:text-red mb-2">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <x-empty-component title="{{$this->translate('so_empty')}}" message="{{$this->translate('no_checkins_have_been_created')}}." />
                @endif
                <div class="absolute bottom-0 -left-4 -right-4 block print:hidden ">
                    <div class="">
                        <livewire:components.footer />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
