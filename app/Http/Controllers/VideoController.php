<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Video;
use App\Genre;

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
        // $files = Storage::disk('video')->get($collection_Video);


        // dd($collection_Video);
        return view('video/index', [
            'videos' => $collection_Video,
            'genres' => $collection_Genre,
            'images' => $collection_StorageImages,
            //  'videoImages' => $files
        ]);
        // $exists = Storage::disk('s3')->exists('file.jpg');
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
            // 'video_Image'       => 'nullable|image|mimes:jpeg,jpg,png|max:42048',
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

        return view('video/edit', [
            'video' => $video,
            'genres' => $collection_Genre,
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
            // 'video_Image'       => 'nullable|image|mimes:jpeg,jpg,png|max:42048',
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

        $store = [];

        foreach ($validated as $column => $value) {
            $store[$column] = $value;
        }

        $video->fill($store)->update();

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
