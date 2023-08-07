    <div class="container  mx-auto my-10" x-data="{ atTop: true }">
        <!-- <div class="bg-gray-200 rounded  flex justify-center items-center indent-10 text-justify p-10 overflow-y-auto align-bottom leading-relaxed" @scroll.window="atTop = (window.pageYOffset > 40) ? false : true" :class="{ 'bg-green-500 shadow-md' : !atTop }"> -->
            <div class="mx-auto w-3/5">
                <canvas data-te-chart="bar" data-te-dataset-label="Traffic" 
                data-te-labels="['Monday', 'Tuesday' , 'Wednesday' , 'Thursday' , 'Friday' , 'Saturday' , 'Sunday ']" 
                data-te-dataset-data="[2112, 2343, 2545, 3423, 2365, 1985, 987]">
                </canvas>
            </div>
        <!-- </div> -->
    </div>
    @push('js')
    <script>
        // Initialization for ES Users
        import {
            Chart,
            initTE,
        } from "tw-elements";

        initTE({
            Chart
        });
    </script>
    @endpush