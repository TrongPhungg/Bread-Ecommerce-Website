@include('component.pageheader', [
    'pageTitle' => 'News'
    ])

<!-- News Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4 fw-bold text-primary">Tin tức mới nhất</h1>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa fa-newspaper"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <p class="text-muted">Cập nhật những tin tức, xu hướng và câu chuyện mới nhất từ thế giới làm bánh mì thủ công</p>
        </div>
        <div class="row g-4">
            @foreach($data as $v)
            <div class="col-lg-6 col-md-6">
                    <div class="bg-white p-4">
                        <div class="d-flex justify-content-between text-muted border-top pt-4">
                            <small><i class="fa fa-calendar-alt text-primary me-2"></i>{{$v->Ngaytao}}</small>
                            <small><i class="fa fa-user-edit text-primary me-2"></i>{{$v->Tacgia}}</small>
                            <small><i class="fa fa-comments text-primary me-2"></i>15</small>
                        </div>
                        <h5 class="my-3 fw-bold hover-text-primary">{{$v->Tieude}}</h5>
                        <p class="text-muted">{{$v->Mota}}</p>
                        <a class="btn btn-primary px-4 py-2 rounded-pill" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="blog-item shadow-sm rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ asset('assets/img/'.$v->Hinh) }}" class="img-fluid w-100 hover-zoom" alt="">
                            <div class="blog-overlay">
                                <a class="btn btn-outline-light rounded-circle" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- News End -->

