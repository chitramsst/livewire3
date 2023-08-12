<div x-data="alpineQrCode">
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
                                        <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">
                                            {{ $this->translate('qr_code') }}</h1>
                                        <ol class="list-reset flex text-sm">
                                            <li><a href="#"
                                                    class="text-gray-500 dark:text-slate-400">{{ $this->translate('home') }}</a>
                                            </li>
                                            <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                            <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">
                                                {{ $this->translate('qr_code') }}</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="min-h-[calc(100vh-138px)] overflow-y-auto">
                <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">

                    <div class="sm:col-span-12  md:col-span-12 lg:col-span-8 xl:col-span-6 xl:col-start-4 ">
                        <div
                            class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
                            <div
                                class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                                <div class="flex-none md:flex">
                                    <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">
                                        {{ $this->translate('qr_code') }}</h4>
                                </div>
                            </div>
                            <div class="flex-auto p-4 h-[calc(100vh-20rem)] flex justify-center items-center">
                                <div class="flex flex-col gap-3 items-center">
                                    <div class="qr-code-container">
                                        {!! QrCode::size(300)->generate(route('guest.home', Auth::user()->store->slug)) !!}
                                    </div>
                                    <div class="p-3 mt-2 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
                                        role="alert">
                                        <a href="{{ route('guest.home', Auth::user()->store->slug) }}" target="__blank"
                                            class="font-medium">{{ route('guest.home', Auth::user()->store->slug) }}</a>
                                    </div>
                                    <div class="">
                                        <button type="button" @click="downloadFile"
                                            class="px-2 py-1 lg:px-4 bg-transparent  text-primary text-sm  rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium mb-2">{{$this->translate('download')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>