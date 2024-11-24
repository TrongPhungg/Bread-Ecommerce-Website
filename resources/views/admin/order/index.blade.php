
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
                <td></td>
            </tr>
            @foreach($data as $v)
            <tr>
                <td>{{$v->IDDonhang}}</td>
                <td>{{$v->TenKhachhang}}</td>
                <td>{{$v->Ngaylapdh}}</td>
                <td>{{$v->Trangthaidh}}</td>
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
                <td>
                    <form action="" method="POST"
                    style="display: inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm  không?');">
                        @csrf
                        @method('delete')
                        <button type="submit" style="background:none; border:none; cursor:pointer;">
                            <a class="fa fa-ban fa-2x" style="color:red;"></a>
                        </button>
                    </form>
                </td>
            </tr>
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