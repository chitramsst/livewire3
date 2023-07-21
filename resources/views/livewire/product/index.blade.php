<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 mt-2">

<!-- card -->

<div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
  
<div class="px-6 py-2 border-b border-light-grey flex items-center justify-between">
        <div class="font-bold text-xl">Trending Categories</div>
        <a class="bg-red-800 text-white px-5 py-1 rounded-2xl shadow-lg border border-spacing-2" href="{{route('product.create')}}"> Create </a>
    </div>
    <!-- <input wire:model.live="search"> -->
    <div class="table-responsive">
        <table class="table text-grey-darkest">
            <thead class="bg-grey-dark text-white text-normal">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th scope="col">Item</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
                @foreach($items as $row)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>
                    @if($row->image_url)
                <img  class="inline-block h-8 w-8 rounded-full" src="{{ $row->image_url }}" alt="">
                @else
                <img  class="inline-block h-8 w-8 rounded-full" src="{{ asset('assets/icon-no-image.svg') }}" alt="">
                @endif
                </td>
                <!-- <td>
                    <button class="bg-blue-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-full">
                        Twitter
                    </button>
                </td> -->
                <td wire:transition.opacity.duration.2500ms>{{$row->name}}</td>
                <td>{{ $row->price }}</td>
                <td>
                    <span class="text-green-500">{{ ($row->is_active==1) ? 'Active' : 'Inactive'}}</span>
                </td>
            </tr>
            @endforeach
          

            </tbody>
        </table>
    </div>
</div>
<!-- /card -->

</div>