<?php


namespace App\Traits;
use Carbon\Carbon;
use Illuminate\Http\File as SaveFile;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Session;
use Image;

trait FileSaver
{
    // <!-- upload file -->
    public function uploadFileLinode($file, $model, $fieldName, $filePath,$width=200,$height=200)
    {
        if ($file){

            //folder create
            $basePath = 'uploads/' . $filePath;
            if (!is_dir($basePath)) {
                \File::makeDirectory($basePath, 493, true);
            }

            //change image name
            $str       = Str::random(8).time();
            $imageName = $filePath.'_image_'.$str.'.'.$file->getClientOriginalExtension();

            //save image
            $image = Image::make($file);
            $image->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save($basePath . '/' . $imageName);

            $imagePath = $filePath . '/' . $imageName;
            $getFile = Storage::disk('uploads')->get($imagePath);

            //move file to linode
            Storage::disk('linode')->put($imagePath, $getFile);
            Storage::disk('uploads')->delete($imagePath);

            // <!-- update file name to database -->
            $model->update([
                $fieldName => $imagePath
            ]);
        }
    }




    public function uploadFileWithResize($file, $model, $database_field_name, $basePath,$width,$height)
    {
        if ($file) {

            try {
                $basePath = 'uploads/' . $basePath;

                $image_name     = time() . '.' . $file->getClientOriginalExtension();

                if (file_exists($basePath . '/' . $model->image) && $model->image != '') {
                    unlink($basePath . '/' . $model->image);
                }

                if (!is_dir($basePath)) {
                    \File::makeDirectory($basePath, 493, true);
                }

                $resize_image = Image::make(file_get_contents($file));
                $resize_image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($basePath . '/' . $image_name);

                $model->update([$database_field_name => ($basePath . '/' . $image_name)]);
            } catch (\Exception $ex) {}
        }
    }
}
