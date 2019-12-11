<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsAchieveStory;
use App\Models\Images;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NewsAchieveStoryController extends Controller
{
    protected $publicStorageNews = "/user-file/news/";
    protected $publicStorageAchieve = "/user-file/achieve/";
    protected $publicStorageStory = "/user-file/story/";

    public function getNewsAchieveStory()
    {
        $data = DB::select('select * from news_achieve_story');
        return response()->json(['newsAchieveStory' => $data]);
    }

    // Новини

    function getNews() {
        $data = NewsAchieveStory::with('images')->news()->get();
        return response()->json($data);
    }

    function getNewsId($id) {
        $data = NewsAchieveStory::with('images')->where('nas_id', $id)->first();
        return response()->json($data);
    }

    function postNews(Request $request) {
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

    function updateNews(Request $request, $id) {
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

    // Історії 

    function getStory() {
        $data = NewsAchieveStory::with('images')->story()->get();
        return response()->json($data);
    }

    function getStoryId($id) {
        $data = NewsAchieveStory::with('images')->where('nas_id', $id)->first();
        return response()->json($data);
    }

    function postStory(Request $request) {
        $story = new NewsAchieveStory;
        $story->nas_name = $request->nas_name;
        $story->nas_info = $request->nas_info;
        $story->date = $request->date;
        $story->type = NewsAchieveStory::STORY;

        $story->save();

        $this->validate($request, [
            'filenames.*' => 'mimes:jpeg'
        ]);
        $storyFile = $request->file;
        foreach ($storyFile as $file) {
            $images = new Images;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorageStory . $story->nas_id, $name);
            $images->nas_id = $story->nas_id;
            $images->file = $name;
            $images->save();
        }
        return response()->json($story);
    }

    function updateStory(Request $request, $id) {
        $update_story = NewsAchieveStory::find($id);
        $update_story->nas_name = $request->nas_name;
        $update_story->nas_info = $request->nas_info;
        $update_story->date = $request->date;
        $arrImg = [];
        $storyFile = $request->file;
        if(isset($request->file)) {
            foreach ($storyFile as $file) {
                $images = new Images;
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path().$this->publicStorageStory.$update_story->nas_id, $name);
                $images->nas_id = $update_story->nas_id;
                $images->file = $name;
                $images->save();
                array_push($arrImg, $images);
            }
        }
        $update_story->save();
        return response()->json($arrImg);
    }

    // Досягнення

    function getAchieve() {
        $data = NewsAchieveStory::with('images')->achieve()->get();
        return response()->json($data);
    }

    function getAchieveId($id) {
        $data = NewsAchieveStory::with('images')->where('nas_id', $id)->first();
        return response()->json($data);
    }

    function postAchieve(Request $request) {
        $achieve = new NewsAchieveStory;
        $achieve->nas_name = $request->nas_name;
        $achieve->nas_info = $request->nas_info;
        $achieve->date = $request->date;
        $achieve->type = NewsAchieveStory::ACHIEVE;

        $achieve->save();

        $this->validate($request, [
            'filenames.*' => 'mimes:jpeg'
        ]);
        $achieveFile = $request->file;
        foreach ($achieveFile as $file) {
            $images = new Images;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorageAchieve . $achieve->nas_id, $name);
            $images->nas_id = $achieve->nas_id;
            $images->file = $name;
            $images->save();
        }
        return response()->json($achieve);
    }

    function updateAchieve(Request $request, $id) {
        $update_achieve = NewsAchieveStory::find($id);
        $update_achieve->nas_name = $request->nas_name;
        $update_achieve->nas_info = $request->nas_info;
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



    public function deleteStory($id)
    {
        $story = NewsAchieveStory::where('type', 'story')->find($id);
        $storyFolder = public_path('story/');
        File::deleteDirectory($storyFolder.$story->nas_id);
        Images::where("images_id", $id)->delete();

        $story->delete();
        return response('ok', 200);
    }
    public function deleteStoryImage($id)
    {
        $storyImage = Images::find($id);
        if($storyImage->delete()) {
            $storyFolder = public_path('story/');
            File::delete($storyFolder . $storyImage->nas_id . '/' . $storyImage->file);
        }
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
