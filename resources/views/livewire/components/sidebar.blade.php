   <!--Sidebar-->
   <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

<ul class="list-reset flex flex-col">
    <li class=" w-full h-full py-3 px-2 border-b border-light-border  {{ Request::is('/') ? '' : '' }}">
        <a href="{{route('dashboard')}}"
           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
            <i class="fas fa-tachometer-alt float-left mx-2"></i>
            Dashboard
            <span><i class="fas fa-angle-right float-right"></i></span>
        </a>
    </li>
    <li class="w-full h-full py-3 px-2 border-b border-light-border {{ Request::is('/product') ? '' : '' }}">
        <a href="{{route('product.list')}}"
           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
            <i class="fab fa-wpforms float-left mx-2"></i>
            Products
            <span><i class="fa fa-angle-right float-right"></i></span>
        </a>
    </li>
    <li class="w-full h-full py-3 px-2 border-b border-light-border {{ Request::is('/cart') ? '' : '' }}">
        <a href="{{route('cart')}}"
           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
            <i class="fab fa-wpforms float-left mx-2"></i>
            Cart
            <span><i class="fa fa-angle-right float-right"></i></span>
        </a>
    </li>
</ul>

</aside>
<!--/Sidebar-->

