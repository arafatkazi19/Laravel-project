<div class="header">
			<div class="header-top">
				<div class="container">
					 <div class="top-left">
						<a href="#"> Shop Wisely || Be Fashionable</a>
					</div>
					<div class="top-right">
					<ul>
{{--						<li><a href="checkout.html">Checkout</a></li>--}}
						@if(Session::get('customerId'))
						<li><a href="#" onclick="document.getElementById('customerLogout').submit();">Logout</a></li>
						<form id="customerLogout" action="{{route('customer-logout')}}" method="POST">
						@csrf
						</form>

						@else
							<li><a href="{{route('new-customer-login')}}">Register Here</a></li>
						@endif
{{--							<li><a href=""> Create Account </a></li>--}}
					</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left">
							<h1><a href="{{route('/')}}">New Shop <span>Shop anywhere</span></a></h1>
						</div>
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									@foreach($categories as $category)
{{--									<li class="active"><a href="{{route('')}}" class="act">Home</a></li>--}}
										<li class="active"><a href="{{route('category-product',['id'=>$category->id])}}" class="act">{{$category->category_name}}</a></li>
									<!-- Mega Menu -->

									@endforeach

								</ul>
							</div>
							</nav>
						</div>
{{--						<div class="logo-nav-right">--}}
{{--							<ul class="cd-header-buttons">--}}
{{--								<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>--}}
{{--							</ul> <!-- cd-header-buttons -->--}}
{{--							<div id="cd-search" class="cd-search">--}}
{{--								<form action="#" method="post">--}}
{{--									<input name="Search" type="search" placeholder="Search...">--}}
{{--								</form>--}}
{{--							</div>	--}}
{{--						</div>--}}
						<div class="header-right2">
							<div class="cart box_1">
								<a href="{{route('show-cart')}}">
									<h3> <div>
										<span></span> </div>
										<img src="{{asset('/')}}/frontEnd/images/bag.png" alt="" />
									</h3>
								</a>

								<div class="clearfix"> </div>
							</div>	
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>