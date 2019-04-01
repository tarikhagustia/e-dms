<?php

namespace App\Http\Controllers\Document;

use App\Repositories\DocumentRepository;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class DocumentController extends Controller
{
    /**
     * [protected description]
     * @var DocumentRepository $documentRepository
     */
    protected $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function index()
    {
      return view('document.index');
    }

    public function upload()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('document.upload', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'document' => 'required|mimes:pdf,doc,docx,xls,xlsx',
          'title' => 'required|min:5',
          'category' => 'required'
        ]);
        try {
            $this->documentRepository->addDocument($request->category, $request->post('title'), $request->file('document'), $request->post('description'));
            return redirect()->back()->with(['success' => __('Success')]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['document' => $e->getMessage()]);
        }
    }

    public function datatable()
    {
      return $this->documentRepository->getDatatable();
    }

    public function download($secure_id)
    {
      return $this->documentRepository->getDownloadFileFromSecureID($secure_id);
    }

    public function destroy($secure_id)
    {
      try {
          $this->documentRepository->deleteDocumentWithFile($secure_id);
          return redirect()->back()->with(['success' => __('Success')]);
      } catch (\Exception $e) {
          return redirect()->back()->with(['error' => $e->getMessage()]);
      }
    }
}
