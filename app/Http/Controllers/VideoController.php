<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Video;
use App\Genre;
use App\Person;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection_Video = Video::all();
        $collection_Genre = Genre::all();
        $collection_StorageImages = Storage::disk('video');

        return view('video/index', [
            'videos' => $collection_Video,
            'genres' => $collection_Genre,
            'images' => $collection_StorageImages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection_Genre = Genre::all();

        return view('video/create', [
            'genres' => $collection_Genre
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $video_image = $request->file('video_Image');

        $validated = $request->validate([
            'video_Name'        => 'required',
            'video_Duration'    => 'required',
            'video_Description' => 'required',
            'video_Year'        => 'required',
            'video_Type'        => 'required',
            'genre_ID'          => 'required',
            'season_ID'         => 'nullable',
        ]);

        if ($video_image) {
            $videoImageUrl = time() . $video_image->getClientOriginalName();

            Storage::disk('video')->put($videoImageUrl, File::get($video_image));


            $validated['video_Image'] = $videoImageUrl;
        }

        $video = new Video();

        $store = [];

        foreach ($validated as $column => $value) {
            $store[$column] = $value;
        }

        $video->fill($store)->save();

        return redirect()->action('VideoController@index');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        $collection_Genre = Genre::all();
        return view('video/single', [
            'video' => $video,
            'genres' => $collection_Genre,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $video = Video::find($id);
        $collection_Genre = Genre::all();
        $collection_Person = Person::all();

        return view('video/edit', [
            'video' => $video,
            'genres' => $collection_Genre,
            'persons' => $collection_Person,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::find($id);

        $video_image = $request->file('video_Image');

        $validated = $request->validate([
            'video_Name'        => 'required',
            'video_Duration'    => 'required',
            'video_Description' => 'required',
            'video_Year'        => 'required',
            'video_Type'        => 'required',
            'genre_ID'          => 'required',
            'season_ID'         => 'nullable',
            'person'            => 'nullable',
        ]);

        if ($video_image) {
            $videoImageUrl = time() . $video_image->getClientOriginalName();

            Storage::disk('video')->put($videoImageUrl, File::get($video_image));


            $validated['video_Image'] = $videoImageUrl;
        }

        $store = [];

        foreach ($validated as $column => $value) {
            if ($column == 'person') continue;

            $store[$column] = $value;
        }

        $video->fill($store)->update();

        $video->people()->sync($validated['person']);

        return redirect()->route('video.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
