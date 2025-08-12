@extends('layouts.master')

@section('content')

<h1> {{$data}} Page</h1>
<div class="card col-md-6 mx-auto">
    <form action="/save" method="post">
        @csrf
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <label for="note">Note</label> <br>
                    <input type="text" name="note" placeholder="enter your note" class="from-control">
                    @error('note')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div> 
            </div>
            <div class="col-md-2">
                <br>
                <button type="submit" class="btn btn-success"> Save</button>
            </div>

        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notes as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>
                    {{$item-> note}}
                </td>
                <td><a href="">Delete</a> <a href="">Edit</a></td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>



@endsection