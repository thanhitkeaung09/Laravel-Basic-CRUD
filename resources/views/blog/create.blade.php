@extends('template.master')
@section('title') Blog Create @stop
@section('content')

    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-8">
                <form action="{{route('blog.store')}}" method="post">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        {{--                        {{dd($errors->all())}}--}}
                    @endif
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" value="{{old('title')}}" class="form-control form-control-lg  @error('title') is-invalid @enderror" name="title">
                        @error('title')
                        <div class="invalid-feedback">{{$message}}</div>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea type="text" value="{{old('desciption')}}" class=" form-control form-control-lg  @error('description') is-invalid @enderror"  name="description" rows="10"></textarea>
                        @error('description')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Add Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
