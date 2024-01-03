<!--to include header-->
@include('admin.layouts.header')

<!--to include sidebar-->
@include('admin.layouts.sidebar')

<div class="main-content">
<!--content yield from home.blade.php-->
@yield('content')
</div>

<!--to include footer-->
@include('admin.layouts.footer')