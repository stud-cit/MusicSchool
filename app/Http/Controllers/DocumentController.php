<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    protected $publicStorage = "site-files/";

    public function getDocument()
    {
        $data = Document::get();
        return response()->json($data);
    }

    public function postDocument(Request $request)
    {
        $document = new Document;

        $document->text = $document->documentText;

        if($request->hasFile('file')) {
            $file = $request->file;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $document->file = $this->publicStorage.$name;
        }
        $document->save();
    }
}
