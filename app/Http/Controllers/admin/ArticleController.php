<?php

namespace App\Http\Controllers\admin;

use App\Facades\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $model;
    public function __construct(Article $model)
    {
        $this->middleware("permission:list-articles", ['only' => ['index']]);
        $this->middleware("permission:create-article", ['only' => ['create', 'store']]);
        $this->middleware("permission:edit-article", ['only' => ['edit', 'update']]);
        $this->middleware("permission:delete-article", ['only' => ['destroy']]);
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $articles = $this->model->with(['creator', 'updater'])->paginate(15);
        return view('admin.articles.index')->with(
            [
                'articles' => $articles,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {
        $item = checkLocale('ar') ? "المقال" : "The Article";
//        try {
            if($request->has('translations'))
                $request->replace($request->except('translations') + $request->translations);
            $article = $this->model->create($request->all());
            if ($request->has('icon')){
                $article->clearMediaCollection('icon');
                MediaHelper::uploadMedia($request, $article);
            }
            return redirect()->route('admin.articles.index')->with('success', __('messages.created', ['item' => $item]));
//        } catch (\Exception $e) {
//            return redirect()->route('admin.articles.create')->with('issue_message', trans('common.issue_message', ['item' => $item]));
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.articles.show')->with('article', $article);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $item = checkLocale('ar') ? "المستخدم" : "Blog";
        return view('admin.articles.edit')->with([
            'article' => $article,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        dd($request->all());
        $item = checkLocale('ar') ? "المقال" : "The Article";
        try {
            if($request->has('translations'))
                $request->replace($request->except('translations') + $request->translations);
            $article->update($request->all());
            if ($request->has('icon')){
                $article->clearMediaCollection('icon');
                MediaHelper::uploadMedia($request, $article);
            } else if ($request->icon_remove) {
                $article->clearMediaCollection('icon');
            }
            return redirect()->route('admin.articles.index')->with('success', __('messages.updated',['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.articles.edit', $article->id)->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $item = checkLocale('ar') ? "المقال" : "The Article";
        try {
            $article->delete();
            return redirect()->route('admin.articles.index')->with('success', __('messages.deleted', ['item' => $item]));
        } catch (\Exception $e) {
            return redirect()->route('admin.articles.index')->with('issue_message', trans('common.issue_message', ['item' => $item]));
        }
    }
}
