<?php
/**
 * Created by PhpStorm.
 * User: mostapha
 * Date: 11/07/17
 * Time: 9:40 ص
 */

namespace App\Repositories;
use App\Content;

/**
 * Class ContentRepository
 * @package App\Repositories
 */
class ContentRepository extends BaseRepository
{
    /**
     * @var Content
     */
    protected $content;
    /**
     * ContentRepository constructor.
     */
    public function __construct()
    {
        $this->content= new Content();
    }
    /**
     * @return array of all Contents
     */
    public function getAllContents()
    {
        return $this->getAllItems($this->content);
    }
    /**
     * @param $content_type
     * @return array of all Contents by content type
     */
    public function getAllContentsByContentType($content_type)
    {
        return Content::where('content_type',$content_type)->get();
    }
    /**
     * @param $data
     * @param $content
     * @return array of all Contents
     */
    public function postAddContent($data,$content)
    {
        //return $this->addItem($data, $this->content);
        $content->fill($data->all());
        $video_link = str_replace('watch?v=', 'embed/', $content->video);
        if ($data->hasFile('image'))
        {
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images';
            $file->move($destinationPath, $picture);
            $content->fill(['image'=>$picture]);
        }
        $content->fill(['video'=>$video_link]);
        $content->save();
        return $content;

    }
    /**
     * @param $contentId
     * @return mixed
     */
    public function getContentById($contentId)
    {
        return $this->getItemById($contentId, $this->content);
    }
    /**
     * @param $contentId
     * @param $data
     * @param $content
     * @return mixed
     */
    public function updateContent($contentId, $data, $content)
    {
        $content=$content->find($contentId);

        $content->fill($data->all());

        $video_link = str_replace('watch?v=', 'embed/', $content->video);
        if ($data->hasFile('image'))
        {
            $file= $data->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath='public/assets/images';
            $file->move($destinationPath, $picture);
            $content->fill(['image'=>$picture]);
        }
        $content->fill(['video'=>$video_link]);

        $content->save();
        return $content;
    }
    /**
     * @param $contentId
     */
    public function deleteContentById($contentId)
    {
        $this->deleteItemById($contentId, $this->content);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    static public function getAllContentsView()
    {
        return Content::all();
    }
}