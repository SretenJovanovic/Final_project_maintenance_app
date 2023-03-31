@extends('layouts.app')
@section('content')
    <form action="{{ route('equipements.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}"
                    placeholder="Example input">

            </div>
            <div class="form-group col-md-4">
                <label for="manufacturer">Manufacturer</label>
                <input name="manufacturer" type="text" class="form-control" id="manufacturer"
                    value="{{ old('manufacturer') }}" placeholder="Another input">

            </div>
            <div class="form-group col-md-4">
                <label for="model">Model</label>
                <input name="model" type="text" class="form-control" value="{{ old('model') }}" id="model"
                    placeholder="Another input">

            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <label for="serial">Serial number</label>
                <input name="serial" type="text" class="form-control" id="serial"
                    value="{{ old('serial') }}"placeholder="Another input">

            </div>
            <div class="form-group col-md-5">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>

            </div>
            <div class="form-group col-md-2">
                <label for="section">Section</label>
                <select name="section" class="form-control" id="section">
                    <option disabled selected>Choose section...</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">
                            {{ ucfirst($section->name) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-2">
            <button type="submit" class="m-auto col-md-4 btn btn-primary btn-lg btn-block">Add Equipement</button>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alerts :warning='true' :message="$error" />
            @endforeach
        @endif
    </form>
@endsection
