
<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Đơn hàng</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home">
            <a href="#">
              <i class="icon-home"></i>
            </a>
          </li>
          
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="{{route('order.index')}}">Danh sách đơn hàng</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="card">
          <table class="mt-3 table table-hover">
            <tr>
                <td>Mã đơn hàng</td>
                <td>Tên khách hàng</td>
                <td>Ngày lập đơn hàng</td>
                <td>Trạng thái đơn hàng</td>
                <td>Tổng tiền</td>
                <td></td>
            </tr>
            @foreach($data as $v)
            @if($v->Trangthaidh != "")
            <tr>
                <td>{{$v->IDDonhang}}</td>
                <td>
                  @foreach($dskh as $kh)
                  @if($kh->IDKhachhang == $v->IDKhachhang)
                      {{$kh->TenKhachhang}}
                  @endif
                  @endforeach
                </td>
                <td>{{\Carbon\Carbon::parse($v->Ngaylapdh)->format('d/m/Y')}}</td>
                <td>
                  @switch($v->Trangthaidh)
                    @case("HD")
                    <span class="badge bg-dark">Đã hủy</span>
                    @break
                    @case("DTT")
                    <span class="badge bg-warning">Đã thanh toán</span>
                    @break
                    @case("DXN")
                    <span class="badge bg-primary">Đã xác nhận</span>
                    @break
                    @case("DG")
                    <span class="badge bg-danger">Đang giao hàng</span>
                    @break
                    @case("HT")
                    <span class="badge bg-success">Hoàn tất</span>
                    @break
                  @endswitch
                </td>
                <td>{{$v->Tongtien}}</td>
                <td>
                    <form action="{{route('order.detail',$v->IDDonhang)}}" method="POST"
                        style="display: inline;">
                            @csrf
                            <button type="submit" style="background:none; border:none; cursor:pointer;">
                            <a class="fas fa-shopping-cart fa-2x " style="color:rgb(63, 192, 231);"></a>
                            </button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
          </table>
         <div>
          <div>
            {{$data->links()}}
          </div>
         </div>
        </div>
      </div>
      </div>
    </div>
  </div>