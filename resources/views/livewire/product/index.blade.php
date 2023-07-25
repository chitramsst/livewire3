<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-24  mt-10">

    <!-- card -->

    <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">

        <div class="px-6 py-2 border-b border-light-grey flex items-center justify-between">
            <div class="flex flex-row font-mono font-extralight"> <span> Home / </span> <span class="text-red-500 px-3"> Product </span></div>
            <a class="bg-red-800 text-white px-5 py-1 rounded-2xl shadow-lg border border-spacing-2" href="{{route('product.create')}}"> Create </a>
        </div>
        <!-- <input wire:model.live="search"> -->
        <div class="table-responsive">
            <table class="table text-grey-darkest">
                <thead class="bg-grey-dark text-white text-normal">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $row)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>
                            @if($row->image_url)
                            <img class="inline-block h-8 w-8 rounded-full" src="{{ $row->image_url }}" alt="">
                            @else
                            <img class="inline-block h-8 w-8 rounded-full" src="{{ asset('assets/icon-no-image.svg') }}" alt="">
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
                                <div class="flex w-28  bg-gray-800 justify-center items-center rounded-md" @click="isOpen=!isOpen" @click.away="isOpen=false">
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