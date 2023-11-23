<header>
    <div class="container">
        <div class="row">
            <div class="col-2 col-md-1 d-lg-none">
                <div class="wsus__mobile_menu_area">
                    <span class="wsus__mobile_menu_icon"
                        ><i class="fal fa-bars"></i
                    ></span>
                </div>
            </div>
            <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                <div class="wsus_logo_area">
                    <a class="wsus__header_logo pt-1" href="{{route('home')}}">
                        <img
                            src="{{asset('frontend/images')}}/logo12.png"
                            alt="logo"
                            class="img-fluid w-100"
                        />
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-lg-4 d-none d-lg-block">
                <div class="wsus__search">
                    <form>
                        <input type="text" placeholder="Search..." />
                        <button type="submit">
                            <i class="far fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-3 col-md-3 col-lg-6">
                <div class="wsus__call_icon_area">
                    <div class="wsus__call_area">
                        <div class="wsus__call">
                            <i class="fas fa-user-headset"></i>
                        </div>
                        <div class="wsus__call_text">
                            <p style="text-transform: lowercase;">shahadat.murshed@gmail.com</p>
                            <p>+8801834843889</p>
                        </div>
                    </div>
                    <ul class="wsus__icon_area">
                        <li>
                            <a href="wishlist.html"
                                ><i class="fal fa-heart"></i><span>05</span></a
                            >
                        </li>
                        <li>
                            <a href="compare.html"
                                ><i class="fal fa-random"></i><span>03</span></a
                            >
                        </li>
                        <li>
                            <a class="wsus__cart_icon" href="#"
                                ><i class="fal fa-shopping-bag"></i
                                ><span id="cart-count">{{Cart::content()->count()}}</span></a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div style="color: black" class="wsus__mini_cart">
        <h4 style="color: black">
            shopping cart
            <span class="wsus_close_mini_cart"
                ><i class="far fa-times"></i
            ></span>
        </h4>
        <ul class="mini_cart_wrapper">
            @foreach (Cart::content() as $sidebarProduct)
                <li id="mini_cart_{{$sidebarProduct->rowId}}">
                    <div class="wsus__cart_img">
                        <a href="#"><img src="{{asset($sidebarProduct->options->image)}}" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon remove_sidebar_product" data-id="{{$sidebarProduct->rowId}}" href="#" ><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a style="color:black" class="wsus__cart_title" href="{{route('product-detail', $sidebarProduct->options->slug)}}">{{$sidebarProduct->name}}</a>
                        <p>
                            {{$settings->currency_icon}}{{$sidebarProduct->price}}
                        </p>
                        <small style="color:black">Quantity: {{$sidebarProduct->qty}}</small>
                        <br>
                        <small style="color:black">Total: {{$settings->currency_icon.($sidebarProduct->price + $sidebarProduct->options->variants_total) * $sidebarProduct->qty}}</small>
                    </div>
                </li>
            @endforeach
            @if (Cart::content()->count() == 0)
                <li class="text-center" style="color: black">Cart is Empty</li>
            @endif
        </ul>
        <div class="mini_cart_actions {{Cart::content()->count() == 0 ? 'd-none' : ''}}">
            <h5 style="color: black">sub total <span id="mini_cart_subtotal"></span></h5>
            <div class="wsus__minicart_btn_area">
                <a class="common_btn" href="{{route('cart-details')}}">view cart</a>
                <a class="common_btn" href="check_out.html">checkout</a>
            </div>
        </div>
    </div>
</header>