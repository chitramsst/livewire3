<div class="w-full">
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex justify-between items-center">
                <div class="flex flex-row font-mono font-extralight"> <span class="mx-2"> Product </span></div>
                <div>

                    <a class="bg-[#E2D36B] text-white px-5 py-1 rounded-2xl shadow-lg border border-spacing-2" href="{{route('product.create')}}"> <i class="fas fa-arrow-back"></i> Create </a>
                </div>
            </div>
            <div class="w-full align-middle text-right my-3">
                <input class="mx-2 bg-[#BAC94A] text-white px-5 py-1 rounded-2xl shadow-lg border border-spacing-2 focus:outline-none focus:bg-white-500" wire:model.live="search" placeholder="search" />
            </div>
            <div class="p-3">
                <div class="table-responsive w-full h-full">
                    <table class="table text-grey-darkest">
                        <thead class="bg-[#96D7C6] text-white text-normal w-full">
                            <tr class="w-full">
                                <th scope="col" class="w-[10%]">#</th>
                                <th scope="col" class="w-[30%]">Item</th>
                                <th scope="col" class="w-[20%]">Price</th>
                                <th scope="col" class="w-[20%]">Status</th>
                                <th scope="col" class="w-[20%]"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $row)
                            <tr class="">
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>
                                    @if($row->image_url)
                                    <img class="inline-block h-16 w-16 rounded-full" src="{{ $row->image_url }}" alt="">
                                    @else
                                    <img class="inline-block h-16 w-16 rounded-full" src="{{ asset('assets/icon-no-image.svg') }}" alt="">
                                    @endif
                                    <!-- <td>
                    <button class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full">
                        Twitter
                    </button>
                </td> -->
                                    {{$row->name}}
                                </td>
                                <td>{{ $row->price }}</td>
                                <td>
                                    <span class="text-green-500">{{ ($row->is_active==1) ? 'Active' : 'Inactive'}}</span>
                                </td>
                                <td>
                                    <div class="relative" x-data="{isOpen:false}">
                                        <div class="flex w-28  bg-[#5AA74A] justify-center items-center rounded-md" @click="isOpen=!isOpen" @click.away="isOpen=false">
                                            <button class="px-2 py-1 text-white">Action</button>
                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                <path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z" class="heroicon-ui"></path>
                                            </svg>
                                        </div>
                                        <ul class="absolute shadow z-20 bg-gray-100 w-28 rounded-xl" x-show="isOpen">
                                            <li class="p-2 hover:bg-gray-300" wire:click="addToCart({{$row}})"> Add Cart </li>
                                            <li class="p-2 hover:bg-gray-300"> Delete </li>
                                        </ul>
                                    </div>

                </div>

                </td>
                </tr>
                @endforeach


                </tbody>
                </table>
            </div>
        </div>
        <!-- /card -->

    </div>