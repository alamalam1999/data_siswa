<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FileUpload;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png,jpg,gif,xls,xlsx,pdf|max:2048',
        ]);

        // var_dump($validation->errors()->all());

        if ($validation->fails()) {
            return response()->json([
                'is_success' => false,
                'message' => $validation->messages()->first(),
                'image' => '',
            ]);
        }

        $allowedfileExtension = ['pdf', 'jpg', 'jpeg', 'png', 'docx'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            $name = $this->GUID() . '_' . $file->getClientOriginalName();

            debug($file);
            debug($extension);
            debug($name);
            debug($check);

            if ($check) {
                //you also need to keep file extension as well
                $name = $this->GUID() . '_' . $file->getClientOriginalName();
                error_log($this->GUID());

                $path_file = 'uploads/' . date('Y') . '/' . $name;
                $file->move(public_path('uploads') . '/' . date('Y'), $name);

                $fileUpload = new FileUpload();
                $fileUpload->file_name = $file->getClientOriginalName();
                $fileUpload->file_path = $path_file;
                $fileUpload->file_uri = asset($path_file);
                $fileUpload->save();


                return response()->json([
                    'is_success'    => true,
                    'message'       => 'Image Upload Successfully',
                    'file'          => $fileUpload
                ]);
            }
        }

        return response()->json([
            'is_success' => false,
            'message' => json_encode($request),
            'image' => '',
        ]);
    }

    private function GUID()
    {
        if (function_exists('com_create_guid') === true) {
            return Str::substr(trim(com_create_guid(), '{}'), 14);
        }

        return Str::substr(sprintf(
            '%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(16384, 20479),
            mt_rand(32768, 49151),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535)
        ), 14);
    }
}
