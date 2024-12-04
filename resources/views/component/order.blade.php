@include('component.pageheader', [
    'pageTitle' => 'Đơn hàng của tôi'
])

<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-12">
                @if($orders->isEmpty())
                    <div class="text-center py-5">
                        <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Bạn chưa có đơn hàng nào</p>
                        <a href="{{ route('shop') }}" class="btn btn-primary">Mua sắm ngay</a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->IDDonhang }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($order->Ngaylapdh)) }}</td>
                                    <td>{{ number_format($order->Tongtien) }}đ</td>
                                    <td>{{ $order->Diachi }}</td>
                                    <td>
                                        @switch($order->Trangthaidh)
                                            @case('DXN')
                                                <span class="badge bg-info">Đã xác nhận</span>
                                                @break
                                            @case('DTN')
                                                <span class="badge bg-primary">Đã thanh toán</span>
                                                @break
                                            @case('DTT')
                                                <span class="badge bg-primary">Đã thanh toán</span>
                                                @break
                                            @case('DG')
                                                <span class="badge bg-warning">Đang giao</span>
                                                @break
                                            @default
                                                <span class="badge bg-secondary">Chờ xác nhận</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('user.orders.detail', $order->IDDonhang) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i> Chi tiết
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $orders->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .badge {
        padding: 8px 12px;
        border-radius: 20px;
        font-weight: 500;
    }
    .table td, .table th {
        vertical-align: middle;
    }
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease-in-out;
    }
    .btn-outline-primary:hover {
        transform: translateY(-2px);
        transition: transform 0.2s ease-in-out;
    }
    .table-responsive {
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .table thead {
        background-color: #343a40;
        color: white;
    }
    .table thead th {
        font-weight: 500;
        text-transform: uppercase;
        font-size: 0.9rem;
    }
    .pagination {
        margin-bottom: 0;
    }
</style>
