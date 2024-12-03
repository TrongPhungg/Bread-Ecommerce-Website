@include('component.pageheader', [
    'pageTitle' => 'Shop Detail'
])

  <!-- Single Product Start -->
  <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9" id="ProductForms" >
                        <form id="form{{$product->IDSanpham}}">
                        <div class="row g-4">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                @csrf
                                <input  type="text" value={{$product->IDSanpham}} id="product-id" hidden>
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="{{ asset('assets/img/'.$product->Hinh) }}" id="product-hinh" class="img-fluid rounded" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 id="product-name" class="fw-bold mb-3">{{$product->Tensanpham}}</h4>
                                <p class="mb-3">Category: Vegetables</p>
                                <h5 id="product-price" class="fw-bold mb-3">{{number_format($product->Dongia,0,',',',').'VNĐ'}}</h5>
                                <div class="d-flex mb-4">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="mb-4">{{$product->Motasanpham}}</p>
                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input id="product-quantity" type="text" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="submit" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
                                    <i class="fa fa-shopping-bag me-2 text-primary">
                                    </i> Add to cart</button>
                            </div>
                            </form>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                        @foreach($danhgia as $d)
                                        @if($d->Trangthaidg == 1)
                                        <div class="d-flex">
                                            <img src="{{ asset('assets/img/avatar.jpg') }}" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                            <div class="">
                                                <p class="mb-2" style="font-size: 14px;">{{$d->Ngaydanhgia}}</p>
                                                <div class="d-flex justify-content-between">
                                                    <h5>{{$d->khachhang->TenKhachhang}}</h5>
                                                    <div class="d-flex mb-3">
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p>{{$d->Danhgia}}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="tab-pane" id="nav-vision" role="tabpanel">
                                        <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                            amet diam et eos labore. 3</p>
                                        <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                            Clita erat ipsum et lorem et sit</p>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::check())
                            <form action="{{route('handlecreate')}}" method="POST">
                                @csrf
                                <input type="hidden" name="IDSanpham" value="{{$product->IDSanpham}}"/>
                                <input type="hidden" name="IDKhachhang" value="{{Auth::user()->IDKhachhang}}"/>
                                <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="border-bottom rounded my-4">
                                            <textarea name="Danhgia" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between py-3 mb-5">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0 me-3">Please rate:</p>
                                                <div class="d-flex align-items-center" style="font-size: 12px;">
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            <div class="col-lg-12">
                                <h4 class="mb-4">Sản phẩm bán chạy</h4>
                                @foreach($random as $sp)
                                <a href="{{route('detail',$sp->IDSanpham)}}">
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded" style="width: 100px; height: 100px;">
                                        <img src="{{ asset('assets/img/'.$sp->Hinh) }}" class="img-fluid rounded" alt="Image">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">{{$sp->Tensanpham}}</h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">{{number_format($sp->Dongia,0,',',',')}}</h5>
                                            <h5 class="text-danger text-decoration-line-through">{{number_format($sp->Dongia-($sp->Dongia *10/100),0,',',',')}}</h5>
                                        </div>
                                    </div>
                                </div>
                                </a>
                                @endforeach
                                <div class="d-flex justify-content-center my-4">
                                    <a href="{{route('shop')}}" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">View More</a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="{{ asset('assets/img/banner-fruits.jpg') }}" class="img-fluid w-100 rounded" alt="">
                                    <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                        <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="fw-bold mb-0">Related products</h1>
                <div class="vesitable">
                    <div class="owl-carousel vegetable-carousel justify-content-center">
                        @foreach($dssp as $sp)
                        @if($sp->IDLoaisanpham == $product->IDLoaisanpham)
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="{{ asset('assets/img/'.$sp->Hinh) }}" class="img-fluid w-100 rounded-top" alt="">
                            </div>

                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>{{$sp->Tensanpham}}</h4>
                                <p>{{Str::limit($sp->Motasanpham,50)}}</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">{{$sp->Dongia}}</p>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->