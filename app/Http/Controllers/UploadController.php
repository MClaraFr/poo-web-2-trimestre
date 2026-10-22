<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{
  /**
 * @requestMediaType multipart/form-data
 */
public function upload(UploadRequest $request)
{
    $file = $request->file('file');
    $path = $file->store('uploads');

    return ['path' => $path];
 }  
}

