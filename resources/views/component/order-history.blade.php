@include('component.pageheader', [
    'pageTitle' => 'Lịch sử mua hàng'
])

<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center animate__animated animate__fadeInLeft">
                        <i class="fas fa-history text-primary me-3"></i>
                        <h1 class="display-6 fw-bold mb-0">Lịch sử mua hàng</h1>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('shop') }}" class="btn btn-outline-primary">
                            <i class="fas fa-shopping-cart me-2"></i>Mua hàng
                        </a>
                        <a href="{{ route('user.orders') }}" class="btn btn-outline-primary">
                            <i class="fas fa-shopping-bag me-2"></i>Đơn hàng hiện tại
                        </a>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <h5 class="text-muted">Tổng đơn hàng</h5>
                                <h3 class="text-primary">{{ $orders->total() }}</h3>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-muted">Đã hoàn tất</h5>
                                <h3 class="text-success">{{ $orders->where('Trangthaidh', 'HT')->count() }}</h3>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-muted">Đã hủy</h5>
                                <h3 class="text-danger">{{ $orders->where('Trangthaidh', 'HD')->count() }}</h3>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-muted">Tổng chi tiêu</h5>
                                <h3 class="text-primary">{{ number_format($orders->sum('Tongtien')) }}đ</h3>
                            </div>
                        </div>
                    </div>
                </div>

                @if($orders->isEmpty())
                    <div class="text-center py-5 animate__animated animate__fadeIn">
                        <img src="{{ asset('img/empty-cart.png') }}" alt="Empty History" class="img-fluid mb-4" style="max-width: 200px">
                        <h4 class="text-muted mb-4">Chưa có lịch sử đơn hàng</h4>
                        <p class="text-muted mb-4">Hãy mua sắm và quay lại sau nhé!</p>
                        <a href="{{ route('shop') }}" class="btn btn-primary">
                            <i class="fas fa-shopping-cart me-2"></i>Mua sắm ngay
                        </a>
                    </div>
                @else
                    <div class="animate__animated animate__fadeInUp">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th><i class="fas fa-hashtag me-2"></i>Mã đơn hàng</th>
                                        <th><i class="far fa-calendar-alt me-2"></i>Ngày đặt</th>
                                        <th><i class="fas fa-money-bill-wave me-2"></i>Tổng tiền</th>
                                        <th><i class="fas fa-map-marker-alt me-2"></i>Địa chỉ</th>
                                        <th><i class="fas fa-info-circle me-2"></i>Trạng thái</th>
                                        <th><i class="fas fa-cogs me-2"></i>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="fs-6">
                                    @foreach($orders as $order)
                                    <tr class="animate__animated animate__fadeIn">
                                        <td class="fw-bold">#{{ $order->IDDonhang }}</td>
                                        <td>{{ date('d/m/Y H:i', strtotime($order->Ngaylapdh)) }}</td>
                                        <td class="fw-bold text-primary">{{ number_format($order->Tongtien) }}đ</td>
                                        <td>{{ Str::limit($order->Diachi, 30) }}</td>
                                        <td>
                                            @if($order->Trangthaidh == 'HT')
                                                <span class="badge bg-success animate__animated animate__pulse animate__infinite">
                                                    <i class="fas fa-check-circle me-1"></i>Hoàn tất
                                                </span>
                                            @else
                                                <span class="badge bg-danger animate__animated animate__headShake animate__infinite">
                                                    <i class="fas fa-times-circle me-1"></i>Đã hủy
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.orders.detail', $order->IDDonhang) }}" 
                                               class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-eye me-2"></i>Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="d-flex justify-content-center">
                            {{ $orders->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .badge {
        padding: 8px 12px;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.8rem;
    }
    
    .table td, .table th {
        vertical-align: middle;
        padding: 12px;
        font-size: 0.9rem;
        white-space: nowrap;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .table {
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .table:hover {
        box-shadow: 0 0 25px rgba(0,0,0,0.12);
    }

    .table thead {
        background-color: #2c3e50;
        color: white;
    }

    .table thead th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .pagination {
        margin-bottom: 0;
        gap: 3px;
    }

    .pagination .page-link {
        border-radius: 50%;
        margin: 0 3px;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }

    .animate__animated {
        animation-duration: 0.8s;
    }

    .img-fluid {
        animation: float 3s ease-in-out infinite;
    }

    .alert {
        border-radius: 12px;
        border-left: 4px solid #17a2b8;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }

    .btn-group {
        gap: 5px;
    }

    .table-responsive {
        border-radius: 12px;
        overflow: hidden;
    }
</style>
