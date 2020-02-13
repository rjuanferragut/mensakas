@extends('layouts.dashboard.sidebar')>
@section('content')

<form class="form-group" action="{{route('employee.store')}}" method="post">
    <input type="text" name="name" value="">
    <input type="email" name="email" value="">
    <input type="submit" name="submit" value="Add customer">
</form>

@endsection
