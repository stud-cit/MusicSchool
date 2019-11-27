<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsAchieveStory;
use App\Models\Images;
use Illuminate\Support\Facades\DB;

class NewsAchieveStoryController extends Controller
{
    protected $publicStorage = "site-files/";

    public function pageStory()
    {	
        return view('admin.story');
    }
    public function pageAchieve()
    {	
        return view('admin.achieve');
    }
    public function pageNews()
    {	
        return view('admin.news');
    }

    public function getNewsAchieveStory()
    {
        $data = DB::select('select * from news_achieve_story');
        return response()->json(['newsAchieveStory' => $data]);
    }

    public function getNews()
    {
        $data = NewsAchieveStory::with('images')
            ->news()
            ->get();
        return response()->json($data);
    }

    public function getAchieve()
    {
        $data = NewsAchieveStory::with('images')
            ->achieve()
            ->get();
        return response()->json($data);
    }

    public function getStory()
    {
        $data = NewsAchieveStory::with('images')
            ->story()
            ->get();
        return response()->json($data);
    }

    public function postNews(Request $request)
    {
        $news = new NewsAchieveStory;

        $news->title = $news->newsTitle;
        $news->text = $news->newsText;
        $news->date = date("Y-m-d", strtotime($news->newsDate));
        $news->type = NewsAchieveStory::NEWS;

        $newsFile = $request->file;
        foreach ($newsFile as $file){
            if($file <=3) {
                $images = new Images;
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path() . $this->publicStorage, $name);
                $images->file = $this->publicStorage . $name;
                $images->save();
            }
        }
        $news->save();
    }

    public function updateNews(Request $request, $id)
    {
        $update_news = NewsAchieveStory::find($id);

        $update_news->title = $update_news->newsTitle;
        $update_news->text = $update_news->newsText;
        $update_news->date = date("Y-m-d", strtotime($update_news->newsDate));
        $update_news->type = NewsAchieveStory::NEWS;

        $newsFile = $request->file;
        foreach ($newsFile as $file){
            $images = Images::find($id);
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $images->file = $this->publicStorage.$name;
            $images->images_id = $update_news->nas_id;
            $images->save();
        }
        $update_news->save();
    }

    public function postAchieve(Request $request)
    {
        $achieve = new NewsAchieveStory;

        $achieve->title = $achieve->achieveTitle;
        $achieve->text = $achieve->achieveText;
        $achieve->date = date("Y-m-d", strtotime($achieve->achieveDate));
        $achieve->type = NewsAchieveStory::ACHIEVE;

        $achieveFile = $request->file;
        foreach ($achieveFile as $file){
            if($file <=3) {
                $images = new Images;
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path() . $this->publicStorage, $name);
                $images->file = $this->publicStorage . $name;
                $images->save();
            }
        }
        $achieve->save();
    }

    public function updateAchieve(Request $request, $id)
    {
        $update_achieve = NewsAchieveStory::find($id);

        $update_achieve->title = $update_achieve->achieveTitle;
        $update_achieve->text = $update_achieve->achieveText;
        $update_achieve->date = date("Y-m-d", strtotime($update_achieve->achieveDate));
        $update_achieve->type = NewsAchieveStory::ACHIEVE;

        $achieveFile = $request->file;
        foreach ($achieveFile as $file){
            $images = Images::find($id);
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $images->file = $this->publicStorage.$name;
            $images->images_id = $update_achieve->nas_id;
            $images->save();
        }
        $update_achieve->save();
    }

    public function postStory(Request $request)
    {
        $story = new NewsAchieveStory;

        $story->title = $story->storyTitle;
        $story->text = $story->storyText;
        $story->date = date("Y-m-d", strtotime($story->storyDate));
        $story->type = NewsAchieveStory::STORY;

        $storyFile = $request->file;
        foreach ($storyFile as $file){
            if($file <=3) {
                $images = new Images;
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path() . $this->publicStorage, $name);
                $images->file = $this->publicStorage . $name;
                $images->save();
            }
        }
        $story->save();
    }

    public function updateStory(Request $request, $id)
    {
        $update_story = NewsAchieveStory::find($id);

        $update_story->title = $update_story->storyTitle;
        $update_story->text = $update_story->storyText;
        $update_story->date = date("Y-m-d", strtotime($update_story->storyDate));
        $update_story->type = NewsAchieveStory::STORY;

        $storyFile = $request->file;
        foreach ($storyFile as $file){
            $images = Images::find($id);
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $images->file = $this->publicStorage.$name;
            $images->images_id = $update_story->nas_id;
            $images->save();
        }
        $update_story->save();
    }

    public function deleteStory($id)
    {
        $story = NewsAchieveStory::find($id);
        foreach ($story as $key => $value) {
            $images = Images::where('images_id', $value);
            if ($images->file != '') {
                unlink(public_path($images->file));
            }
            $images->delete();
        }
        $story->delete();
    }

    public function deleteAchieve($id)
    {
        $achieve = NewsAchieveStory::find($id);
        foreach ($achieve as $key => $value) {
            $images = Images::where('images_id', $value);
            if ($images->file != '') {
                unlink(public_path($images->file));
            }
            $images->delete();
        }
        $achieve->delete();
    }

    public function deleteNews($id)
    {
        $news = NewsAchieveStory::find($id);
        foreach ($news as $key => $value) {
            $images = Images::where('images_id', $value);
            if ($images->file != '') {
                unlink(public_path($images->file));
            }
            $images->delete();
        }
        $news->delete();
    }
}
