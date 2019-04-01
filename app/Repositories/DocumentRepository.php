<?php
/**
 * Created by PhpStorm.
 * User: tarikhagustua
 * Date: 3/29/2019
 * Time: 7:20 PM
 */

namespace App\Repositories;


use App\Models\Document;

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
}