
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
                <a class="btn btn-primary" href="{{route('category.create')}}">Thêm danh mục</a>
            </div>
          <table class="mt-3 table table-hover">
            <tr>
                <td>Mã loại sản phẩm</td>
                <td>Tên loại sản phẩm</td>
                <td></td>
                <td></td>
            </tr>
            @foreach($data as $v)
            <tr>
                <td>{{$v->IDLoai}}</td>
                <td>{{$v->Tenloai}}</td>
                <td>
                    <form action="{{route('category.update',$v->IDLoai)}}" method="POST"
                        style="display: inline;">
                            @csrf
                            <button type="submit" style="background:none; border:none; cursor:pointer;">
                            <a class="far fa-edit fa-2x " style="color:black;"></a>
                            </button>
                    </form>
                </td>
                <td>
                    <form action="{{route('category.delete',$v->IDLoai)}}" method="POST"
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