@extends('layouts.app')
@section('content')
    <form action="{{ route('equipements.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}"
                    placeholder="Example input">
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="manufacturer">Manufacturer</label>
                <input name="manufacturer" type="text" class="form-control" id="manufacturer"
                    value="{{ old('manufacturer') }}" placeholder="Another input">
                @error('manufacturer')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="model">Model</label>
                <input name="model" type="text" class="form-control" value="{{ old('model') }}" id="model"
                    placeholder="Another input">
                @error('model')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <label for="serial">Serial number</label>
                <input name="serial" type="text" class="form-control" id="serial"
                    value="{{ old('serial') }}"placeholder="Another input">
                @error('serial')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-5">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="section">Section</label>
                <select name="section" class="form-control" id="section">
                    <option disabled selected>Choose section...</option>
                    <option value="1">Prženje</option>
                    <option value="2">Mlevenje</option>
                    <option value="3">Pakovanje</option>
                </select>
                @error('section')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <button type="submit" class="m-auto col-md-4 btn btn-primary btn-lg btn-block">Add Equipement</button>
        </div>
    </form>
@endsection
