<div class="m-5 ">
    <div class="ml-24 flex flex-row my-5 font-mono font-extralight"> <span> Home / </span> <span class="text-red-500 px-3"> Cart </span></div>
    <div class="flex flex-row marign-2 space-x-24">

        <div class="w-[70%] h-full ml-24">
            <?php $total = 0 ?>
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            <?php $total += $details['product_price'] * $details['product_quantity'] ?>
            <div class="flex flex-row justify-between items-center h-36 border-t-[0.5px]  border-gray-200 ">
                <div class="col-sm-9 flex space-x-5 items-center w-[30%]">
                    @if($details['product_image_url'])
                    <img src="{{$details['product_image_url']}}" class="w-24 h-24 rounded-lg border-1  shadow-lg p-2" />
                    @else
                    <img src="{{ asset('assets/icon-no-image.svg') }}" class="w-24 h-24 rounded-lg border-1 shadow-lg p-2" />
                    @endif
                    <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                </div>
                <span class="w-[15%]">
                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                        <button wire:click="decrementProductQuantity({{$id}})" data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                            <span class="m-auto text-2xl font-thin">−</span>
                        </button>
                        <input type="number" class="bg-gray-200 outline-none focus:outline-none text-center w-full  font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number" value="{{ $details['product_quantity'] }}"></input>
                        <button wire:click="incrementProductQuantity({{$id}})" data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                            <span class="m-auto text-2xl font-thin">+</span>
                        </button>
                    </div>
                </span>
                <span class="text-center w-[10%]">${{ $details['product_price'] }}</span>
                <span class="text-center w-[10%]" wire:click="removeItem({{$details['product_id']}})"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
            @endforeach
            @endif
            <div class="border-t-[0.5px]  border-gray-200 "></div>

            <div class="text-black/20 mt-20"><a href="{{ url('/product') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></div>

            <!-- <div>
                <td><a href="{{ url('/product') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
            </div> -->
        </div>
        <div class="w-[30%] h-80 bg-gray-300 p-5 rounded-md">
            <div>
            <h1 class="font-bold text-lg"> Summary </h1>
            <div class="flex flex-col h-full w-full">
                <div>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                    @php $total += $details['product_price'] * $details['product_quantity'] @endphp
                    @endforeach
                    @endif
                    <div class="flex flex-row justify-between items-center m-5 text-black/40 text-sm">
                        <span> Sub Total </span>
                        <span> $ {{ $total }} </span>
                    </div>
                    <div class="flex flex-row justify-between items-center m-5 text-black/40 text-sm">
                        <span> Shipping Charges </span>
                        <span> $ 0 </span>
                    </div>
                    <div class="border border-dashed border-black/20"> </div>
                    <div class="flex flex-row justify-between items-center m-5">
                        <span> Total </span>
                        <span> $ {{ $total }} </span>
                    </div>
                    <div class="border border-dashed border-black/20"> </div>
                </div>
            </div>
            </div>
            
    <div class="text-black/20 text-right mt-24"><a href="{{ url('/product') }}" class="btn btn-warning bg-red-700 p-3 rounded-lg text-white border-red-500 border hover:bg-red-800 text-bold  border-spacing-2 border-1 shadow-xl"> Checkout</a></div>

        </div>
    </div>

    <!-- <script>
    function decrement(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value--;
        target.value = value;
    }

    function increment(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value++;
        target.value = value;
    }

    const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
    );

    const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
    );

    decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
    });

    incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
    });
</script> -->