<div x-data="alpinePages">
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
                                        <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">{{$this->translate('pages')}}</h1>
                                        <ol class="list-reset flex text-sm">
                                            <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate('home')}}</a>
                                            </li>
                                            <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                            <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">
                                            {{$this->translate('pages')}} </li>
                                        </ol>
                                    </div>
                                    <div class="flex items-center">
                                        <a href="{{ route('store.rooms') }}"
                                            class="px-2 py-1 lg:px-4 bg-transparent  text-primary text-sm  rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium mb-2">{{$this->translate('back')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:w-full   min-h-[calc(100vh-138px)] relative pb-14 ">
                <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4 min-h-[calc(100vh-13rem)]"
                    id="container">
                    <div class="flex-auto p-4 " wire:ignore>
                        <form>
                            <div class="grid grid-cols-6 gap-2">
                                <div class="col-span-6">
                                    <div class="mb-2  flex flex-col">
                                        <label for="name"
                                            class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('privacy_policy')}}
                                        </label>
                                        <div class="no-tailwindcss-base">
                                            <div name="privacy" id="privacy" class="h-[20rem]"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <div class="mb-2 flex flex-col">
                                        <div class="no-tailwindcss-base">
                                            <label for="name"
                                                class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('terms_and_conditions')}}</label>
                                            <div name="terms" id="terms" class="h-[20rem]"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" wire:click.prevent="save"
                                    class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded mb-1">
                                    {{$this->translate('save')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>