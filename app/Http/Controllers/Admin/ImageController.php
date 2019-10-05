<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\ImageRequest;
use Azuriom\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ImageController extends Controller
{
    /**
     * The storage path for uploaded images
     *
     * @var string
     */
    protected $imagePath = 'public/img/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.images.index')->with('images', Image::paginate(25));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Azuriom\Http\Requests\ImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $file = $request->file('file');
        $mimeType = $file->getMimeType();
        $extension = $this->normalizeExtensions($file->extension());
        $fileName = $request->input('slug').'.'.$extension;

        Validator::make(['slug' => $fileName], [
            'slug' => [Rule::unique('images', 'file')]
        ])->validate();

        $file->storeAs($this->imagePath, $fileName);

        Image::create([
            'name' => $request->input('name'),
            'file' => $fileName,
            'type' => $mimeType
        ]);

        return redirect()->route('admin.images.index')->with('success', 'Image uploaded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('admin.images.edit')->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Azuriom\Http\Requests\ImageRequest  $request
     * @param  \Azuriom\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, Image $image)
    {
        $fileName = $request->input('slug').'.'.$image->getExtension();

        Validator::make(['slug' => $fileName], [
            'slug' => [Rule::unique('images', 'file')->ignore($image->file, 'file')]
        ])->validate();

        if ($image->file !== $fileName) {
            Storage::move($this->getImagePath($image->file), $this->getImagePath($fileName));
        }

        $image->update([
            'name' => $request->input('name'),
            'file' => $fileName
        ]);

        return redirect()->route('admin.images.index')->with('success', 'Image updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Image  $image
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Image $image)
    {
        Storage::delete($this->getImagePath($image->file));

        $image->delete();

        return redirect()->route('admin.images.index')->with('success', 'Image deleted');
    }

    protected function getImagePath(string $fileName)
    {
        return $this->imagePath.$fileName;
    }

    protected function normalizeExtensions(string $name)
    {
        return str_replace('jpeg', 'jpg', strtolower($name));
    }
}
