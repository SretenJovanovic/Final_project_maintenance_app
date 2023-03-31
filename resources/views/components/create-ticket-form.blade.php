@props(['categories', 'equipements'])
<form action="{{ route('open.ticket.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="form-group col-md-4">
            <label for="email">Email</label>
            <input type="hidden" name="user" value="{{ auth()->user()->id }}"class="form-control" id="user">
            <input name="email" value="{{ auth()->user()->email }}" type="email" class="form-control" id="email"
                readonly>
            @error('email')
                <x-alerts :warning='true' :message='$message' />
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="category">Category</label>
            <select name="category" class="form-control" id="category">
                <option disabled selected> Choose category...</option>
                @foreach ($categories as $category)
                    @if (old('category') == $category->id)
                        <option value="{{ $category->id }}" selected> {{ ucfirst($category->category) }}</option>
                    @else
                        <option value="{{ $category->id }}"> {{ ucfirst($category->category) }} </option>
                    @endif
                @endforeach
            </select>

        </div>
        <div class="col-md-4">
            @error('category')
                <x-alerts :warning='true' :message='$message' />
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="equipement">Equipement</label>
            <select name="equipement" class="form-control" id="equipement">
                <option disabled selected> Choose equipement...</option>
                @foreach ($equipements as $equipement)
                    @if (old('equipement') == $equipement->id)
                        <option value="{{ $equipement->id }}" selected> {{ ucfirst($equipement->name) }} </option>
                    @else
                        <option value="{{ $equipement->id }}"> {{ ucfirst($equipement->name) }} </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            @error('equipement')
                <x-alerts :warning='true' :message='$message' />
            @enderror
        </div>
    </div>
    <div class="row">

        <div class="form-group col-md-4">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="col-md-4">
            @error('description')
                <x-alerts :warning='true' :message='$message' />
            @enderror
        </div>
    </div>
    <div class="row mt-2">
        <button type="submit" class="col-md-4 btn btn-primary btn-lg btn-block">Submit ticket</button>
    </div>
</form>
