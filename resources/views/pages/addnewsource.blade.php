@extends('layouts.MasterPortal')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold" style="color: white; text-align:center; background-color: red;">Add Source</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('addnewsource') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" autocomplete="off" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>Error on name</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <input id="description" type="text" autocomplete="off" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>Error on description</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site" class="col-md-4 col-form-label text-md-right">Link</label>
                            <div class="col-md-6">
                                <input id="site" type="url" autocomplete="off" class="form-control{{ $errors->has('site') ? ' is-invalid' : '' }}" name="site" value="{{ old('site') }}" required>
                                @if ($errors->has('site'))
                                    <span class="invalid-feedback">
                                        <strong>Error on site</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div id="KeywordsBody" class="form-group md-0">
                            <div class="form-group row" style="display: none;" id="CloneTR">
                                <input type="hidden" name="keywords[]" id="keywords" required/>
                                <label for="resKeyword" class="col-md-5 col-form-label">Keyword</label>
                                <div class="form-group row col-md-6">
                                    <div class="col-md-6">
                                        <input id="resKeyword" type="text" autocomplete="off" class="form-control{{ $errors->has('resKeyword') ? ' is-invalid' : '' }}" name="resKeyword" value="{{ old('resKeyword') }}">
                                    </div>
                                    <button type="button" name="DeleteKeyword" class="btn btn-danger btn-block col-md-6" onclick="DeleteKeyWord(this)">
                                        Delete keyword
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="button" name="AddResource" class="btn btn-primary btn-block" onclick="OnClickAddNewKeyword()">
                                    Add a keyword
                                </button>
                            </div>
                        </div>
                    </br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function OnClickAddNewKeyword() {
        var courseBody = document.getElementById('KeywordsBody');
        var div = document.getElementById('CloneTR');
        var clone = div.cloneNode(true);
        clone.style.display = 'block';
        courseBody.appendChild(clone);
    }

    function DeleteKeyWord(button) {
        button.parentElement.parentElement.remove();
    }
</script>
@endsection