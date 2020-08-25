@extends('layouts.app')

@section('content')
    <script type="application/javascript">
        sessionStorage.setItem("userId", {{ Auth::user()->id }});
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <router-view></router-view>

            </div>
        </div>
    </div>
@endsection
