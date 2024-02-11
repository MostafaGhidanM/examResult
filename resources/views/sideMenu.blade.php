
@if (session('loginRole') == 'admins')

    <a href="{{url('admin')}}" class="nav-item {{$pageName == 'admin' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>Admin</a>
    <a href="{{url('manager')}}" class="nav-item {{$pageName == 'manager' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>manager</a>
    <a href="{{url('teacher')}}" class="nav-item {{$pageName == 'teacher' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>teacher</a>
    <a href="{{url('studentparent')}}" class="nav-item {{$pageName == 'studentparent' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>parent</a>

@endif



@if (session('loginRole') == 'students')

    <a href="{{url('material')}}" class="nav-item {{$pageName == 'material' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>material</a>
    <a href="{{url('login')}}" class="nav-item {{$pageName == 'logins' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>Users</a>

@endif


{{-- 
<a href="{{url('admin')}}" class="nav-item {{$pageName == 'admin' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>Admin</a>
<a href="{{url('manager')}}" class="nav-item {{$pageName == 'manager' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>manager</a>
<a href="{{url('teacher')}}" class="nav-item {{$pageName == 'teacher' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>teacher</a>
<a href="{{url('studentparent')}}" class="nav-item {{$pageName == 'studentparent' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>parent</a>
<a href="{{url('student')}}" class="nav-item {{$pageName == 'student' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>student</a>
<a href="{{url('studyyear')}}" class="nav-item {{$pageName == 'studyyear' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>study year</a>
<a href="{{url('grade')}}" class="nav-item {{$pageName == 'grade' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>grade</a>
<a href="{{url('material')}}" class="nav-item {{$pageName == 'material' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>material</a>
<a href="{{url('login')}}" class="nav-item {{$pageName == 'logins' ? 'active' : ''}} nav-link"><i class="fa fa-th me-2"></i>Users</a>
 --}}