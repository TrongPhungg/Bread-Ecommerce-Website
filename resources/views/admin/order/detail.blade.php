
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
            <h3>Đơn hàng của anh/chị {{$dh->TenKhachhang}}. Bao gồm:</h3>

          <table class="mt-3 table table-hover">
            <tr>
                <td>Mã sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td>Đơn giá</td>
                <td>Số lượng sản phẩm</td>
                <td>Đơn vị tính</td>
                <td>Thành tiền</td>
            </tr>
            @foreach($data as $v)
                <tr>
                    <td>{{$v->Masanpham}}</td>
                    <td>
                        @foreach($dssp as $b)
                            @if($v->Masanpham == $b->IDSanpham)
                                {{$b->Tensanpham}}
                            @endif
                        @endforeach
                    </td>
                    <td>{{$v->Dongia}}</td>
                    <td>{{$v->Soluongsp}}</td>
                    <td>
                        @foreach($dssp as $b)
                            @if($v->Masanpham == $b->IDSanpham)
                                {{$b->Donvitinh}}
                            @endif
                        @endforeach
                    </td>
                    <td>{{number_format($v->Dongia *$v->Soluongsp,0,',',',').'VNĐ'}}</td>
                </tr>
            @endforeach
          </table>
         <div>

         </div>
        </div>
      </div>
      </div>
    </div>
  </div>