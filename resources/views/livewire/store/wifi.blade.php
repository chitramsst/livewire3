<div class="ltr:flex flex-1 rtl:flex-row-reverse">
    <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-230px)] px-4 pt-[54px] duration-300">
        <div class="xl:w-full">
            <div class="flex flex-wrap">
                <div class="flex items-center py-4 w-full">
                    <div class="w-full">
                        <div class="">
                            <div class="flex flex-wrap justify-between">
                                <div class="items-center ">
                                    <h1 class="font-medium text-xxl mb-1 block dark:text-slate-100">{{$this->translate('wifi')}}</h1>
                                    <ol class="list-reset flex text-sm">
                                        <li><a href="#" class="text-gray-500 dark:text-slate-400">{{$this->translate('home')}}</a> </li>
                                        <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                        <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">{{$this->translate('wifi')}}</li>
                                    </ol>
                                </div>
                                <div class="flex items-center">
                                    <a href="#" @click="$refs.initialElement.focus()"  data-fc-type="modal" data-fc-target="modalcenter" class="px-2 flex items-center gap-1 py-1 lg:px-4 bg-transparent  text-primary text-sm  rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                        </svg>
                                        {{$this->translate('add_wifi')}}
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
                                        @if(count($wifis) > 0)
                                        <table class="w-full">
                                            <thead class="bg-gray-50 dark:bg-gray-700/20">
                                                <tr>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                        #
                                                    </th>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    {{$this->translate('name')}}
                                                    </th>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    {{$this->translate('password')}}
                                                    </th>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    {{$this->translate('type')}}
                                                    </th>
                                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-right text-gray-700 uppercase dark:text-gray-400">
                                                    {{$this->translate('action')}}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($wifis as $row)
                                                <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        <span class="text-slate-700 dark:text-slate-400 text-[13px] font-medium">{{ $loop->index + 1}}</span>
                                                    </td>
                                                    <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                        <div class="flex items-center">
                                                            <div class="self-center">
                                                                <h5 class="text-sm font-semibold text-slate-700 dark:text-gray-400">{{ $row->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        <span class="text-slate-700 dark:text-slate-400 text-[13px] font-medium">{{$row->password}}</span>
                                                    </td>
                                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        <span class="text-slate-700 dark:text-slate-400 text-[13px] font-medium"> {{ ($row->type==1 ?'2.5 GHz' : '5 GHz')}}</span>
                                                    </td>
                                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400 text-right">
                                                        <a @click="$refs.initialElementEdit.focus()" data-fc-target="default-modal-edit" data-fc-type="modal" wire:click.prevent="edit({{$row}},'default-modal-edit')" wire:key="{{$row->id}}"><i class="ti ti-edit text-lg text-gray-500 dark:text-gray-400"></i></a>
                                                        <a wire:click.prevent="confirmDelete({{$row}})" data-fc-target="deleteConfirmation" data-fc-type="modal"><i class="ti ti-trash ml-2 text-lg text-red-500 dark:text-red-400"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <x-empty-component title="{{$this->translate('so_empty')}}" message="{{$this->translate('add_some_wifis_to_get_started')}}" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div wire:ignore.self class="modal animate-ModalSlide hidden" id="modalcenter">
                <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
                    <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
                        <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                            <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="staticBackdropLabel1">{{$this->translate('add_wifi')}}</h6>
                            <button type="button" class="box-content w-4 h-4 p-1 bg-slate-700/60 rounded-full text-slate-300 leading-4 text-xl close" aria-label="Close" data-fc-dismiss wire:click="resetData">&times;</button>
                        </div>
                        <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                            <div class="grid grid-cols-2">
                                <div class="col-span-2">
                                    <div class="mb-2">
                                        <label for="name" class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('name')}}<small class="text-red-600 text-sm">*</small></label>
                                        <input x-ref="initialElement" wire:model="name" type="text" id="email" class="form-input w-full border  dark:border-slate-700 @error('name') {{ 'border-red-500'}} @enderror rounded-md mt-1   dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700" placeholder="{{$this->translate('name')}}" required>
                                    </div>
                                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-2">
                                    <div class="mb-2">
                                        <label for="name" class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('password')}}<small class="text-red-600 text-sm">*</small></label>
                                        <input wire:model="password" type="text" id="text" class="form-input w-full  @error('password') {{ 'border-red-500'}} @enderror rounded-md mt-1 border  dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700" placeholder="{{$this->translate('password')}}" required>
                                    </div>
                                    @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-2">
                                    <div class="mb-2">
                                        <label for="name" class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$lang->data['type'] ?? 'Type'}}</label>
                                        <select wire:model="type" id="countries" class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-[6.5px] focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700">
                                            <option value="1">2.5 {{$this->translate('ghz')}}</option>
                                            <option value="2">5 {{$this->translate('ghz')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap shrink-0 justify-end p-3  rounded-b border-t border-dashed dark:border-gray-700">
                            <button class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500  text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss wire:click="resetData">{{$this->translate('close')}}</button>
                            <button class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded" wire:click.prevent="save">{{$this->translate('save')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div wire:ignore.self class="modal animate-ModalSlide hidden" id="default-modal-edit">
                <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
                    <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
                        <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                            <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="staticBackdropLabel1">{{$this->translate('edit_wifi')}}</h6>
                            <button type="button" class="box-content w-4 h-4 p-1 bg-slate-700/60 rounded-full text-slate-300 leading-4 text-xl close" aria-label="Close" data-fc-dismiss wire:click="resetData">&times;</button>
                        </div>
                        <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                            <div class="grid grid-cols-2">
                                <div class="col-span-2">
                                    <div class="mb-2">
                                        <label for="name" class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('name')}}<small class="text-red-600 text-sm">*</small></label>
                                        <input x-ref="initialElementEdit" wire:model="name" type="text" class="form-input w-full   @error('name') {{ 'border-red-500'}} @enderror rounded-md mt-1 border  dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700" placeholder="{{$this->translate('name')}}" required>
                                    </div>
                                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-2">
                                    <div class="mb-2">
                                        <label for="name" class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('password')}}<small class="text-red-600 text-sm">*</small> </label>
                                        <input wire:model="password" type="text" id="text" class="form-input w-full  @error('password') {{ 'border-red-500'}} @enderror rounded-md mt-1 border  dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700" placeholder="{{$this->translate('password')}}" required>
                                    </div>
                                    @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-2">
                                    <div class="mb-2">
                                        <label for="name" class="font-medium text-sm text-slate-600 dark:text-slate-400">{{$this->translate('type')}}</label>
                                        <select wire:model="type" id="countries" class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-[6.5px] focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700">
                                            <option value="1">2.5 {{$this->translate('ghz')}}</option>
                                            <option value="2">5 {{$this->translate('ghz')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap shrink-0 justify-end p-3  rounded-b border-t border-dashed dark:border-gray-700">
                            <button class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500  text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss wire:click="resetData">{{$this->translate('close')}}</button>
                            <button class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded" wire:click.prevent="update">{{$this->translate('update')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div wire:ignore.self class="modal animate-ModalSlide hidden" id="deleteConfirmation">
                <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
                    <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
                        <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                            <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="staticBackdropLabel1">{{$this->translate('delete_confirmation')}}</h6>
                            <button type="button" class="box-content w-4 h-4 p-1 bg-slate-700/60 rounded-full text-slate-300 leading-4 text-xl close" aria-label="Close" data-fc-dismiss wire:click="resetData">&times;</button>
                        </div>
                        <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                            <div class="p-4 overflow-y-auto">
                                <h3 class="font-medium text-gray-600 dark:text-white text-lg">
                                    <p>{{$this->translate('are_you_sure_to_delete')}}</p>
                                </h3>
                            </div>
                        </div>
                        <div class="flex flex-wrap shrink-0 justify-end p-3  rounded-b border-t border-dashed dark:border-gray-700">
                            <button class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500  text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss wire:click.prevent="$emit('close-modal')">{{$this->translate('close')}}</button>
                            <button class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded" wire:click.prevent="delete">{{$this->translate('yes_delete')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 -left-4 -right-4 block print:hidden ">
                <div class="">
                    <livewire:components.footer/>
                </div>
            </div>
        </div>
    </div>
</div>