<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Quản lí tài khoản</h3>
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
          <a href="">Danh sách tài khoản</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="card">
          <div class="my-2">
              <a class="btn btn-primary" href="">Thêm tài khoản</a>
          </div>
      <table class="mt-3 table table-hover">
          <tr>
              <td>Mã khách hàng</td>
              <td>Tên khách hàng</td>
              <td>Giới tính</td>
              <td>Ngày sinh</td>
              <td>Số điện thoại</td>
              <td>Địa chỉ</td>
              <td></td>
              <td></td>
          </tr>
          @foreach($data as $v)
          <tr>
              <td>{{$v->IDKhachhang}}</td>
              <td>{{$v->TenKhachhang}}</td>
              <td>
                @php
                if($v->Gioitinh == 1)
                  echo "Nam";
                else echo "Nữ";
                @endphp
              </td>
              <td>{{\Carbon\Carbon::parse($v->Ngaysinh)->format('d/m/Y')}}</td>
              <td>{{$v->Sodienthoai}}</td>
              <td>{{$v->Diachi}}</td>
              <td>
                  <form action="{{route('customer.update',$v->IDKhachhang)}}" method="POST"
                      style="display: inline;">
                          @csrf
                          <button type="submit" style="background:none; border:none; cursor:pointer;">
                          <a class="far fa-edit fa-2x " style="color:black;"></a>
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
          {{$data->links()}}
        </div>
      </div>
    </div>
  </div>
</div>