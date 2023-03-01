
<div class="container my-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <h4>Please make sure to insert data correctly</h4>
            @foreach ($errors->all() as $error)
                <span>{{$error}}</span>
            @endforeach
        </div>
    @endif
    <form class="text-white bg-dark py-3 px-4 d-flex align-items-end justify-content-around rounded py-4" action="{{route($routeName, $tecnology)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)
            <div class="form-group col-3">
                <label for="tecnology-name" class="form-label">projectt title:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="tecnology-name" placeholder="insert tecnology name here" name="name" value="{{old('name', $tecnology->name)}}">
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="input-color-wrapper">
                <label for="tecnology-color" class="form-label">tecnology main color:</label>
                <input type="color" class="form-control" id="tecnology-color" name="accent_color" value="{{old('accent-color', $tecnology->accent_color)}}">
            </div>
            <div class="input-color-wrapper">
                <label for="tecnology-bg-color" class="form-label">tecnology main color:</label>
                <input type="color" class="form-control" id="tecnology-bg-color" name="bg_color" value="{{old('bg-color', $tecnology->bg_color)}}">
            </div>
        @if ($method == 'POST')
            <button type="submit" class="btn btn-primary">Create Post</button>
        @else
            <button type="submit" class="btn btn-warning">Modify Post</button>
        @endif
    </form>
</div>
