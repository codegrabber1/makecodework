<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\PortfolioCreateRequest;
use App\Http\Requests\PortfolioUpadteRequest;
use App\Models\Portfolio;
use App\Repositories\admin\CategoryRepository;
use App\Repositories\admin\PortfolioRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PortfolioController extends BaseController
{

    private $portfolioRepository;
    private $categoryRepository;


    public function __construct()
    {
        parent::__construct();
        $this->portfolioRepository  = app(PortfolioRepository::class);
        $this->categoryRepository   = app(CategoryRepository::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $items = $this->portfolioRepository->getAllWithPagination(8,1,0);
        $categories = $this->categoryRepository->getItemsForPortfolio(1);

        return view(env('THEME').'.admin.portfolio', compact('items', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $item = new Portfolio();

        $published      = $this->portfolioRepository->getAllWithPagination(8,1);
        $unpublished    = $this->portfolioRepository->getAllWithPagination(8,0);
        $categories     = $this->categoryRepository->getItemsForPortfolio(1);

        return view(env('THEME').'.admin.portfolio-edit',
            compact('item', 'published', 'unpublished', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PortfolioCreateRequest $request
     * @return Response
     */
    public function store(PortfolioCreateRequest $request)
    {
        //

        $data = $request->all();

        if(isset($data['image'])){

            $data['image'] = $request->file('image')->getClientOriginalName();
            $path = env('THEME').'/images/image-gallery';
            $request->image->move($path, $data['image']);
        }

        /**
         * The controller isn't creates or saves data in database.
         */
        $item = (new Portfolio())->create($data);

        return $item ? redirect()
            ->route('admin.portfolio.edit', [$item->id])
            ->with(['success' => 'Item has ben created successfully']) : back()
            ->withErrors(['msg' => 'Not stored'])
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //dd(__METHOD__, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $item           = $this->portfolioRepository->getEdit($id);
        $published      = $this->portfolioRepository->getAllWithPagination(8,1);
        $unpublished    = $this->portfolioRepository->getAllWithPagination(8,0);
        $categories     = $this->categoryRepository->getItemsForPortfolio(1,0);

        return view(env('THEME').'.admin.portfolio-edit',
            compact('item', 'published', 'unpublished', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PortfolioUpadteRequest $request, $id)
    {
        $item = $this->portfolioRepository->getEdit($id);

        $data = $request->all();

        if(isset($data['image'])){

            $data['image'] = $request->file('image')->getClientOriginalName();
            $path = env('THEME').'/images/image-gallery';
            $request->image->move($path, $data['image']);
        }

        $result = $item->update($data);

        return $result ? redirect()
            ->route('admin.portfolio.edit', $item->id)
            ->with(['success' => 'Updated successfully']) : back()
            ->withErrors(['msg' => 'Not updated'])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = $this->portfolioRepository->getEdit($id);

        if(isset($item->image)) {
            $path = env('THEME').'/images/image-gallery/';
            unlink(public_path($path.$item->image));
        }

        $result = Portfolio::destroy($id);

        return $result ? redirect()
            ->route('admin.portfolio.index')
            ->with(['success' => "Item with id-[$id] deleted successfully"]) : back()
            ->withErrors(['msg' => 'Not deleted']);
    }
}
