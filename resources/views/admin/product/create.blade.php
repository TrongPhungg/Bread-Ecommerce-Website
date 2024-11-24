
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
            <a href="{{route('product.create')}}">Thêm sản phẩm</a>
          </li>
        </ul>
      </div>
<div class="col-12 card">
<div class="col-6 ">
<form  class="mt-3" action="{{route('handlecreate')}}" method="POST">
    @csrf
        <div class="form-group">
          <label for="Masanpham">Nhập mã sản phẩm</label>
          <input
            type="text"
            class="form-control"
            name ="Masanpham"
            placeholder="Nhập mã sản phẩm ..."
          />
        </div>
        <div class="form-group">
            <label for="Tensanpham">Nhập tên sản phẩm</label>
            <input
              type="text"
              class="form-control"
              name ="Tensanpham"
              placeholder="Nhập tên sản phẩm ..."
            />
        </div>
            <div class="form-group">
            <div class="input-group">
              <span class="input-group-text">Mô tả</span>
              <textarea
                class="form-control"
                name ="Mota"
                aria-label="With textarea"
              ></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="email2">Nhập đơn vị tính</label>
            <input
              type="text"
              class="form-control"
              name ="Dvt"
              placeholder="Nhập đơn vị tính sản phẩm ..."
            />
        </div>
        <div class="form-group">
            <label for="email2">Chọn hình</label>
            <input
              type="text"
              class="form-control"
              name ="Hinh"
              placeholder="Nhập tên sản phẩm ..."
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
              <option value="BM">Bánh mì</option>
              <option value="BB">Bánh bao</option>
              <option value="BG">Hamburger</option>
            </select>
          </div>
          <div class="card-action">
            <input type="submit" value="Submit" class="btn btn-success"></input>
            <a href="{{route('product.index')}}"class="btn btn-danger">Cancel</a>
          </div>
</form>
</div>
</div>