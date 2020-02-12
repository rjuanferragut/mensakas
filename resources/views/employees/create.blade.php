@extends('layouts.dashboard.head')
@extends('layouts.dashboard.sidebar')
<!-- @extends('layouts.details_layout') -->
@section('content')

<form class="form-group" action="{{route('employee.store')}}" method="post">
    <input type="text" name="name" value="">
    <input type="email" name="email" value="">
    <input type="submit" name="submit" value="Add customer">
</form>

@endsection
