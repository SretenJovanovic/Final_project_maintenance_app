@extends('layouts.app')
@section('content')
    <form action="{{ route('equipements.update', $equipement) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ $equipement->name }}"
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
                    value="{{ $equipement->manufacturer }}" placeholder="Another input">
                @error('manufacturer')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="model">Model</label>
                <input name="model" type="text" class="form-control" value="{{ $equipement->model }}" id="model"
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
                    value="{{ $equipement->serial }}"placeholder="Another input">
                @error('serial')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-5">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"
                    rows="3">{{ $equipement->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="section">Section</label>
                <select name="section" class="form-control" id="section">
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}"
                            {{ $section->name == $equipement->section->name ? 'selected' : '' }}>
                            {{ ucfirst($section->name) }}
                        </option>
                    @endforeach
                </select>
                @error('section')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mt-2">
            <button type="submit" class="m-auto col-md-4 btn btn-primary btn-lg btn-block">Update</button>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
    </form>
@endsection
