<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create Person</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-10 mx-auto">
                    <h2>Create Person</h2>
                    <form action="{{action('PersonController@store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="person_Name">Person Name</label>
                        <input type="text" name="person_Name" value="{{ old('person_Name') }}" class="mb-5" />
                        <br>
                        <select id="person_Role" name="person_Role" class="mb-5">
                              <option value="Director">Director</option>
                              <option value="Stars">Stars</option>
                        </select>
                        <br>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>
