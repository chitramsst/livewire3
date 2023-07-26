   <!--Sidebar-->
   <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

<ul class="list-reset flex flex-col">
    <li class=" w-full h-full py-5 px-2 border-b border-light-border  {{ Request::is('/') ? '' : '' }}">
        <a href="{{route('dashboard')}}" wire:navigate
           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
            <i class="fas fa-tachometer-alt float-left mx-2"></i>
            Dashboard
            <span><i class="fas fa-angle-right float-right"></i></span>
        </a>
    </li>
    <li class="w-full h-full py-5 px-2 border-b border-light-border {{ Request::is('/product') ? '' : '' }}">
        <a href="{{route('product.list')}}" wire:navigate
           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
            <i class="fab fa-wpforms float-left mx-2"></i>
            Products
            <span><i class="fa fa-angle-right float-right"></i></span>
        </a>
    </li>
    <li class="w-full h-full py-5 px-2 border-b border-light-border {{ Request::is('/cart') ? '' : '' }}">
        <a href="{{route('cart')}}" wire:navigate
           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
           <i class="fa fa-shopping-cart float-left mx-2" aria-hidden="true"></i>
            Cart
            <span><i class="fa fa-angle-right float-right"></i></span>
        </a>
    </li>
    <li class="w-full h-full py-5 px-2 border-b border-light-border {{ Request::is('/service') ? '' : '' }}">
        <a href="{{route('service')}}" wire:navigate
           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
           <i class="fa fa-wrench float-left mx-2" aria-hidden="true"></i>
            Service
            <span><i class="fa fa-angle-right float-right"></i></span>
        </a>
    </li>
</ul>

</aside>
<!--/Sidebar-->

