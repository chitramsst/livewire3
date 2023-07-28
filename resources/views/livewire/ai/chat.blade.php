<div x-data="handler()">
    <!-- https://techvblogs.com/blog/how-to-use-openai-laravel -->
    <!-- https://api.openai.com/v1/models 
Authorization and bearer tokens
https://devdojo.com/bobbyiliev/how-to-create-a-simple-event-streaming-in-laravel

https://github.com/orhanerday/open-ai#chat-as-known-as-chatgpt-api
-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex justify-between items-center">
                Chat
                <a class="bg-gray-900 text-white px-5 py-1 rounded-2xl shadow-lg border border-spacing-2" href="{{route('product.list')}}"> <i class="fas fa-arrow-back"></i> Back </a>
            </div>
            <div class="p-3">
                <form class="w-full">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                Name
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" wire:model="text" id="grid-first-name" type="text">
                            <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                            @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-6 p-10 ">
                        <span x-text="contents"> </span>
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button class="shadow bg-gray-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" @click.prevent="sendRequestAlpine()">
                                SEND
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function handler() {
        return {
            contents: [],
            eventSource: null,
            sendRequestAlpine() {
                this.eventSource = new EventSource('/chat/send');
                //this.content = "started";
                // this.eventSource.onmessage = function(event) {
                this.eventSource.onmessage = (event) => {
                    data = JSON.parse(event.data);
                    if (data.content!='[DONE]') {
                        this.contents.push(data.content);
                    }
                    // if (event.data.content) {
                    //     this.content = data.content;
                    // }
                }

                //     await this.$wire.sendRequest()
                //         .then(result => {
                //             alert(JSON.stringify(result));
                //         })


            }
        }
    }
</script>