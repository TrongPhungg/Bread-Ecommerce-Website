@include('component.pageheader', [
    'pageTitle' => 'Chính sách'
])

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="bg-light p-4 mb-4 sticky-top" style="top: 100px;">
                    <h4 class="mb-3">Loại chính sách</h4>
                    <ul class="list-unstyled policy-categories">
                        @foreach($chinhsach as $cs)
                        <li class="mb-2">
                            <a href="#policy-{{$cs->IDChinhsach}}" class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-chevron-right me-2"></i>{{$cs->Tenchinhsach}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-9">
                @foreach($chinhsach as $cs)
                <div class="bg-light p-4 mb-4" id="policy-{{$cs->IDChinhsach}}" style="scroll-margin-top: 100px;">
                    <div class="policy-header mb-4">
                        <h2 class="mb-3">{{$cs->Tenchinhsach}}</h2>
                        <div class="text-muted">
                            <i class="far fa-calendar-alt me-2"></i>Ngày tạo: {{date('d/m/Y', strtotime($cs->Ngaytao))}}
                        </div>
                    </div>

                    <div class="policy-type mb-4">
                        <h5>Loại chính sách:</h5>
                        <span class="badge bg-primary">{{$cs->Loaichinhsach}}</span>
                    </div>

                    <div class="policy-description">
                        <h5>Nội dung chi tiết:</h5>
                        {!! $cs->Mota !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
