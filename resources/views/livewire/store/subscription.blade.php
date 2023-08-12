<div class="ltr:flex flex-1 rtl:flex-row-reverse">
    <div
        class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-230px)] px-4 pt-[54px] duration-300">
        <div class="xl:w-full">
            <div class="flex flex-wrap">
                <div class="flex items-center py-4 w-full">
                    <div class="w-full">
                        <div class="">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">{{$this->translate('subscription')}}</h1>
                                    <ol class="list-reset flex text-sm">
                                        <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate('home')}}</a></li>
                                        <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                        <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">
                                            {{$this->translate('subscription')}}
                                        </li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14 ">
            <!-- <div class="grid grid-cols-12 md:grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-4 lg:col-span-3 mb-4">
                    <div
                        class="bg-primary-600 rounded-md p-8 text-center bg-[url('../images/widgets/web-bg.png')] bg-cover">
                        <h3 class="text-[30px] font-medium text-white mb-2">52021</h3>
                        <p class="uppercase text-lg text-slate-200 mb-4">Organic Search</p>
                        <p class="text-base text-slate-300 px-5">Measures your user's sources that generate traffic
                            metrics to your
                            website for this month</p>
                        <button type="button"
                            class="px-2 py-1 lg:px-4  text-sm font-medium mt-6  focus:outline-none  rounded transition border border-gray-100 bg-gray-100 text-blue-700 dark:bg-gray-100 dark:text-blue-700 focus:z-10  dark:border-gray-100 ">Learn
                            More</button>
                    </div>
                </div>
            </div> -->
            <div class="grid sm:grid-cols-2 md:grid-cols-4  xl:grid-cols-5 gap-4">
                @foreach($subscriptions as $row)
                <div class="p-4 shadow rounded-xl bg-white">
                    <div class="w-full flex items-center">
                        <div class="flex flex-col gap-2">
                            <span class="text-4xl font-extrabold">{{getCurrencyFormat($row->amount)}} <span class="text-xs font-medium"> /
                            {{getSubscriptionType($row->type)}}</span></span>
                            <span class="text-lg font-semibold text-gray-600">{{$row->name}}</span>
                        </div>
                    </div>
                    <div class="w-full mt-6">
                        <ul role="list" class="mb-8 space-y-4 text-left">
                            @php
                              $features = explode(',', $row->features);
                            @endphp
                        @foreach( $features as $feature)
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>{{$feature}}</span>
                            </li>
                            
                            @endforeach
                        </ul>
                    </div>
                    <div class="w-full flex justify-center">
                        <a href="{{route('store.checkout',$row->id)}}"
                            class="text-white bg-primary-600 hover:bg-primary-700 outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full"> {{$this->translate('get_started')}}</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="absolute bottom-0 -left-4 -right-4 block print:hidden ">
                <div class="">
                    <livewire:components.footer/>
                </div>
            </div>
        </div>
    </div>
</div>