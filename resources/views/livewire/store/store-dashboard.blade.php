<div class="ltr:flex flex-1 rtl:flex-row-reverse" x-data="alpineStoreDashboard">
    <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-230px)] px-4 pt-[54px] duration-300">
        <div class="xl:w-full">
            <div class="flex flex-wrap">
                <div class="flex items-center py-4 w-full">
                    <div class="w-full">
                        <div class="">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">{{$this->translate('dashboard')}}</h1>
                                    <ol class="list-reset flex text-sm">
                                        <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">
                                        {{$this->translate('dashboard')}}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14 ">
            <div class="grid grid-cols-12 md:grid-cols-12 lg:grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                    <div
                        class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative p-4 mb-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-700 font-medium dark:text-slate-400">{{$this->translate('total_checkins')}}</p>
                                <h3 class="my-1 font-semibold text-2xl dark:text-slate-200">{{ $total_checkins }}</h3>
                            </div>
                            <div class="self-center">
                                <div
                                    class="h-12 w-12 bg-primary-500/5  rounded-full group-hover:text-white transition-all duration-500 ease-in-out text-3xl flex align-middle justify-center items-center">
                                    <i class="ti ti-users text-2xl text-primary-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                    <div
                        class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative p-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-700 font-medium dark:text-slate-400">{{$this->translate('available_rooms')}}</p>
                                <h3 class="my-1 font-semibold text-2xl dark:text-slate-200">{{ $available_rooms }}</h3>
                            </div>
                            <div class="self-center">
                                <div
                                    class="h-12 w-12 bg-orange-500/5  rounded-full group-hover:text-white transition-all duration-500 ease-in-out text-3xl flex align-middle justify-center items-center">
                                    <i class="ti ti-home text-2xl text-orange-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                    <div
                        class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative p-4 mb-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-700 font-medium dark:text-slate-400">{{$this->translate('rooms_checked')}}</p>
                                <h3 class="my-1 font-semibold text-2xl dark:text-slate-200">{{ $rooms_checked }}</h3>
                            </div>
                            <div class="self-center">
                                <div
                                    class="h-12 w-12 bg-green-500/5  rounded-full group-hover:text-white transition-all duration-500 ease-in-out text-3xl flex align-middle justify-center items-center">
                                    <i class="ti ti-clock text-2xl text-green-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                    <div
                        class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative p-4 mb-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-700 font-medium dark:text-slate-400">{{$this->translate('pending_housekeeping_requests')}}
                                </p>
                                <h3 class="my-1 font-semibold text-2xl dark:text-slate-200">
                                    {{ $pending_house_keeping_requests }}</h3>
                            </div>
                            <div class="self-center">
                                <div
                                    class="h-12 w-12 bg-yellow-500/5  rounded-full group-hover:text-white transition-all duration-500 ease-in-out text-3xl flex align-middle justify-center items-center">
                                    <i class="ti ti-brush text-2xl text-yellow-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">

                <div class="col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-6">
                    <div
                        class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
                        <div
                            class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                            <h4 class="font-medium">{{$this->translate('audience_overview')}}</h4>
                        </div>
                        <div class="flex-auto p-4">
                            <div class="chart-container">
                                <div id="payment-chart" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 ">
                    <div
                        class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
                        <div
                            class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                            <h4 class="font-medium">{{$this->translate('overdue_checkouts')}}</h4>
                        </div>
                        <div class="grid grid-cols-1 p-4 w-full">
                            <div class="sm:-mx-6 lg:-mx-8 h-full w-full ">

                                <div
                                    class="relative overflow-x-auto block w-full sm:px-6 lg:px-8 h-full min-h-[21.9rem]">
                                    @if (count($overdue_rooms) > 0)
                                        <table class="w-full">
                                            <thead class="bg-gray-50 dark:bg-slate-700/20">
                                                <tr>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        {{$this->translate('check_in')}} #
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        {{$this->translate('room')}}
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        {{$this->translate('customer_name')}}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($overdue_rooms as $item)
                                                    <tr
                                                        class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                                                        <td
                                                            class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                            <a href="" class="text-blue-500">#{{$item['check_in_number']}}</a>
                                                        </td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{$item['room']}}
                                                        </td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{$item['customer_name']}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="h-full w-full flex justify-center items-center min-h-[21.9rem]">
                                            <p>{{$this->translate('no_rooms_are_overdue')}}</p>
                                        </div>
                                    @endif

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
