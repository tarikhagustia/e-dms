<?php
/**
 * Created by PhpStorm.
 * User: tarikhagustua
 * Date: 3/29/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Download;

class DownloadRepository
{
    protected $download;

    public function __construct(Download $download)
    {
        $this->download = $download;
    }

    public function getTotaDownload()
    {
        return $this->download->select('id')->count();
    }
}