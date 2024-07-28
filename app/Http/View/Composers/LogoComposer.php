<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Modules\Settings\Entities\ImageType;
use Modules\Settings\Entities\Settings;

class LogoComposer
{
    protected $logos;
    protected $banners_top_header;
    protected $banners;
    protected $banners_top;
    protected $poster_product;

    public function __construct()
    {
        $logoImageType = ImageType::where('name', 'Logo')->first();
        $bannerTopHeaderImageType = ImageType::where('name', 'Banner_Horizontal')->first();
        $bannerImageType = ImageType::where('name', 'Banner')->first();
        $bannerTopImageType = ImageType::where('name', 'Banner_Top')->first();
        $posterProductImageType = ImageType::where('name', 'poster_product')->first();

        $this->logos = $logoImageType ? Settings::where('image_type_id', $logoImageType->id)->get() : collect();
        $this->banners_top_header = $bannerTopHeaderImageType ? Settings::where('image_type_id', $bannerTopHeaderImageType->id)->get() : collect();
        $this->banners = $bannerImageType ? Settings::where('image_type_id', $bannerImageType->id)->get() : collect();
        $this->banners_top = $bannerTopImageType ? Settings::where('image_type_id', $bannerTopImageType->id)->orderBy('created_at', 'desc')->get() : collect();
        $this->poster_product = $posterProductImageType ? Settings::where('image_type_id', $posterProductImageType->id)->orderBy('created_at', 'desc')->get() : collect();
    }

    public function compose(View $view)
    {
        $view->with('logos', $this->logos);
        $view->with('banners_top_header', $this->banners_top_header);
        $view->with('banners', $this->banners);
        $view->with('banners_top', $this->banners_top);
        $view->with('poster_product', $this->poster_product);
    }
}
