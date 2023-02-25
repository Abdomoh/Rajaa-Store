
@section('title')
<title>access Denid!</title>
@endsection


<link href="{{URL::asset('font/font.css')}}" rel="stylesheet">



<style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;700&family=Tajawal&display=swap');

    body {
        font-family: 'Cairo', sans-serif;
        font-size: 16px;
        background-color: #ccc;

    }
    a{
        text-decoration: none;
    }
</style>

<body >

<div class="main-error-wrapper  page page-h ">

    <center>
    <img src="{{URL('404/404.png')}}" width="400px" class="error-page" alt="error">
    <h2> اووو هههههه. تحاول الوصول الي هذة الصفحة  .</h2>
    <h2 style="font-family: 'Cairo', sans-serif;">لايمكنك الوصول</h2><a class="btn btn-outline-danger" href="{{ url('../') }}"><h3>العودة للصفحة الرئسية</h3></a>
    </center>
</div>
</body>
