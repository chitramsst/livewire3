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
                                        <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">{{$this->translate("rooms")}}</h1>
                                        <ol class="list-reset flex text-sm">
                                            <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate("home")}}</a>
                                            </li>
                                            <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                            <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">
                                            {{$this->translate("rooms")}}</li>
                                        </ol>
                                    </div>
                                    <div class="">
                                        <div class="dropdown inline-block">
                                            <a href="{{ route('store.add-room') }}"
                                                class="px-2 flex items-center gap-1 py-1 lg:px-4 bg-transparent  text-primary text-sm  rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v12m6-6H6" />
                                                </svg>
                                                {{$this->translate("add_room")}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full  min-h-[calc(100vh-138px)] relative pb-14 ">
                @if(count($rooms) > 0)
                <div class="grid grid-cols-5 gap-4 mb-4">
                    @foreach ($rooms as $item)
                        <div class="rounded-lg  w-full col-span-1  border border-neutral-500/10 flex flex-col p-2 shadow-lg ">
                            <div class="h-44 rounded-lg overflow-clip relative ">
                                <img src="{{$item->photo()}}" alt="" class=" object-cover h-full w-full">
                            </div>
                            <div class="flex justify-between gap-1 mt-2 items-center">
                            <div class=" text-center text-lg font-bold">
                                    {{$item->name}}
                                </div>
                                <div class="text-xs text-center">
                                    {{getCurrencyFormat($item->price)}}
                                </div>
                            </div>
                            <div class="mt-2 flex gap-2 justify-between">
                                <a href="{{route('store.edit-room',$item->id)}}" class="px-2 py-1 lg:px-4 bg-transparent  text-blue text-sm  rounded transition hover:bg-blue-600 hover:text-white border border-blue font-medium mb-2">{{$this->translate("edit")}}</a>
                                @if ($item->is_active)
                                <button wire:click.prevent="toggleStatus({{$item->id}})" type="button" class="px-2 py-1 lg:px-4 bg-transparent  text-red text-sm  rounded transition hover:bg-red-600 hover:text-white border border-red font-medium mb-2">{{$this->translate("disable")}}</button>
                                @else
                                <button wire:click.prevent="toggleStatus({{$item->id}})" type="button" class="px-2 py-1 lg:px-4 bg-transparent  text-green text-sm  rounded transition hover:bg-green-600 hover:text-white border border-green font-medium mb-2">{{$this->translate("enable")}}</button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                    <x-empty-component title='{{$this->translate("so_empty")}}' message="{{$this->translate('no_rooms_have_been_created_add_some_now')}}."/>
                @endif
                <div class="absolute bottom-0 -left-4 -right-4 block print:hidden ">
                    <div class="">
                       <livewire:components.footer/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>