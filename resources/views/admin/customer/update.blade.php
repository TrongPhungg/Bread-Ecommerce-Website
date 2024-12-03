
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
            <a href="{{route('customer.index')}}">Danh sách khách hàng</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="{{route('customer.update',$kh->IDKhachhang)}}">Chỉnh sửa khách hàng</a>
          </li>
        </ul>
      </div>
<div class="col-12 card">
<div class="col-6 ">
    <form action="{{route('handleupdate',$kh->IDKhachhang)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group form-inline">
            <label
              for="inlineinput"
              class="col-md-3 col-form-label"
              >Họ tên</label>
            <div class="col-md-9 p-0">
              <input
                type="text"
                class="form-control input-full"
                name="TenKhachhang"
                value="{{$kh->TenKhachhang}}"
              />
            </div>
        </div>
        <div class="form-group form-inline">
            <label
              for="inlineinput"
              class="col-md-3 col-form-label"
              >Ngày sinh</label
            >
            <div class="col-md-9 p-0">
              <input
                type="date"
                class="form-control input-full"
                name="Ngaysinh"
                value={{$kh->Ngaysinh}}
              />
            </div>
        </div>
        <div class="form-group">
                <label>Giới tính</label><br />
                <div class="d-flex">
                <div class="form-check">
                <input
                    class="form-check-input"
                    type="radio"
                    name="Gioitinh"
                    @if($kh->Gioitinh == 1)
                    checked
                    @endif
                    value="1"
                    />
                    Nam
                </div>
                <div class="form-check">
                    <input
                    class="form-check-input"
                    type="radio"
                    name="Gioitinh"
                    @if($kh->Gioitinh == 0)
                    checked
                    @endif
                    value="0"
                    />
                     Nữ
                </div>
                </div>
        </div>
        <div class="form-group form-inline">
            <label
              for="inlineinput"
              class="col-md-3 col-form-label"
              >Số điện thoại</label
            >
            <div class="col-md-9 p-0">
              <input
                type="text"
                class="form-control input-full"
                name="Sodienthoai"
                value={{$kh->Sodienthoai}}
              />
            </div>
        </div>
        <div class="form-group form-inline">
            <label
              for="inlineinput"
              class="col-md-3 col-form-label"
              >Địa chỉ</label
            >
            <div class="col-md-9 p-0">
                <input
                type="text"
                class="form-control input-full"
                name="Diachi"
                value="{{$kh->Diachi}}"
              />
            </div>
        </div>
        <div class="card-action">
            <input type="submit" value="Submit" class="btn btn-success"></input>
            <button class="btn btn-danger">Cancel</button>
        </div>
    </form>
</div>
</div>