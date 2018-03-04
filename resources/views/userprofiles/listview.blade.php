@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>pic name</td>
              <td> Skill</td>
              
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach( $userprofile as $item )
            <tr>
                <td>{{$item->Profilepic}}</td>
                <td>{{$item->Skill}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection