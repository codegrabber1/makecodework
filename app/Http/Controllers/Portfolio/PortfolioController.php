<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\BaseController;
use App\Repositories\PortfolioRepository;
use App\Repositories\SettingRepository;
use App\Repositories\TutorialCategoryRepository;

class PortfolioController extends BaseController
{
	private $portfolioRepository;
	private $settingRepository;
	private $tutorialCategoryRepository;

	public function __construct() {
    	parent::__construct();

    	$this->portfolioRepository = app(PortfolioRepository::class);
		$this->settingRepository = app(SettingRepository::class);
		$this->tutorialCategoryRepository = app(TutorialCategoryRepository::class);
    }

    public function __invoke($id){
	    
    	$item = $this->portfolioRepository->getEdit($id);
	    $settings = $this->settingRepository->getSettings();
	    $tutorialCategories = $this->tutorialCategoryRepository->getForSelect();
	    return view(env('THEME').'/portfolio/portfolio-item', 
		    compact('item', 'settings', 'tutorialCategories'));
    }
}
