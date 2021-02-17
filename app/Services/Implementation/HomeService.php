<?php

namespace App\Services\Implementation;

use App\Adapters\IBrandAdapter;
use App\Adapters\IOfferAdapter;
use App\Adapters\ISettingAdapter;
use App\Helpers\MessageHandleHelper;
use App\Services\IHomeService;
use App\Transformers\HomeTransformer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;

class HomeService implements IHomeService {

    use DispatchesJobs;

    protected $adapter;
    protected $brandsAdapter;
    protected $settingsAdapter;

    protected $transform;

    protected $messageHandle;

    public function __construct(
        IOfferAdapter $adapter,IBrandAdapter $brandsAdapter , ISettingAdapter $settingsAdapter,
        MessageHandleHelper $messageHandle, HomeTransformer $transform) {
        $this->adapter = $adapter;
        $this->brandsAdapter = $brandsAdapter;
        $this->settingsAdapter = $settingsAdapter;
        $this->messageHandler = $messageHandle;
        $this->transform= $transform;

    }

    public function getHome($request)
    {

        $home_content   = [];

        #region brands default condition

        $brands_cond    = [];

        #endregion

        #region offers default condition

        $offers_cond    = [
            "branches_offers.is_active" => 1
        ];

        if (isset($request['city_id']) && !empty($request['city_id']))
        {
            $offers_cond = array_merge($offers_cond,[
                "branches.city_id" => $request['city_id']
            ]);

            $brands_cond = array_merge($brands_cond,[
                "branches.city_id" => $request['city_id']
            ]);
        }
        if (isset($request['district_id']) && !empty($request['district_id']))
        {
            $offers_cond = array_merge($offers_cond,[
                "branches.district_id" => $request['district_id']
            ]);

            $brands_cond = array_merge($brands_cond,[
                "branches.district_id" => $request['district_id']
            ]);
        }

        $user           = Auth::user();
        if(!is_object($user) || (is_object($user) && $user->plan_id == 1))
        {
            $offers_cond  = array_merge($offers_cond, [
                "offers.offer_allowed_to"   => "all" ,
            ]);
        }

        #endregion


        #region hot offers

            $hot_offers_cond   =
            array_merge($offers_cond, [
                "offers.is_hot_offer"       => 1 ,
            ]);
            $home_content["HotOffers"] = $this->adapter->getOffers(8,$hot_offers_cond);

        #endregion

        #region ordinary offers

            // TODO to hash the following line after testing
            $home_content["Offers"] = $this->adapter->getOffers(8,$offers_cond);

        #endregion

        #region nearby offers

            $home_content["NearbyOffers"] = $this->adapter->getNearByOffers($offers_cond,$request,4,0);

        #endregion



        #region featured brands

            $featured_brands_cond   =
            array_merge($brands_cond, [
                "brands.is_feature"       => 1 ,
            ]);

            $home_content["FeaturedBrands"] = $this->brandsAdapter->getBrands(4,$featured_brands_cond);

        #endregion

        #region ordinary brands

            $home_content["Brands"] = $this->brandsAdapter->getBrands(4,$brands_cond);

            // TODO remove the following
            $home_content["TempBrands"] = $this->brandsAdapter->getBrands(4,$brands_cond);

        #endregion



        #region categories default condition

            $cats_cond    = [];

        #endregion

        #region categories

            $home_content["Categories"] = $this->settingsAdapter->getCategories($request);

        #endregion

        $result = $this->transform->transform($home_content);
        $result = collect($result)->sortBy("sort")->all();
        $result = array_values($result);

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

}
