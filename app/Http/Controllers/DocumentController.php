<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    protected $publicStorage = "/documents/";

    function getDocument() {
        $data = Document::get();
        return response()->json($data);
    }

    function postDocument(Request $request, $id) {
        $document = Document::find($id);
        $document->text = $request->text;
        if($request->hasFile('file')) {
            unlink(public_path($document->file));
            $request->file->move(public_path() . $this->publicStorage, $request->file->getClientOriginalName());
            $document->file = $this->publicStorage.$request->file->getClientOriginalName();
        }
        $document->save();
    }
}
