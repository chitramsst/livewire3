<div class="container w-full" x-data="handler()">
    <div class="flex flex-row space-x-10 m-3 p-2 w-full">
        <div class="w-1/2">
            <h1>Staus 1</h1>
            <div  @drop.prevent="dragDropList(dragIndex,dragFrom,1)" @dragover.prevent="$event.dataTransfer.dropEffect = &quot;move&quot;">
                <div class="list-group flex flex-col m-3 p-5 mb-3 bg-gray-300 space-y-5 rounded-lg">
                    <template x-for="(item, index) in items" :key="index">
                        <div x-on:drag=" dragIndex = index; dragFrom = 1 " class="position-relative list-group-item bg-gray-500 p-10 rounded-lg" draggable="true" :class="{'border border-primary': dragging === index}" @dragstart="dragging = index" @dragend="dragging = null" x-on:drop=" dropping = index ">
                            <div><i class="bi bi-grip-vertical"></i><span x-text="item"></span></a><button type="button" class="btn btn-outline-danger btn-sm float-end" aria-label="Delete" @click="items.splice(index, 1);"><i class="bi-trash"></i></button></div>
                            <div class="position-absolute" style="top: 0; bottom: 0; right: 0; left: 0;" x-show.transition="dragging !== null" :class="{'bg-secondary': dropping === index}" @dragenter.prevent="if(index !== dragging) {dropping = index}" @dragleave="if(dropping === index) dropping = null"></div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <div class="w-1/2">
            <h1>Status2</h1>
            <div  @drop.prevent="dragDropList(dragIndex,dragFrom,2)" @dragover.prevent="$event.dataTransfer.dropEffect = &quot;move&quot;">
                <div class="list-group flex flex-col m-3 p-5 mb-3 bg-gray-300 space-y-5 rounded-lg">
                    <template x-for="(item, index) in items1" :key="index">
                        <div x-on:drag=" dragIndex = index; dragFrom = 2 " class="position-relative list-group-item bg-gray-500 p-10 rounded-lg" draggable="true" :class="{'border border-primary': dragging === index}" @dragstart="dragging = index" @dragend="dragging = null" x-on:drop=" dropping = index ">
                            <div><i class="bi bi-grip-vertical"></i><span x-text="item"></span></a><button type="button" class="btn btn-outline-danger btn-sm float-end" aria-label="Delete" @click="items.splice(index, 1);"><i class="bi-trash"></i></button></div>
                            <div class="position-absolute" style="top: 0; bottom: 0; right: 0; left: 0;" x-show.transition="dragging !== null" :class="{'bg-secondary': dropping === index}" @dragenter.prevent="if(index !== dragging) {dropping = index}" @dragleave="if(dropping === index) dropping = null"></div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <!-- <div class="w-1/2">
            <h1>Status 2</h1>
            <div x-data="handler()" @drop.prevent="items1=dragDropList(dragging, dropping,2)" @dragover.prevent="$event.dataTransfer.dropEffect = &quot;move&quot;">
                <div class="list-group flex flex-col m-3 p-5 mb-3 bg-gray-300 space-y-5">
                    <template x-for="(item, index) in items1" :key="index">
                        <div class="position-relative list-group-item bg-gray-500 p-10" draggable="true" :class="{'border border-primary': dragging === index}" @dragstart="dragging = index" @dragend="dragging = null" x-on:drop=" dropping = index ">
                            <div><i class="bi bi-grip-vertical"></i><span x-text="item"></span></a><button type="button" class="btn btn-outline-danger btn-sm float-end" aria-label="Delete" @click="items.splice(index, 1);"><i class="bi-trash"></i></button></div>
                            <div class="position-absolute" style="top: 0; bottom: 0; right: 0; left: 0;" x-show.transition="dragging !== null" :class="{'bg-secondary': dropping === index}" @dragenter.prevent="if(index !== dragging) {dropping = index}" @dragleave="if(dropping === index) dropping = null"></div>
                        </div>
                    </template>
                </div>
            </div>
        </div> -->
    </div>

    <hr>
</div>
<script>
    function handler() {
            return {
                items: ['Chocolate', 'Vanilla', 'Strawberry', 'Cookies and Creme'],
                items1: [],
                newItem:'', dragging: null, dropping: null,
                dragDropList(dragIndex, drogFrom,location) {
                    if(location==2) {
                        this.items1.push(this.items[dragIndex]);
                        this.items.splice(dragIndex,1);
                        //this.items = [...this.items.splice(0,1)];
                    }
                    if(location==1) {
                        this.items.push(this.items1[dragIndex]);
                        this.items1.splice(dragIndex,1);
                        //this.items = [...this.items.splice(0,1)];
                    }
                }
            }
        }
</script>