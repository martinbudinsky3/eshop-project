<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManagerStatic as ImgService;
use App\Models\Image;

class ImageService
{
    /**
     * Get images of given product
     */
    public function getProductImages($productId) {

        $images = Image::where('product_id', $productId)->get();

        foreach($images as $image) {
            $image->path = $image->path.'_520x728.jpg';
        }

        return $images;
    }

    /**
     * Upload images
     */
    public function store($images, $productId)
    {
        foreach($images as $uploadedImage){
            // get image name and extension
            $file = $uploadedImage->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);

            // create directory and image name for large image
            $dirName = 'assets/images/' . time() . '_' . $filename;
            $filename_lg = $filename . '_640x896.' . $extension;
      
            // save large image
            $path_lg = $uploadedImage->storeAs($dirName, $filename_lg);

            // create paths for medium and small image
            $path_sm = $dirName . '/' . $filename . '_300x420.' . $extension;
            $path_md = $dirName . '/' . $filename . '_520x728.' . $extension;

            // get large image and create medium and small versions
            $image_lg = ImgService::make($uploadedImage->getRealPath());

            $image_lg->resize(520, 728);
            $image_lg->save(public_path($path_md));

            $image_lg->resize(300, 420);
            $image_lg->save(public_path($path_sm));

            // save image to DB
            $pathDB = dirname($path_lg) . '/' . $filename;
            Image::create([
                'product_id' => $productId,
                'path' => $pathDB,
            ]);
        }
    }
}