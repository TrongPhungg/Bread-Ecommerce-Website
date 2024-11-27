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
          <a href="#">Người dùng</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="{{route('user.index')}}">Danh sách người dùng</a>
        </li>
      </ul>
    </div>
    @if(session('edit_success'))
    <div class="alert alert-success" id="edit-alert" style="background-color: #28a745; color: white;">
        {{ session('edit_success') }}
    </div>
    @endif
    @if(session('delete_error')) 
    <div class="alert alert-danger" id="delete-alert" style="background-color: #dc3545; color: white;">
        {{ session('delete_error') }}
    </div>
    @endif
    @if(session('create_success')) 
    <div class="alert alert-success" id="create-alert" style="background-color: #28a745; color: white;">
        {{ session('create_success') }}
    </div>
    @endif

    <script>
        setTimeout(function() {
            if(document.getElementById('edit-alert')) {
                document.getElementById('edit-alert').style.display = 'none';
            }
            if(document.getElementById('delete-alert')) {
                document.getElementById('delete-alert').style.display = 'none';
            }
            if(document.getElementById('create-alert')) {
                document.getElementById('create-alert').style.display = 'none';
            }
        }, 2000);
    </script>
    <div class="row">
      <div class="card">
        <div class="my-2">
          <a class="btn btn-primary" href="{{ route('user.create') }}">Thêm người dùng</a>
        </div>
        <table class="mt-3 table table-hover">
          <tr>
            <td>ID</td>
            <td>Tên</td>
            <td>Email</td>
            <td>Địa chỉ</td>
            <td>Ngày sinh</td>
            <td>Vai trò</td>
            <td></td>
            <td></td>
          </tr>
          @foreach($data as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->birthday ? date('d/m/Y', strtotime($user->birthday)) : ''}}</td>
            <td>
              @if($user->role === 1)
                Admin
              @else
                Khách hàng
              @endif
            </td>
            <td>
              <form action="{{ route('user.edit', $user->id) }}" method="GET" style="display: inline;">
                <button type="submit" style="background:none; border:none; cursor:pointer;">
                  <a class="far fa-edit fa-2x" style="color:black;"></a>
                </button>
              </form>
            </td>
            <td>
              <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng {{$user->name}} không?');">
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
        <div class="d-flex justify-content-center mt-3">
            {!! $data->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
