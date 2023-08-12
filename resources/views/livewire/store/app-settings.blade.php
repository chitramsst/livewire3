<div class="ltr:flex flex-1 rtl:flex-row-reverse" x-data="alpineFacilities">
    <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-230px)] px-4 pt-[54px] duration-300">
        <div class="xl:w-full">
            <div class="flex flex-wrap">
                <div class="flex items-center py-4 w-full">
                    <div class="w-full">
                        <div class="">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">App Settings
                                    </h1>
                                    <ol class="list-reset flex text-sm">
                                        <li><a href="#" class="text-gray-500 dark:text-slate-400">Home</a>
                                        </li>
                                        <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                        <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">
                                            {{$this->translate('app_settings')}}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative mb-4">
            <div class="flex-auto p-4">
                <div class="grid grid-cols-4 gap-2">
                    <div class="col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2">
                        <div class="mb-2">
                            <label for="Name"
                                class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('name')}}<small
                                    class="text-red-600 text-sm">*</small></label>
                            <input
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                placeholder="{{$this->translate('name')}}" type="text" wire:model="name">
                            @error('name')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2">
                        <div class="mb-2">
                            <label for="Phone"
                                class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('phone')}}<small
                                    class="text-red-600 text-sm">*</small></label>
                            <input
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                placeholder="{{$this->translate('phone')}}" type="text" wire:model="phone">
                            @error('phone')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2">
                        <div class="mb-2">
                            <label for="Email"
                                class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('email')}}<small
                                    class="text-red-600 text-sm">*</small></label>
                            <input
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                placeholder="{{$this->translate('email')}}" type="text" wire:model="email">
                            @error('email')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="mb-2">
                            <label for="name" class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('store_logo')}}</label>
                            <input
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-[1px] focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                aria-describedby="user_avatar_help" id="user_avatar" type="file" wire:model="image">
                        </div>
                    </div>
                    <div class="col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2">
                        <div class="mb-2">
                            <label for="Tax Percentage"
                                class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('tax_percentage')}}<small
                                    class="text-red-600 text-sm">*</small></label>
                            <input
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                placeholder="{{$this->translate('tax_percentage')}}" type="text" wire:model="tax_percentage">
                            @error('tax_percentage')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2">
                        <div class="mb-2">
                            <label for="Store Fees" class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('store_fees')}}<small class="text-red-600 text-sm">*</small></label>
                            <input
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                placeholder="{{$this->translate('enter_store_fees')}}" type="text" wire:model="store_fees">
                            @error('store_fees')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-4">
                        <div class="mb-2">
                            <label for="address"
                                class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('address')}}<small
                                    class="text-red-600 text-sm">*</small></label>
                            <textarea rows="4"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                placeholder="{{$this->translate('address')}}" type="text" wire:model="address"></textarea>
                            @error('address')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-4">
                        <div class="mb-2">
                            <label for="description"
                                class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('description')}}<small
                                    class="text-red-600 text-sm">*</small></label>
                            <textarea rows="4"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                placeholder="{{$this->translate('description')}}" type="text" wire:model="description"></textarea>
                            @error('description')
                                <span class="error text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-4">
                        <div class="mb-2">
                            <div class="flex gap-2 items-center">
                                <label for="Facilities"
                                    class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('facilities')}}
                                    <small class="text-red-600 text-sm">*</small>
                                </label>
                                <div class="">
                                    <button class="px-2 outline-blue-500 outline text-blue-500 rounded-lg"
                                        data-fc-type="modal" data-fc-target="modalcenter" @click="clearInputs">{{$this->translate('add')}} </button>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-8 lg:grid-cols-8 xl:grid-cols-10 gap-4 mt-4">
                            <template x-for="fac in facilities"> 
                                <div class="">
                                    <div
                                        class="bg-white dark:bg-slate-800 shadow  rounded-md w-full h-full relative p-4">
                                        <div class="flex justify-center items-center flex-col text-center">
                                            <i class=" text-neutral-400 text-2xl" :class="fac.icon"></i>
                                            <p class="font-normal text-gray-500 text-sm dark:text-gray-400 " x-text="fac.name">
                                            </p>
                                            <div class="flex gap-2 items-center pt-2">
                                                <button type="button" @click.prevent="deleteIcon(fac)"
                                                    class="px-1 py-1 lg:px-1 bg-transparent  text-red text-sm  rounded transition hover:bg-red-600 hover:text-white border border-red font-medium mb-2">{{$this->translate('delete')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button
                        class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded"
                        @click="saveAll()">{{$this->translate('save')}}</button>
                    <button
                        class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500  text-sm font-medium py-1 px-3 rounded"
                        wire:click="cancel()">{{$this->translate('cancel')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal animate-ModalSlide hidden" id="modalcenter" wire:ignore>
        <div
            class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
            <div
                class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
                <div
                    class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                    <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="staticBackdropLabel1">
                    {{$this->translate('add_facility')}}</h6>
                    <button type="button"
                        class="box-content w-4 h-4 p-1 bg-slate-700/60 rounded-full text-slate-300 leading-4 text-xl close"
                        aria-label="Close" data-fc-dismiss>&times;</button>
                </div>
                <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                    <div class="grid grid-cols-4 gap-2">
                        <div class="col-span-4 ">
                            <div class="mb-2">
                                <label for="Name"
                                    class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('name')}}<small
                                        class="text-red-600 text-sm">*</small></label>
                                <input
                                    class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                    placeholder="{{$this->translate('name')}}" type="text" x-model="name">
                            </div>
                        </div>
                        <label for="Name" class="font-medium text-sm text-slate-600 dark:text-slate-400">
                        {{$this->translate('icon')}} <small class="text-red-600 text-sm">*</small>
                        </label>
                        <div class="col-span-4 h-72  gap-2  overflow-y-auto">
                            <div class="w-full grid grid-cols-8 gap-2">
                                <template x-for="icon in icons">
                                    <div :class="selectedIcon == icon ? 'bg-blue-400 text-white' : ''"
                                        class="p-2 border rounded-lg h-10 w-10 col-span-1 flex items-center justify-center hover:bg-neutral-300"
                                        @click="selectIcon(icon)">
                                        <i :class="[icon]" class="text-2xl"></i>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-wrap shrink-0 justify-end p-3  rounded-b border-t border-dashed dark:border-gray-700">
                    <button
                        class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500  text-sm font-medium py-1 px-3 rounded mr-1 close"
                        data-fc-dismiss>{{$this->translate('close')}}</button>
                    <button  @click="save"
                        class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded">{{$this->translate('save')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js-top')
    <script src="/assets/js/facilities.js"></script>
@endpush
