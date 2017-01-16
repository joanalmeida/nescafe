@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                    <a href="{{ url('/home') }}">Home</a>
                    <button onclick="testAndroid()">AndroidTest</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function testAndroid() {
            if(window.JSInterface) {
                window.JSInterface.doEchoTest("asd");
            }
        }
    </script>
@endsection
