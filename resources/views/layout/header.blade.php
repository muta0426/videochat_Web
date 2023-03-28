@section('header')
<form class="homeheader" action="{{ url('/account')}}" method="POST" ncteype="multiprta/form-data">
    <h2 class="headertitle">rogo</h2>
    <img class="account_setting" src="{{ asset('img/initial.png') }}" alt="">
    <h2 class="account_name">{{$correct_name}}</h2>
</form>
@endsection