<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsStory;
use App\Models\Images;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class NewsStoryController extends Controller
{
    protected $publicStorageNews = "/user-file/news/";
    protected $publicStorageStory = "/user-file/story/";
    protected $publicStorageAchieve = "/user-file/achieve/";

    // Новини

    function getNews() {
        $data = NewsStory::with('images')->news()->orderBy('date', 'DESC')->get();
        return response()->json($data);
    }

    function getNewsId($id) {
        $data = NewsStory::with('images')->where('id', $id)->first();
        return response()->json($data);
    }

    function postNews(Request $request) {
        $news = new NewsStory;
        $news->title = $request->title;
        $news->text = $request->text;
        $news->date = $request->date;
        $news->type = NewsStory::NEWS;

        $news->save();

        $this->validate($request, ['filenames.*' => 'mimes:jpeg']);
        if(isset($request->file)) {
            foreach ($request->file as $file) {
                //if(count($request->file) < 4) {
                    $images = new Images;
                    $name = date('mdY-His-') . uniqid(). '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . $this->publicStorageNews . $news->id, $name);
                    $images->id = $news->id;
                    $images->file = $this->publicStorageNews . $news->id . '/' . $name;
                    $images->save();
                    $img = Image::make(public_path().$this->publicStorageNews . $news->id . '/' . $name)->encode('jpg', 75);
                    $img->resize(null, 800, function ($constraint) {
                        $constraint->aspectRatio();
                      })->save(public_path() . $this->publicStorageNews . $news->id . '/' . $name, 50);
                    // Storage::disk('local')->put( 'public/' . $this->publicStorageNews. $news->id .$name, $name, 'public');

                //}
            }
        }
        return response()->json($news);
    }

    function updateNews(Request $request, $id) {
        $news = NewsStory::find($id);
        $news->title = $request->title;
        $news->text = $request->text;
        $news->date = $request->date;
        $arrImg = [];
        $this->validate($request, ['filenames.*' => 'mimes:jpeg']);
        if(isset($request->file)) {
            foreach ($request->file as $file){
                //if(count($request->file) < 4) {
                    $images = new Images;
                    $name = date('mdY-His-') . uniqid(). '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . $this->publicStorageNews . $news->id, $name);
                    $images->id = $news->id;
                    $images->file = $this->publicStorageNews . $news->id . '/' . $name;
                    $images->save();
                    $img = Image::make(public_path().$this->publicStorageNews . $news->id . '/' . $name)->encode('jpg', 75);
                    $img->resize(null, 800, function ($constraint) {
                        $constraint->aspectRatio();
                      })->save(public_path() . $this->publicStorageNews . $news->id . '/' . $name, 50);
                    //   Storage::disk('local')->put( 'public/' . $this->publicStorageNews. $news->id .$name, $name, 'public');
                    array_push($arrImg, $images);
                //}
            }
        }
        $news->save();
        return response()->json($arrImg);
    }
    function deleteNews($id) {
        $news = NewsStory::where('type', 'news')->find($id);
        $newsFolder = public_path($this->publicStorageNews);
        File::deleteDirectory($newsFolder.$news->id);
        Images::where("images_id", $id)->delete();
        $news->delete();
        return response('ok', 200);
    }
    function deleteNewsImage($id) {
        $newsImage = Images::find($id);
        if($newsImage->delete()) {
            unlink(public_path($newsImage->file));
        }
    }

    // Історії

    function getStory() {
        $data = NewsStory::with('images')->story()->orderBy('date', 'DESC')->get();
        return response()->json($data);
    }

    function getStoryId($id) {
        $data = NewsStory::with('images')->where('id', $id)->first();
        return response()->json($data);
    }

    function postStory(Request $request) {
        $story = new NewsStory;
        $story->title = $request->title;
        $story->text = $request->text;
        $story->date = $request->date;
        $story->type = NewsStory::STORY;

        $story->save();

        $this->validate($request, [
            'filenames.*' => 'mimes:jpeg'
        ]);
        if(isset($request->file)) {
            foreach ($request->file as $file) {
                $images = new Images;
                $name = date('mdY-His-') . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . $this->publicStorageStory.$story->id, $name);
                $images->id = $story->id;
                $images->file = $this->publicStorageStory.$story->id.'/'.$name;
                $images->save();
                $img = Image::make(public_path().$this->publicStorageStory . $story->id . '/' . $name)->encode('jpg', 75);
                $img->resize(null, 800, function ($constraint) {
                    $constraint->aspectRatio();
                  })->save(public_path() . $this->publicStorageStory . $story->id . '/' . $name, 50);
            }
        }
        return response()->json($story);
    }

    function updateStory(Request $request, $id) {
        $story = NewsStory::find($id);
        $story->title = $request->title;
        $story->text = $request->text;
        $story->date = $request->date;
        $arrImg = [];
        if(isset($request->file)) {
            foreach ($request->file as $file) {
                $images = new Images;
                $name = date('mdY-His-') . uniqid(). '.' . $file->getClientOriginalExtension();
                $file->move(public_path().$this->publicStorageStory.$story->id, $name);
                $images->id = $story->id;
                $images->file = $this->publicStorageStory.$story->id.'/'.$name;
                $images->save();
                $img = Image::make(public_path().$this->publicStorageStory . $story->id . '/' . $name)->encode('jpg', 75);
                $img->resize(null, 800, function ($constraint) {
                    $constraint->aspectRatio();
                  })->save(public_path() . $this->publicStorageStory . $story->id . '/' . $name, 50);

                array_push($arrImg, $images);
            }
        }
        $story->save();
        return response()->json($arrImg);
    }

    function deleteStory($id) {
        $story = NewsStory::where('type', 'story')->find($id);
        $storyFolder = public_path($this->publicStorageStory);
        File::deleteDirectory($storyFolder.$story->id);
        Images::where("images_id", $id)->delete();

        $story->delete();
        return response('ok', 200);
    }
    function deleteStoryImage($id) {
        $storyImage = Images::find($id);
        if($storyImage->delete()) {
            unlink(public_path($storyImage->file));
        }
    }

    // Досягнення

    function getAchieve() {
        $data = NewsStory::with('images')->achieve()->orderBy('date', 'DESC')->get();
        return response()->json($data);
    }

    function getAchieveId($id) {
        $data = NewsStory::with('images')->where('id', $id)->first();
        return response()->json($data);
    }

    function postAchieve(Request $request) {
        $achieve = new NewsStory;
        $achieve->title = $request->title;
        $achieve->text = $request->text;
        $achieve->date = $request->date;
        $achieve->type = NewsStory::ACHIEVE;

        $achieve->save();

        $this->validate($request, ['filenames.*' => 'mimes:jpeg']);
        if(isset($request->file)) {
            foreach ($request->file as $file) {
                $images = new Images;
                $name = date('mdY-His-') . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . $this->publicStorageAchieve . $achieve->id, $name);
                $images->id = $achieve->id;
                $images->file = $this->publicStorageAchieve . $achieve->id . '/' . $name;
                $images->save();
                $img = Image::make(public_path().$this->publicStorageAchieve . $achieve->id . '/' . $name)->encode('jpg', 75);
                $img->resize(null, 800, function ($constraint) {
                    $constraint->aspectRatio();
                  })->save(public_path() . $this->publicStorageAchieve . $achieve->id . '/' . $name, 50);
            }
        }
        return response()->json($achieve);
    }

    function updateAchieve(Request $request, $id) {
        $achieve = NewsStory::find($id);
        $achieve->title = $request->title;
        $achieve->text = $request->text;
        $achieve->date = $request->date;
        $arrImg = [];
        if(isset($request->file)) {
            foreach ($request->file as $file) {
                $images = new Images;
                $name = date('mdY-His-') . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path().$this->publicStorageAchieve.$achieve->id, $name);
                $images->id = $achieve->id;
                $images->file = $this->publicStorageAchieve.$achieve->id.'/'.$name;
                $images->save();

                $img = Image::make(public_path().$this->publicStorageAchieve . $achieve->id . '/' . $name)->encode('jpg', 75);
                $img->resize(null, 800, function ($constraint) {
                    $constraint->aspectRatio();
                  })->save(public_path() . $this->publicStorageAchieve . $achieve->id . '/' . $name, 50);

                array_push($arrImg, $images);
            }
        }
        $achieve->save();
        return response()->json($arrImg);
    }

    function deleteAchieve($id) {
        $achieve = NewsStory::where('type', 'achieve')->find($id);
        $achieveFolder = public_path($this->publicStorageAchieve);
        File::deleteDirectory($achieveFolder.$achieve->id);
        Images::where("images_id", $id)->delete();

        $achieve->delete();
        return response('ok', 200);
    }

    function deleteAchieveImage($id) {
        $achieveImage = Images::find($id);
        if($achieveImage->delete()) {
            unlink(public_path($achieveImage->file));
        }
    }

}
