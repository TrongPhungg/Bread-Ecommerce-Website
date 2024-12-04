@include('component.pageheader', [
    'pageTitle' => 'Chi tiết đơn hàng #' . $order->IDDonhang
])

<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center mb-3 mb-sm-0">
                        <i class="fas fa-file-invoice text-primary me-3"></i>
                        <h2 class="mb-0 fs-4">Chi tiết đơn hàng #{{ $order->IDDonhang }}</h2>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Quay lại
                    </a>
                </div>

                <!-- Thông tin đơn hàng -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 fs-6"><i class="fas fa-info-circle me-2"></i>Thông tin đơn hàng</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <p class="mb-2"><strong><i class="far fa-calendar-alt me-2"></i>Ngày đặt:</strong><br class="d-block d-sm-none"> 
                                    {{ date('d/m/Y', strtotime($order->Ngaylapdh)) }}</p>
                                <p class="mb-2"><strong><i class="fas fa-map-marker-alt me-2"></i>Địa chỉ:</strong><br class="d-block d-sm-none">
                                    {{ $order->Diachi }}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="mb-2"><strong><i class="fas fa-money-bill-wave me-2"></i>Tổng tiền:</strong><br class="d-block d-sm-none">
                                    <span class="text-primary fw-bold">{{ number_format($order->Tongtien) }}đ</span></p>
                                <p class="mb-2"><strong><i class="fas fa-info-circle me-2"></i>Trạng thái:</strong><br class="d-block d-sm-none">
                                    @switch($order->Trangthaidh)
                                        @case('DXN')
                                            <span class="badge bg-info">Đã xác nhận</span>
                                            @break
                                        @case('HT')
                                            <span class="badge bg-success">Hoàn tất</span>
                                            @break
                                        @case('DTN')
                                            <span class="badge bg-primary">Đã thanh toán</span>
                                            @break
                                        @case('DG')
                                            <span class="badge bg-warning">Đang giao</span>
                                            @break
                                        @case('HD')
                                            <span class="badge bg-danger">Đã hủy</span>
                                            @break
                                        @default
                                            <span class="badge bg-secondary">Chờ xác nhận</span>
                                    @endswitch
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chi tiết sản phẩm -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 fs-6"><i class="fas fa-shopping-cart me-2"></i>Chi tiết sản phẩm</h5>
                    </div>
                    <div class="card-body p-0 p-sm-3">
                        <div class="d-none d-md-block">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Thông tin sản phẩm</th>
                                        <th scope="col" class="text-center">Đơn giá</th>
                                        <th scope="col" class="text-center">Số lượng</th>
                                        <th scope="col" class="text-end">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderDetails as $detail)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/img/' . $detail->Hinh) }}" 
                                                 alt="{{ $detail->Tensanpham }}" 
                                                 class="img-thumbnail product-img"
                                                 style="width: 80px; height: 80px; object-fit: cover;">
                                        </td>
                                        <td>
                                            <h6 class="mb-1 fs-6">{{ $detail->Tensanpham }}</h6>
                                            <p class="text-muted small mb-0">{{ Str::limit($detail->Motasanpham, 100) }}</p>
                                            <div class="mt-2">
                                                <span class="badge bg-info text-dark">
                                                    <i class="fas fa-box me-1"></i>{{ $detail->Donvitinh }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="fw-bold">{{ number_format($detail->Dongia) }}đ</div>
                                            @if($detail->Dongia != $detail->GiaSanPham)
                                                <small class="text-muted text-decoration-line-through">
                                                    {{ number_format($detail->GiaSanPham) }}đ
                                                </small>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="badge bg-secondary">
                                                {{ $detail->Soluongsp }}
                                            </span>
                                        </td>
                                        <td class="text-end align-middle">
                                            <span class="fw-bold text-primary">
                                                {{ number_format($detail->Dongia * $detail->Soluongsp) }}đ
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="4" class="text-end">
                                            <strong>Tổng số lượng:</strong>
                                        </td>
                                        <td class="text-end">
                                            <strong>{{ $tongSoLuong }} sản phẩm</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">
                                            <strong>Tổng tiền:</strong>
                                        </td>
                                        <td class="text-end">
                                            <strong class="text-primary">{{ number_format($order->Tongtien) }}đ</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Mobile view -->
                        <div class="d-md-none">
                            @foreach($orderDetails as $detail)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <img src="{{ asset('assets/img/' . $detail->Hinh) }}" 
                                             alt="{{ $detail->Tensanpham }}"
                                             class="img-thumbnail me-3"
                                             style="width: 80px; height: 80px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-1">{{ $detail->Tensanpham }}</h6>
                                            <p class="text-muted small mb-1">{{ Str::limit($detail->Motasanpham, 50) }}</p>
                                            <div class="d-flex gap-2">
                                                <span class="badge bg-light text-dark">
                                                    <i class="fas fa-tag me-1"></i>{{ $detail->IDSanpham }}
                                                </span>
                                                <span class="badge bg-info text-dark">
                                                    <i class="fas fa-box me-1"></i>{{ $detail->Donvitinh }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="fw-bold">{{ number_format($detail->Dongia) }}đ</div>
                                            @if($detail->Dongia != $detail->GiaSanPham)
                                                <small class="text-muted text-decoration-line-through">
                                                    {{ number_format($detail->GiaSanPham) }}đ
                                                </small>
                                            @endif
                                        </div>
                                        <span class="badge bg-secondary">SL: {{ $detail->Soluongsp }}</span>
                                        <span class="fw-bold text-primary">
                                            {{ number_format($detail->Dongia * $detail->Soluongsp) }}đ
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <strong>Tổng số lượng:</strong>
                                        <strong>{{ $tongSoLuong }} sản phẩm</strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <strong>Tổng tiền hàng:</strong>
                                        <strong class="text-primary">{{ number_format($order->Tongtien) }}đ</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    
    .card-header {
        border-bottom: none;
        padding: 15px 20px;
    }
    
    .badge {
        padding: 8px 12px;
        border-radius: 20px;
        font-weight: 500;
        white-space: normal;
        text-align: center;
    }
    
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }
    
    .table td {
        vertical-align: middle;
        padding: 1rem;
    }
    
    .img-thumbnail {
        border-radius: 10px;
        transition: transform 0.2s;
    }
    
    .img-thumbnail:hover {
        transform: scale(1.1);
    }
    
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }
    
    .btn-outline-primary:hover {
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }
    
    .product-img {
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    
    .product-img:hover {
        transform: scale(1.1);
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    
    .small {
        font-size: 0.875rem;
    }

    @media (max-width: 576px) {
        .card-body {
            padding: 0.75rem;
        }

        .badge {
            padding: 6px 10px;
            font-size: 0.8rem;
        }

        h2 {
            font-size: 1.25rem;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
    }
</style> 