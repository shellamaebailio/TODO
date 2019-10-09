
 {{--* Created by PhpStorm.--}}
 {{--* User: shella--}}
 {{--* Date: 03/09/2019--}}
 {{--* Time: 10:30 AM--}}

@extends('layout')

@section('content')
    <h1>Customers</h1>

    <form action="post_customer" method="POST" class="pb-5">

        <p>Name:</p>
        <div class="input-group">
            <input type="text" name="namess" value="{{old('namess')}}"/>
            <div>{{ $errors->first('namess') }}</div>
        </div>

        <p>Email:</p>
        <div class="input-group">
            <input type="email" name="emailss" value="{{old('emailss')}}"/>
            <div>{{ $errors->first('emailss') }}</div>
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Add Customer</button>

        @csrf
    </form>


     <ul>
        @foreach($cust as $c)
            <li> <span>{{ $c->Name }}</span> <span class="text-muted">({{ $c->Email }})</span> </li>
        @endforeach
     </ul>
 @endsection



