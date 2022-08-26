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
     * The storage path for uploaded images.
     *
     * @var string
     */
    protected $imagesPath = 'img';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.images.index', ['images' => Image::paginate()]);
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
        $file = $request->file('image');
        $mimeType = $file->getMimeType();
        $extension = $this->normalizeExtensions($file->extension());
        $fileName = $request->input('slug').'.'.$extension;

        Validator::make(['slug' => $fileName], [
            'slug' => [Rule::unique('images', 'file')],
        ])->validate();

        $file->storeAs($this->imagesPath, $fileName, 'public');

        Image::create([
            'name' => $request->input('name'),
            'file' => $fileName,
            'type' => $mimeType,
        ]);

        return redirect()->route('admin.images.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Azuriom\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('admin.images.edit', ['image' => $image]);
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
            'slug' => [Rule::unique('images', 'file')->ignore($image->file, 'file')],
        ])->validate();

        if ($image->file !== $fileName) {
            $oldPath = $this->getImagesPath($image->file);
            $newPath = $this->getImagesPath($fileName);

            Storage::disk('public')->move($oldPath, $newPath);
        }

        $image->update([
            'name' => $request->input('name'),
            'file' => $fileName,
        ]);

        return redirect()->route('admin.images.index')
            ->with('success', trans('messages.status.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Azuriom\Models\Image  $image
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($this->getImagesPath($image->file));

        $image->delete();

        return redirect()->route('admin.images.index')
            ->with('success', trans('messages.status.success'));
    }

    protected function getImagesPath(string $fileName)
    {
        return "{$this->imagesPath}/{$fileName}";
    }

    protected function normalizeExtensions(string $name)
    {
        return str_replace('jpeg', 'jpg', strtolower($name));
    }
}
