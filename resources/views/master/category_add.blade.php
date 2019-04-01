@extends('layouts.app')
@section('title', __('Category'))
@section('content')
    <div class="row">
        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{__('Category')}}</h4>
                    <p class="text-muted font-14 mb-4">{{__('Input new category')}}</p>
                    <form method="post" action="{{route('master.category')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-labe">{{__('Parent')}}</label>
                            <select class="form-control" name="parent">
                                <option value="0">-- parent --</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted">{{__('Select --parent-- if you want to set as root')}}</span>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-form-label ">Name</label>
                            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                                   name="name" id="name" placeholder="Category name" value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
