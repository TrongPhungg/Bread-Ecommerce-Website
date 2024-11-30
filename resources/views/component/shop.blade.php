@include('component.pageheader', [
    'pageTitle' => 'Shop'
])
        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Fresh fruits shop</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-xl-3">
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1" id="search-input" oninput="searchProducts()">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-xl-3">
                                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                    <label for="fruits">Default Sorting:</label>
                                    <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                        <option value="volvo">Nothing</option>
                                        <option value="saab">Popularity</option>
                                        <option value="opel">Organic</option>
                                        <option value="audi">Fantastic</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Danh mục sản phẩm</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                @foreach($dmsp as $b)
                                                <li data-product-id={{$b->IDLoai}} class="category-item" onclick="searchProducts()">
                                                    <div class="d-flex justify-content-between fruite-name" >
                                                        <a ><i class="fas fa-apple-alt me-2"></i>{{$b->Tenloai}}</a>
                                                        <span>(3)</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Price</h4>
                                            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="100000" value="0" oninput="amount.value = rangeInput.value; formatCurrency(amount)">
                                            <output id="amount" name="amount" for="rangeInput">0</output>
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
                            
                            <div class="col-lg-9" >
                                <div class="row g-4 justify-content-center" id="showProducts" >
                                    @foreach($data as $v)
                                    
                                    <div class="col-md-6 col-lg-6 col-xl-4  " id="ProductForms">
                                        <div class="rounded position-relative fruite-item">
                                            <form id="form{{$v->IDSanpham}}">
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                            @csrf
                                            <input  type="text" value={{$v->IDSanpham}} id="product-id" hidden>
                                            <input  type="text" value={{$IDKh ?? ""}} id="customer-id" hidden>
                                            <a href="{{ route('detail', $v->IDSanpham) }}">
                                            <div class="fruite-img">
                                                <img src="{{ asset('assets/img/'.$v->Hinh) }}" id="product-hinh" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4 id="product-name">{{$v->Tensanpham}}</h4>
                                                <p>{{Str::limit($v->Motasanpham,50)}}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0" id="product-price" >{{number_format($v->Dongia,0,',',',').'VNĐ'}}</p>
                                                </a>
                                                    <button type="submit" class="add-to-cart btn border border-secondary rounded-pill px-3 text-primary">
                                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                    </button>
                                                </form>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    @endforeach
                                    <div class="col-12" id="pagination">
                                        <div class=" d-flex justify-content-center mt-5">
                                            {{$data->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->