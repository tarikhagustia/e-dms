@extends('layouts.app')
@section('title', __('Edit Document'))
@section('content')
    <div class="row">
        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{__('Document')}}</h4>
                    <p class="text-muted font-14 mb-4">{{__('Edit Document')}}</p>
                    @include('lib.msg')
                    <form method="post" action="{{route('document.edit', $document->secure_id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-labe">{{__('Select Category')}}</label>
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{(old('category', $document->category_id) == $category->id) ? 'selected' : null}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-form-label ">{{__('Title')}}</label>
                            <input class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" type="text"
                                   name="title" id="title" placeholder="Title" value="{{old('title', $document->title)}}">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('Description')}}</label>
                            <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                      name="description"
                                      placeholder="{{__('Optional')}}">{{old('description',$document->description)}}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('Select Document')}}</label>
                            <div class="alert alert-warning">
                                <p>{{__('Sorry, for security reason changing file during edit is not allowed please upload a new document')}}</p>
                            </div>
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
