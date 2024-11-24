
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
            <a href="{{route('product.index')}}">Danh mục sản phẩm</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="{{route('product.create')}}">Chỉnh sửa sản phẩm</a>
          </li>
        </ul>
      </div>
<div class="col-12 card">
<div class="col-6 ">
<form  class="mt-3" action="{{route('handleupdate',$sp->IDSanpham)}}" method="POST">
    @csrf
    @method('put')
        <div class="form-group">
          <label for="Masanpham">Nhập mã sản phẩm</label>
          <input
            type="text"
            class="form-control"
            name ="Masanpham"
            placeholder="Nhập mã sản phẩm ..."
            value="{{$sp->IDSanpham}}"
          />
        </div>
        <div class="form-group">
            <label for="Tensanpham">Nhập tên sản phẩm</label>
            <input
              type="text"
              class="form-control"
              name ="Tensanpham"
              placeholder="Nhập tên sản phẩm ..."
              value="{{$sp->Tensanpham}}"
            />
        </div>
            <div class="form-group">
            <div class="input-group" 
            style="width: 100%; height: 150px;">
              <span class="input-group-text">Mô tả</span>
              <textarea
                class="form-control"
                name ="Mota"
                aria-label="With textarea"
              >{{$sp->Motasanpham}}</textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="email2">Nhập đơn vị tính</label>
            <input
              type="text"
              class="form-control"
              name ="Dvt"
              placeholder="Nhập đơn vị tính sản phẩm ..."
              value={{$sp->Donvitinh}}
            />
        </div>
        <div class="form-group">
            <label for="email2">Chọn hình</label>
            <input
              type="text"
              class="form-control"
              name ="Hinh"
              placeholder="Nhập tên sản phẩm ..."
              value={{$sp->Hinh}}
            />
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1"
              >Trạng thái đơn hàng</label
            >
            <select
              class="form-select"
              name="Trangthai"
            >
              <option value="1">Còn hàng</option>
              <option value="0">Hết hàng</option>
            </select>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <span class="input-group-text">VNĐ</span>
              <input
                type="text"
                name="Dongia"
                class="form-control"
                aria-label="Amount (to the nearest dollar)"
                value={{$sp->Dongia}}
              />
              <span class="input-group-text">.000</span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1"
              >Loại sản phẩm</label
            >
            <select
              class="form-select"
              name ="Loaisanpham"
            >
            @foreach($dssp as $a)
            <option value={{$a->IDLoai}} 
              @if($sp->IDLoaisanpham == $a->IDLoai)
                {{'selected'}}
              @endif>
              {{$a->Tenloai}}
            </option>
        @endforeach
            </select>
          </div>
          <div class="card-action">
            <input type="submit" value="Submit" class="btn btn-success"></input>
            <button class="btn btn-danger">Cancel</button>
          </div>
</form>
</div>
</div>