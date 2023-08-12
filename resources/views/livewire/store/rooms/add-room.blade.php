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
                                        <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">{{$this->translate('add_room')}}</h1>
                                        <ol class="list-reset flex text-sm">
                                            <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate('home')}}</a>
                                            </li>
                                            <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                            <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">
                                            {{$this->translate('rooms')}} </li>
                                            <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                            <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">
                                            {{$this->translate('add')}}</li>
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
                    <div class="flex-auto p-4 ">
                        <form>
                            <div class="grid grid-cols-6 gap-2">
                                <div class="col-span-3">
                                    <div class="mb-2">
                                        <label for="name"
                                            class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('room_logo')}}</label>
                                        <input
                                            class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-[1px] focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                            aria-describedby="user_avatar_help" id="user_avatar" type="file"
                                            wire:model="image">
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="mb-2">
                                        <label for="name"
                                            class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('room_name')}}
                                            <span class="text-red-500">*</span> </label>
                                        <input type="text" id="name"
                                            class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                            placeholder="{{$this->translate('name')}}" required wire:model="name">
                                        @error('name')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-span-3 relative">
                                    <div class="mb-0">
                                        <label for="price"
                                            class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('price')}} <span
                                                class="text-red-500">*</span> </label>
                                        <input type="text" id="price"
                                            class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                            placeholder="{{$this->translate('price')}}" wire:model="price" required>
                                        <span class="text-xs text-green-500">{{$this->translate('per_day')}}</span>
                                        @error('price')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-span-3 relative">
                                    <div class="mb-2">
                                        <label for="wifi"
                                            class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('wifi')}} <span
                                                class="text-red-500">*</span> </label>
                                        <select id="wifi" wire:model="wifi"
                                            class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-[6.5px] focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700">
                                            <option value="">{{$this->translate('no_wifi')}}</option>
                                            @foreach ($wifi_list as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('wifi')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="mb-2">
                                        <label for="name"
                                            class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('max_occupants')}}
                                            <span class="text-red-500">*</span> </label>
                                        <input type="text" id="max_occupants"
                                            class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                            placeholder="{{$this->translate('max_occupants')}}" required wire:model="max_occupants">
                                        @error('max_occupants')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="mb-2">
                                        <label for="name"
                                            class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('apartment_type')}} <span class="text-red-500">*</span> </label>
                                        <select id="countries" wire:model="apartment_type"
                                            class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-[6.5px] focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700">
                                            <option value="">{{$this->translate('select_apartment')}}</option>
                                            @foreach ($apartment_types as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('apartment_type')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                               

                                <div class="col-span-3">
                                    <div class="mb-2">
                                        <label for="smoking"
                                            class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('smoking')}}
                                        </label>
                                        <select id="smoking" wire:model="smoking"
                                            class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-[6.5px] focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700">
                                            <option value="1">{{$this->translate('allowed')}}</option>
                                            <option value="0">{{$this->translate('not_allowded')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <div class="mb-2">
                                        <label for="name"
                                            class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('description')}}
                                            <span class="text-red-500">*</span> </label>
                                        <textarea rows="6" type="text" id="text"
                                            class="form-input w-full resize-none rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700"
                                            placeholder="{{$this->translate('description')}}" required wire:model="description"></textarea>
                                        @error('text')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <div class="mb-2">
                                        <label for="name"
                                            class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('apartment_facilities')}} </label>
                                        <div class="grid grid-cols-1 gap-4 mt-2  md:grid-cols-2  xl:grid-cols-4">
                                            @foreach ($apartment_facilities as $item)
                                                <label class="custom-label block dark:text-slate-300">
                                                    <div
                                                        class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 rounded w-4 h-4  inline-block leading-4 text-center -mb-[3px]">
                                                        <input type="checkbox" class="hidden" checked=""
                                                            wire:model="facilities.{{ $item->id }}">
                                                        <i class="fas fa-check hidden text-xs text-green-500"></i>
                                                    </div>
                                                    <span class="ml-1">
                                                        {{ $item->name }}
                                                    </span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-6 mb-2">
                                    <label class="custom-label block dark:text-slate-300">
                                        <div
                                            class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 rounded w-4 h-4  inline-block leading-4 text-center -mb-[3px]">
                                            <input type="checkbox" class="hidden" checked wire:model="is_active">
                                            <i class="fas fa-check hidden text-xs text-blue-500"></i>
                                        </div>
                                        {{$this->translate('is_active')}}
                                    </label>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" wire:click.prevent="save"
                                    class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded mb-1">{{$this->translate('submit')}}</button>
                                <button type="text"
                                    class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500  text-sm font-medium py-1 px-3 rounded mb-1">{{$this->translate('cancel')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
