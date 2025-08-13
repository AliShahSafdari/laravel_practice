@extends('layouts.master')

@section('content')

<h1> {{$data}} Page</h1>
<div class="card col-md-6 mx-auto">
    <form @if(isset($note)) action="{{route('update', ['id'=>$note->id])}}" @else action="/save" @endif method="post">
        @csrf

        @if(isset($note))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <label for="note">Note</label> <br>
                    <input type="text" name="note" @if(isset($note)) value="{{$note->note  }}" @endif placeholder="enter your note" class="from-control">
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
                <td><a href="{{route('delete', ['id'=>$item->id])}}">Delete</a>
                 <a href="{{route('edit', ['id'=>$item->id])}}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>



@endsection