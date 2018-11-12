<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ url('/') }}/"  />
    <!-- Meta & Css -->
    @include('include.front.meta')
</head>

<body id="app-layout">
    <!-- Header -->
    @include('include.front.header')

    <!-- Main Content -->
    @yield('content')
	
	<!-- Main Footer -->
    @include('include.front.footer')
    
    <!-- JavaScripts -->
    @include('include.front.js')
</body>
</html>

