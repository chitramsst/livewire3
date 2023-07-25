<div x-data="handler()">
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex justify-between items-center">
                Service
                <a class="bg-gray-900 text-white px-5 py-1 rounded-2xl shadow-lg border border-spacing-2" href="{{route('product.list')}}"> <i class="fas fa-arrow-back"></i> Back </a>
            </div>
            <div class="p-3">
                <form class="w-full flex flex-row">
                    <div class="flex flex-wrap -mx-3 mb-6 w-full">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                Name
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" wire:model="name" id="grid-first-name" type="text">
                            <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                            @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="md:flex md:items-center text-right -px-10">
                        <div @click="getData" class="shadow bg-gray-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                            ADD
                        </div>
                    </div>

                </form>
            </div>
            <div class="border border-dashed my-3"></div>
            <div class="p-3 w-full">
                <div class="flex flex-row w-full space-x-10 items-center justify-between">
                    <div class="w-[45%]">
                        <span class="appearance-none text-center block w-full bg-gray-500 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"> Category </span>
                    </div>
                    <div class="w-[45%]">
                        <span class="appearance-none text-center block w-full bg-gray-500 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"> Name </span>
                    </div>
                    <div class="w-[45%]">
                        <span class="appearance-none text-center block w-full bg-gray-500 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"> Price </span>
                    </div>
                    <div class="w-[10%]">

                    </div>
                </div>
                <template x-for="(field,index) in fields">
                    <div class="flex flex-row w-full space-x-10 items-center justify-between">
                        <div class="w-[45%]">
                            <select x-model="field.category_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" >
                                <option value=""> Choose Category </option>
                                <template x-for="item in $wire.categories" :key="item.id">
                                    <option  :value="item.id" x-text="item.name" class="text-white" x-bind:id="item.id"> </option>
                                </template>
                            </select>
                            @error('category_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-[45%]">
                            <input x-model="field.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"  id="grid-first-name" type="text">
                            @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-[45%]">
                            <input x-model="field.price" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" id="grid-first-price" type="text">
                            @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-[10%] text-center">
                            <button class="shadow  hover:bg-purple-400 focus:shadow-outline focus:outline-none text-red-900 font-bold py-2 px-4 rounded" @click="removeField(index)">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </template>
                <div class="text-right">
                    <button class="shadow bg-green-900 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" @click="addNewField">
                        + ADD ROW
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function handler() {
        return {
            fields: [],
            addNewField() {
                this.fields.push({
                    category_id: '',
                    name: '',
                    price: ''
                });
            },
            removeField(index) {
                this.fields.splice(index, 1);
            },
            getData() {
                console.log(this.fields);
                alert(this.fields);
            }
        }
    }
</script>