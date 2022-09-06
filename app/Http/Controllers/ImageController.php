<?php
namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function index()
    {
        $albums = Album::get();
        $images = Image::get();
        return view('images.index', compact('images' , 'albums'));
    }


    public function create()
    {
        $albums = Album::get();
        $images = Image::get();
        return view('images.create', compact('images' , 'albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_name' => 'required',
            'album_id' => 'required',
        ]);
        $image_in_db = NULL;
        if( $request->has('image') )
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);
            $path = public_path().'/uploads/images';
            $image = request('image');
            $image_name = time().request('image')->getClientOriginalName();
            $image->move($path , $image_name);
            $image_in_db = '/uploads/images/'.$image_name;
        }

        $images = Image::create([
            'image_name'  => $request->image_name,
            'album_id'  => $request->album_id,
            'image'  => $image_in_db,
        ]);
        return redirect()->route('images.index');
    }


    public function edit($id)
    {
        $albums =Album::all();
        $image = Image::find($id);
        return view('images.edit', compact('image','albums'));
    }


    public function update(Request $request, $id)
    {
        $image = Image::find($id);

        $this->validate($request, [
            'image_name' => 'filled',
            'album_id' => 'filled',
        ]);
        $image_in_db = NULL;
        if ($request->has('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);

            $path = public_path() . '/uploads/images';
            $image = request('image');
            $image_name = time() . request('image')->getClientOriginalName();
            $image->move($path, $image_name);
            $image_in_db = '/uploads/images/' . $image_name;
        }

        $image->update([
            'image_name' => $request->image_name,
            'album_id' => $request->album_id,
            'image' => $image_in_db,
        ]);

        return redirect()->route('images.index');
    }


    public function delete($id)
    {
        $image = Image::find($id)->first();
        $image->delete();
        return back();
    }


    public function deleteAllImages()
    {
        DB::table('images')->truncate();
        return redirect()->route('images.index');
    }


    public function MoveShow()
    {
        $images = Image::onlyTrashed()->get();
        return view('images.MoveShow' , compact('images'));
    }

    
    // Archive
    public function forceDelete($id)
    {
        Image::withTrashed()->where('id' , $id)->forceDelete();
        return back();
    }


    public function ImageRestore($id)
    {
        Image::withTrashed()->where('id' , $id)->restore();
        return back();
    }
}
