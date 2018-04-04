<?php

namespace App\Http\Controllers;

use App\Content;
use App\Repositories\ContentRepository;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    protected $content;
    protected $contentRepository;
    public function __construct()
    {
        $this->content=new Content();
        $this->contentRepository=new ContentRepository();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents=$this->contentRepository->getAllContents();
        return view('backend.contents.all_contents',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.contents.add_content');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->contentRepository->postAddContent($request,$this->content);
        return redirect()->route('getAllContents');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $contentId
     * @return \Illuminate\Http\Response
     */
    public function edit($contentId)
    {
        $content=$this->contentRepository->getContentById($contentId);
        return view('backend.contents.content',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $contentId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $contentId)
    {
        $this->contentRepository->updateContent($contentId,$request,$this->content);
        return redirect()->route('getAllContents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $contentId
     * @return \Illuminate\Http\Response
     */
    public function delete($contentId)
    {
        $this->contentRepository->deleteContentById($contentId);
        return redirect()->route('getAllContents');
    }
}
