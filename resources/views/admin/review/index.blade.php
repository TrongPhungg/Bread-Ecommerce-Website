
<div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Tables</h3>
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
            <a href="#">Sản phẩm</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="{{route('product.index')}}">Danh mục sản phẩm</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="card">
          <table class="mt-3 table table-hover">
            <tr>
                <td>Mã đánh giá</td>
                <td>Tên khách hàng</td>
                <td>Tên sản phẩm</td>
                <td>Đánh giá</td>
                <td>Số điểm</td>
                <td>Ngày thực hiện đánh giá</td>
                <td>Trạng thái đánh giá</td>
                <td></td>
            </tr>
            @foreach($data as $v)
            <tr>
                <td>{{$v->IDDanhgia}}</td>
                <td>
                  @php
                  foreach($dskh as $kh){
                    if($kh->IDKhachhang == $v->IDKhachhang)
                        echo $kh->TenKhachhang;
                  }
                  @endphp
                </td>
                <td>
                  @php
                  foreach($dssp as $sp){
                    if($sp->IDSanpham == $v->IDSanpham)
                        echo $sp->Tensanpham;
                  }
                  @endphp
                </td>
                <td>{{$v->Danhgia}}</td>
                <td>{{$v->Sodiem}}</td>
                <td>{{$v->Ngaydanhgia}}</td>
                <td>
                  @switch($v->Trangthaidg)
                  @case("1")
                  <span class="badge bg-success">Hiển thị</span>
                  @break
                  @case("0")
                  <span class="badge bg-danger">Không hiển thị</span>
                  @break
                  @endswitch
                </td>
                <td>
                    {{-- <form action="{{route('opinion.delete',$v->IDDanhgia)}}" method="POST"
                    style="display: inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đánh giá {{$v->IDDanhgia}} không?');">
                        @csrf
                        @method('delete')
                        <button type="submit" style="background:none; border:none; cursor:pointer;">
                            <a class="fa fa-ban fa-2x" style="color:red;"></a>
                        </button>
                    </form> --}}
                    <a href="{{route('update',$v->IDDanhgia)}}" class="btn btn-primary">Cập nhật trạng thái</a>
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