
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

            <div class="my-2">
                <a class="btn btn-primary" href="{{route('product.create')}}">Thêm sản phẩm</a>
            </div>
          <table class="mt-3 table table-hover">
            <tr>
                <td>Mã sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td>Mô tả</td>
                <td>Đơn vị tính</td>
                <td>Trạng thái</td>
                <td>Đơn giá</td>
                <td></td>
                <td></td>
            </tr>
            @foreach($data as $v)
            <tr>
                <td>{{$v->IDSanpham}}</td>
                <td>{{$v->Tensanpham}}</td>
                <td>{{Str::limit($v->Motasanpham,50)}}</td>
                <td>{{$v->Donvitinh}}</td>
                <td>{{$v->Trangthai}}</td>
                <td>{{$v->Dongia}}</td>

                <td>
                    <form action="{{route('product.update',$v->IDSanpham)}}" method="POST"
                        style="display: inline;">
                            @csrf
                            <button type="submit" style="background:none; border:none; cursor:pointer;">
                            <a class="far fa-edit fa-2x " style="color:black;"></a>
                            </button>
                    </form>
                </td>
                <td>
                    <form action="{{route('product.delete',$v->IDSanpham)}}" method="POST"
                    style="display: inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm {{$v->Tensanpham}} không?');">
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