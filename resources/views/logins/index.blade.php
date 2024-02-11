
@extends("layout")

@php
    $pageName = "logins";
    $i = 0;
@endphp

@section("content")
    <div class="row">
        <div class="col-lg-12 margin-tb">            
                <h2>CRUD For Users</h2>            
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this item?');
        }
    </script>


<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-10 col-sm-10 col-md-12 col-lg-10 col-xl-10">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    
                    <h3>Register user</h3>
                </div>


                <form action="{{ route('login.store') }}" method="post">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <select class="form-select form-select-lg" id="role" name="role">        
                                <option value="admins">Admin</option>
                                <option value="managers">manager</option>
                                <option value="teachers">teacher</option>
                                <option value="parents">parent</option>
                                <option value="students">student</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="fullName" class="form-control" id="floatingText" placeholder="jhondoe">
                        <label for="floatingText">Full name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="loginName" class="form-control" id="floatingText" placeholder="jhondoe">
                        <label for="floatingText">Login Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="telephone" name="telephone" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">telephone</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Register</button>
                </form>
                
                
            </div>
        </div>
    </div>
</div>

@endsection
