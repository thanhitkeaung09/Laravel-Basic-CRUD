@extends('template.master')
@section('title') Blog Edit @stop
@section('content')

    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-8">
                <form action="{{route('blog.update',$blog->id)}}" method="post">
                    @csrf
                    @method('put')
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
                        <input type="text" value="{{old('title',$blog->title)}}" class="form-control form-control-lg  @error('title') is-invalid @enderror" name="title">
                        @error('title')
                        <div class="invalid-feedback">{{$message}}</div>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea type="text"  class=" form-control form-control-lg  @error('description') is-invalid @enderror"  name="description" rows="10">{{old('desciption',$blog->description)}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
