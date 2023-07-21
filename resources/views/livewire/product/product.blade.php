<div>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex justify-between items-center">
                Product
                <a class="bg-gray-900 text-white px-5 py-1 rounded-2xl shadow-lg border border-spacing-2" href="{{route('product.list')}}"> <i class="fas fa-arrow-back"></i> Back </a>
            </div>
            <div class="p-3">
                <form class="w-full" wire:submit="save">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                Name
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" wire:model="name" id="grid-first-name" type="text">
                            <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                            @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-last-name">
                                Price
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="grid-last-name" type="number" wire:model="price">
                            @error('price') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <!-- @if ($photo) 
        <img src="{{ $photo->temporaryUrl() }}">
    @endif -->
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-password">
                                Image
                            </label>
                            <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-password" type="file" wire:model="photo">
                            <p class="text-grey-dark text-xs italic"></p>
                        </div>
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button class="shadow bg-gray-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                Sign Up
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>