<?php

namespace App\Http\Controllers;

use App\Repositories\DocumentRepository;
use App\Repositories\DownloadRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $userRepository;
    protected $documentRepository;
    protected $downloadRepository;

    public function __construct(
        UserRepository $userRepository,
        DownloadRepository $downloadRepository,
        DocumentRepository $documentRepository
    ) {
        $this->userRepository = $userRepository;
        $this->documentRepository = $documentRepository;
        $this->downloadRepository = $downloadRepository;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUsers = $this->userRepository->getTotalUser();
        $totalDocument = $this->documentRepository->getTotaDocument();
        $totalDownload = $this->downloadRepository->getTotaDownload();
        return view('home', compact('totalDocument','totalDownload', 'totalUsers'));
    }
}
