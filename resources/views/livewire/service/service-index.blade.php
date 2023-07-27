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
                            <input @keydown.enter="getData" wire:model="service_name" x-model="service_name" @keyup="checkServiceValidation" :class="{ 'border-red-500': serviceError === true }" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" wire:model="name" id="grid-first-name" type="text">
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
                    <div class="w-[5%]">
                        <span class="appearance-none text-center block w-full bg-gray-500 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"> # </span>
                    </div>
                    <div class="w-[30%]">
                        <span class="appearance-none text-center block w-full bg-gray-500 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"> Category </span>
                    </div>
                    <div class="w-[30%]">
                        <span class="appearance-none text-center block w-full bg-gray-500 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"> Name </span>
                    </div>
                    <div class="w-[30%]">
                        <span class="appearance-none text-center block w-full bg-gray-500 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"> Price </span>
                    </div>
                    <div class="w-[5%]">

                    </div>
                </div>
                <template x-for="(field,index) in fields" >
                    <div class="flex flex-row w-full space-x-10 items-center justify-between">
                        <div class="w-[5%]">
                            <span x-text="index+1" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" id="grid-first-name" />
                        </div>
                        <div class="w-[30%]">
                            <select @change="$wire.getProducts(field.category_id,index)" x-model="field.category_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500">
                                <option value=""> Choose Category </option>
                                <template x-for="(item,id) in $wire.categories" :key="item.id">
                                    <option  x-if="item.id!=NULL" :value="item.id" x-text="item['name']" class="text-white" x-bind:id="item.id" x-show="item.id"> </option>
                                </template>
                            </select>
                            @error('category_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-[30%]">
                        <select x-model="field.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500">
                        <option value=""> Choose Product </option>
                                <template x-for="item1 in $wire.products[index]" :key="item1.id" >
                                    <option :value="item1.id" x-text="item1.name" class="text-white" x-bind:id="item1.id" x-show="item1.id"> </option>
                                </template>
                        </select>
                        </div>
                        <div class="w-[30%]">
                            <input x-model="field.price" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" id="grid-first-price" type="text">
                            @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-[5%] text-center">
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
            service_name: '',
            serviceError: false,
            addNewField() {
                if (this.fields.length == 0) {
                    this.fields.push({
                        category_id: '',
                        name: '',
                        price: ''
                    });
                } else {
                    const count = this.fields.length - 1;
                    $item = this.fields;
                    if (($item[count].name == "") || ($item[count].category_id == "") || ($item[count].price == "")) {
                        const row = count + 1;
                        alert("please enter valid data of row " + row);
                    } else {
                        this.fields.push({
                            category_id: '',
                            name: '',
                            price: ''
                        });
                    }
                }
            },
            removeField(index) {
                this.fields.splice(index, 1);
            },
            getData() {
                if (this.service_name == "") {
                    this.serviceError = true;
                    return;
                }
                if (this.fields.length <= 0) {
                    alert("pls enter  valid item data");
                    return;
                }
                this.fields.forEach(function(item, index) {
                    if ((item.name == "") || (item.category_id == "") || (item.price == "")) {
                        const row = index + 1;
                        alert("please enter valid data of row " + row);
                    }
                })
                this.$wire.save(this.fields,this.service_name);
            },
            checkServiceValidation() {
                if (this.service_name == "") {
                    this.serviceError = true;
                    return;
                } else {
                    this.serviceError = false;
                }
            }
        }
    }
</script>