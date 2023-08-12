<div>
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
                                        <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">{{$this->translate('feedbacks')}}</h1>
                                        <ol class="list-reset flex text-sm">
                                            <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate('home')}}</a>
                                            </li>
                                            <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                            <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">
                                            {{$this->translate('feedbacks')}}</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($feedbacks) > 0)
            <div class="w-full grid grid-cols-3 gap-3  min-h-[calc(100vh-138px)] relative pb-14 ">
                    @foreach ($feedbacks as $item)
                        <div
                            class="rounded  w-full col-span-1  border border-neutral-500/10 flex flex-col p-5 shadow-lg">
                            <div class="flex justify-between items-center">
                               
                            </div>
                            <div class="flex flex-col pt-2 text-neutral-600">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                      </svg>
                                                                            
                                    <div class="ml-2 text-lg">
                                        #{{ $item->checkin->checkin_id }}
                                    </div>
                                </div>
                                <div class="flex items-center mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <div class="ml-2 text-lg">
                                        {{ $item->customer->name }}
                                    </div>
                                </div>
                                <div class="flex  mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 shrink-0 mt-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                    </svg>
                                    <div class="ml-2 text-lg  ">
                                        {{ $item->message }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex text-xs justify-end pt-2 text-neutral-400">
                                {{ \Carbon\Carbon::parse($item->created_at)->fromNow() }}
                            </div>
                        </div>
                    @endforeach
            </div>
                @else
                    <x-empty-component title="{{$this->translate('so_empty')}}" message="{{$this->translate('no_feedbacks_have_been_created')}}." />
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
