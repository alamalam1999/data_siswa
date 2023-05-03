<?php

namespace App\Events\Backend\PPDB;

use Illuminate\Queue\SerializesModels;

/**
 * Class PPDBDeleted.
 */
class PPDBDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $ppdb;

    /**
     * @param $page
     */
    public function __construct($ppdb)
    {
        $this->ppdb = $ppdb;
    }
}
