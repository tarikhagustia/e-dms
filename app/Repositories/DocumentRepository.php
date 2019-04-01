<?php
/**
 * Created by PhpStorm.
 * User: tarikhagustua
 * Date: 3/29/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Document;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;

use Ramsey\Uuid\Uuid as Generator;
use DataTables;

class DocumentRepository
{
    protected $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    public function getTotaDocument()
    {
        return $this->document->select('id')->count();
    }

    public function addDocument($category, $title, UploadedFile $file, $description)
    {
        $file_location = $file->storePublicly('document');
        return Document::create([
            'title' => $title,
            'category_id' => $category,
            'secure_id' => Generator::uuid4()->toString(),
            'file_location' => $file_location,
            'description' => $description,
            'user_id' => auth()->user()->id
        ]);
    }

    public function getDatatable()
    {
        $query = $this->document->with('category')->orderBy('created_at', 'desc');
        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function ($document) {
                $action = '<a href="' . route("document.download", $document->secure_id) . '" class="btn text-white btn-success btn-xs btn-rounded"><i class="fa fa-download" aria-hidden="true"></i></a>
          <a href="' . route("document.edit",
                        $document->secure_id) . '" class="btn text-white btn-primary btn-xs btn-rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
          <a href="' . route("document.delete",
                        $document->secure_id) . '" onclick="return confirm(\'Are you sure?\');" class="btn text-white btn-danger btn-xs btn-rounded"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                return $action;
            })
            ->make(true);
    }

    public function getDownloadFileFromSecureID($secure_id)
    {
        $document = $this->document->where('secure_id', $secure_id)->firstOrFail();
        return response()->download(storage_path("app/{$document->file_location}"));
    }

    public function deleteDocumentWithFile($secure_id)
    {
        // Get file
        $document = $this->document->where('secure_id', $secure_id)->firstOrFail();

        // Remove file
        Storage::delete($document->file_location);

        $document->delete();

        return $document;
    }

    public function getDocumentFromSecureID($secure_id)
    {
        return $this->document->where('secure_id', $secure_id)->firstOrFail();
    }

    public function editDocumentFromSecureID($secure_id, $category, $title, $description)
    {
        $document = $this->document->where('secure_id', $secure_id)->firstOrFail();
        $document->title = $title;
        $document->category_id = $category;
        $document->description = $description;
        $document->save();

        return $document;
    }
}
