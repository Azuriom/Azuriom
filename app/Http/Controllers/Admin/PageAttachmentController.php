<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Http\Requests\AttachmentRequest;
use Azuriom\Models\Page;

class PageAttachmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(AttachmentRequest $request, Page $page)
    {
        $imageUrl = $page->storeAttachment($request->file('file'));

        return response()->json(['location' => $imageUrl]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pending(AttachmentRequest $request, string $pendingId)
    {
        $imageUrl = Page::storePendingAttachment($pendingId, $request->file('file'));

        return response()->json(['location' => $imageUrl]);
    }
}
