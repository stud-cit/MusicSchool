<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsAchieveStory;
use App\Models\Images;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NewsAchieveStoryController extends Controller
{
    protected $publicStorageNews = "/news/";
    protected $publicStorageAchieve = "/achieve/";
    protected $publicStorageStory = "/story/";

    public function getNewsAchieveStory()
    {
        $data = DB::select('select * from news_achieve_story');
        return response()->json(['newsAchieveStory' => $data]);
    }

    // Новини

    public function getNews()
    {
        $data = NewsAchieveStory::with('images')
            ->news()
            ->get();
        return response()->json($data);
    }
    public function getNewsId($id)
    {
        $data = NewsAchieveStory::with('images')
            ->where('nas_id', $id)
            ->first();
        return response()->json($data);
    }

    // Архів

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
        $news->nas_name = $request->nas_name;
        $news->nas_info = $request->nas_info;
        $news->date = $request->date;
        $news->type = NewsAchieveStory::NEWS;

        $news->save();

        $this->validate($request, [
            'filenames.*' => 'mimes:jpeg'
        ]);
        $newsFile = $request->file;
        foreach ($newsFile as $file){
            $images = new Images;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path().$this->publicStorageNews.$news->nas_id, $name);
            $images->nas_id = $news->nas_id;
            $images->file = $name;
            $images->save();
        }
        return response()->json($news);
    }

    public function updateNews(Request $request, $id)
    {
        $update_news = NewsAchieveStory::find($id);
        $update_news->nas_name = $request->nas_name;
        $update_news->nas_info = $request->nas_info;
        $update_news->date = $request->date;
        $arrImg = [];
        $newsFile = $request->file;
        if(isset($request->file)) {
            foreach ($newsFile as $file){
                $images = new Images;
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path().$this->publicStorageNews.$update_news->nas_id, $name);
                $images->nas_id = $update_news->nas_id;
                $images->file = $name;
                $images->save();
                array_push($arrImg, $images);
            }
        }
        $update_news->save();
        return response()->json($arrImg);
    }

    public function postAchieve(Request $request)
    {
        $achieve = new NewsAchieveStory;
        $achieve->nas_name = $request->achieveName;
        $achieve->nas_info = $request->achieveInfo;
        $achieve->date = $request->date;
        $achieve->type = NewsAchieveStory::ACHIEVE;

        $achieve->save();

        $this->validate($request, [
            'filenames.*' => 'mimes:jpeg'
        ]);
        $achieveFile = $request->file;
        foreach ($achieveFile as $file){
                $images = new Images;
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path().$this->publicStorageAchieve.$achieve->nas_id, $name);
                $images->nas_id = $achieve->nas_id;
                $images->file = $name;
                $images->save();
        }
        return response()->json($achieve);
    }

    public function updateAchieve(Request $request, $id)
    {
        $update_achieve = NewsAchieveStory::find($id);
        $update_achieve->nas_name = $request->achieve_name;
        $update_achieve->nas_info = $request->achieve_info;
        $update_achieve->date = $request->date;
        $arrImg = [];
        $achieveFile = $request->file;
        if(isset($request->file)) {
            foreach ($achieveFile as $file) {
                $images = new Images;
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path().$this->publicStorageAchieve.$update_achieve->nas_id, $name);
                $images->nas_id = $update_achieve->nas_id;
                $images->file = $name;
                $images->save();
                array_push($arrImg, $images);
            }
        }
        $update_achieve->save();
        return response()->json($arrImg);
    }

    public function postStory(Request $request)
    {
        $story = new NewsAchieveStory;

        $story->nas_name = $story->storyName;
        $story->nas_info = $story->storyInfo;
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

        $update_story->nas_name = $update_story->storyName;
        $update_story->nas_info = $update_story->storyInfo;
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
        $achieve = NewsAchieveStory::where('type', 'achieve')->find($id);
        $achieveFolder = public_path('achieve/');
        File::deleteDirectory($achieveFolder.$achieve->nas_id);
        Images::where("images_id", $id)->delete();

        $achieve->delete();
        return response('ok', 200);
    }
    public function deleteAchieveImage($id)
    {
        $achieveImage = Images::find($id);
        if($achieveImage->delete()) {
            $achieveFolder = public_path('achieve/');
            File::delete($achieveFolder . $achieveImage->nas_id . '/' . $achieveImage->file);
        }
    }
    public function deleteNews($id)
    {
        $news = NewsAchieveStory::where('type', 'news')->find($id);
        $newsFolder = public_path('news/');
        File::deleteDirectory($newsFolder.$news->nas_id);
        Images::where("images_id", $id)->delete();

        $news->delete();
        return response('ok', 200);
    }
    public function deleteNewsImage($id)
    {
        $newsImage = Images::find($id);
        if($newsImage->delete()) {
            $newsFolder = public_path('news/');
            File::delete($newsFolder . $newsImage->nas_id . '/' . $newsImage->file);
        }
    }
}
