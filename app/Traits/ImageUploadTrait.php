<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageUploadTrait
{
    public function uploadImage(Request $request, $inputName, $path)
    {
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};

            $ext = $image->getClientOriginalExtension();
            $imageName = 'm_' . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
    }

    public function uploadMuliImage(Request $request, $inputName, $path)
    {
        $imagePaths = [];

        if ($request->hasFile($inputName)) {
            $images = $request->{$inputName};
            foreach ($images as $image) {
                $ext = $image->getClientOriginalExtension();
                $imageName = 'm_' . uniqid() . '.' . $ext;

                $image->move(public_path($path), $imageName);

                $imagePaths[] = $path . '/' . $imageName;
            }

            return $imagePaths;
        }
    }

    public function updateImage(Request $request, $inputName, $path, $oldPath = null)
    {
        if ($request->hasFile($inputName)) {
            $ends_with_default = substr($oldPath, -strlen("default.png")) === "default.png";

            if (!$ends_with_default) {
                $this->deleteImage($oldPath);
            }

            $image = $request->{$inputName};

            $ext = $image->getClientOriginalExtension();
            $imageName = 'm_' . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
    }

    public function deleteImage($path)
    {
        if (\File::exists(public_path($path))) {
            \File::delete(public_path($path));
        }
    }
}
