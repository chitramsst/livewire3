<div class="container">
    <h1>Drag and Drop</h1>
    <div x-data="handler()" @drop.prevent="items=dragDropList(dragging, dropping)" @dragover.prevent="$event.dataTransfer.dropEffect = &quot;move&quot;">
        <div class="list-group flex flex-col m-3 p-5 mb-3 bg-gray-300 space-y-5" >
            <template x-for="(item, index) in items" :key="index" >
                <div class="position-relative list-group-item bg-gray-500 p-10" draggable="true" :class="{'border border-primary': dragging === index}" @dragstart="dragging = index" @dragend="dragging = null"  x-on:drop=" dropping = index ">
                    <div><i class="bi bi-grip-vertical"></i><span x-text="item"></span></a><button type="button" class="btn btn-outline-danger btn-sm float-end" aria-label="Delete" @click="items.splice(index, 1);"><i class="bi-trash"></i></button></div>
                    <div class="position-absolute" style="top: 0; bottom: 0; right: 0; left: 0;" x-show.transition="dragging !== null" :class="{'bg-secondary': dropping === index}" @dragenter.prevent="if(index !== dragging) {dropping = index}" @dragleave="if(dropping === index) dropping = null"></div>
                </div>
            </template>
            <!-- <div class="input-group mt-2"><input type="text" class="form-control form-inline" x-model="newItem"></input><button class="btn btn-primary form-inline" x-bind:disabled="newItem == ''" @click="items.push(newItem);newItem=''">Add Flavor</button></div> -->
        </div>
    </div>
    <hr>
</div>
<script>
        function handler() {
            return {
                items: ['Chocolate', 'Vanilla', 'Strawberry', 'Cookies and Creme'],
                newItem:'', dragging: null, dropping: null,
                dragDropList(dragging, dropping) {
                    if (dragging !== null && dropping !== null) {
                        if (dragging < dropping) {
                            this.items = [
                                ...this.items.slice(0, dragging),
                                ...this.items.slice(dragging + 1, dropping + 1),
                                this.items[dragging],
                                ...this.items.slice(dropping + 1)
                            ];
                        } else {
                            this.items = [
                                ...this.items.slice(0, dropping),
                                this.items[dragging],
                                ...this.items.slice(dropping, dragging),
                                ...this.items.slice(dragging + 1)
                            ];
                        }
                       // dropping = null;
                    }

                    return this.items;
                }
            }
        }
</script>