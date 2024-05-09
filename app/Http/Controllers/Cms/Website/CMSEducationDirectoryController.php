<?php

namespace App\Http\Controllers\Cms\Website;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\CMSEducationDirectory;

class CMSEducationDirectoryController extends Controller
{
    public function index()
    {
        $data = CMSEducationDirectory::query()->first();

        return view('cms.website.education.directory.index', compact('data'));
    }

    public function upload(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:pdf|max:100000', // PDF and maximum size of 100 MB
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 400);
            }

            $file = $request->file('file');

            if (!empty($file)) {
                $extension = $file->extension();
                $newFileName = 'directory_file' . Carbon::now()->timestamp . '.' . $extension;
                if (!File::isDirectory(storage_path('app/public/uploads'))) {
                    File::makeDirectory(storage_path('app/public/uploads'), 0755, true);
                }
                $destination = storage_path('app/public/uploads/' . $newFileName);
                
                // Move the PDF file to the destination directory
                $file->move(storage_path('app/public/uploads'), $newFileName);

                $data = CMSEducationDirectory::query()->first();

                if($data) {
                    $data->file = $newFileName;
                    $data->save();
                }
                else {
                    $data = CMSEducationDirectory::query()->create(['file' => $newFileName]);
                }

                return response()->json(['data' => $data, 'msg' => 'File uploaded successfully!'], 200);
            } else {
                return response()->json(['error', 'File not found!'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
