<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit Video</title>

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
                    <h2>Edit Video</h2>
                    <form action="{{action('VideoController@update', $video->video_ID)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <label for="video_Name">Video Name</label>
                        <input type="text" name="video_Name" value="{{ $video->video_Name }}" />
                        <br>
                        <label for="video_Duration">Video Durartion</label>
                        <input type="time" name="video_Duration" value="{{$video->video_Duration}}" />
                        <br>
                        <label for="video_Image">Video Image</label>
                        <input type="file" name="video_Image"  />
                        <br>
                        <label for="video_Description">Video Description</label>
                        <br>
                        <textarea name="video_Description" id="" cols="30" rows="10">{{$video->video_Description}}</textarea>
                        <br>
                        <label for="video_Year">Video Year</label>
                        <input type="number" name="video_Year"  min="1900" max="2099" step="1" placeholder="YYYY" value="{{$video->video_Year}}" />
                        <br>
                        <p>Select Type</p>
                        <select name="video_Type" >
                            <option value="Movie">Movie</option>
                            <option value="Serie">Serie</option>
                        </select>
                        <br>
                        {{-- <label for="genre_ID">Genre</label>
                        <input type="text" name="genre_ID" value="{{ old('genre_ID') }}" />
                        <br> --}}
                        <p>Select Genre</p>
                        <select id="genre_ID" name="genre_ID" class="mb-5">
                            @foreach($genres as $genre)
                              <option value="{{$genre->genre_ID}}"
                                {{
                                    $video->genre_ID === $genre->genre_ID ?
                                    'selected="selected"' : ''
                                }}
                                  >{{$genre->genre_Name}}</option>
                            @endforeach
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
