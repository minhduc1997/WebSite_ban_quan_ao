@extends('frontend.layout.main')
@section('tittle',"shop")
@section('content')
		<!-- main -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-push-3">
						<div class="row row-pb-lg">
                                @foreach ($product_featured as $item)
							<div class="col-md-4 text-center">
                        <a href="/product/detail/{{ $item->id }}">
                                <div class="product-entry">

                                        <div class="product-img" style="background-image: url(/backend/img/{{ $item->img }});">
                                            <p class="tag"><span class="new">featured</span></p>
                                            <div class="cart">
                                                <p>
                                                    <span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
                                                    <span><a href="/product/detail/{{ $item->id }}"><i class="icon-eye"></i></a></span>


                                                </p>
                                            </div>
                                        </div>

                                        <div class="desc">
                                            <h3><a href="/product/detail/{{ $item->id }}">{{ $item->name }}</a></h3>
                                            <p class="price"><span> {{ number_format($item->price,0,".",".") }} đ</span></p>
                                        </div>
                                    </div>

                            </div>
                        </a>
                            @endforeach
                            {{--  @foreach ($product_new as $item)
							<div class="col-md-4 text-center">

                                <div class="product-entry">
                                        <div class="product-img" style="background-image: url(images/item-14.jpg);">
                                            <p class="tag"><span class="new">New</span></p>
                                            <div class="cart">
                                                <p>
                                                    <span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
                                                    <span><a href="product-detail.html"><i class="icon-eye"></i></a></span>


                                                </p>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <h3><a href="product-detail.html">Floral Dress</a></h3>
                                            <p class="price"><span>3.000.000 đ</span></p>
                                        </div>
                                    </div>

                            </div>
                            @endforeach  --}}


						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									 {!!  $product_featured->links()!!}
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-md-pull-9">
						<div class="sidebar">
							<div class="side">
								<h2>Danh mục</h2>
								<div class="fancy-collapse-panel">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        @foreach ($category as $item)
                                        <div class="panel panel-default">
                                                @if ($item->parent==0)
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#{{ $item->id }}" aria-expanded="true" aria-controls="collapseOne">
                                                               {{ $item->name }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                @endif

                                                <div id="{{ $item->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            <ul>

                                                                @foreach ($category as $item2)
                                                                @if ($item->id==$item2->parent)
                                                                <li><a href="/product?cat_id={{ $item2->id }}">{{ $item2->name }}</a></li>
                                                                @endif
                                                                @endforeach





                                                            </ul>
                                                        </div>
                                                    </div>


                                            </div>
                                        @endforeach




									</div>
								</div>
							</div>
							<div class="side">
								<h2>Khoảng giá</h2>
								<form method="get" class="colorlib-form-2">

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="guests">Từ:</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="start" id="people" class="form-control">
														<option value="100000">100.000 VNĐ</option>
														<option value="200000">200.000 VNĐ</option>
														<option value="300000">300.000 VNĐ</option>
														<option value="500000">500.000 VNĐ</option>
														<option value="1000000">1.000.000 VNĐ</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label for="guests">Đến:</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="end" id="people" class="form-control">
														<option value="2000000">2.000.000 VNĐ</option>
														<option value="4000000">4.000.000 VNĐ</option>
														<option value="6000000">6.000.000 VNĐ</option>
														<option value="8000000">8.000.000 VNĐ</option>
														<option value="10000000">10.000.000 VNĐ</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<button type="submit" style="width: 100%;border: none;height: 40px;">Tìm kiếm</button>
								</form>
                            </div>
                            @foreach ($attribute as $item)
                            <div class="side">
                                    <h2>{{$item->name }}</h2>
                                    <div class="size-wrap">
                                        <p class="size-desc">
                                            @foreach ($item->values as $item1)
                                            <a href="/product?attr={{ $item1->id }}" class="attr">{{ $item1->value }}</a>
                                            @endforeach



                                        </p>
                                    </div>
                                </div>

                            @endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end main -->
        @endsection
