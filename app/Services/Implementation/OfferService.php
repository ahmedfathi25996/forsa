<?php

namespace App\Services\Implementation;

use App\Adapters\IOfferAdapter;
use App\Adapters\IUserAdapter;
use App\Helpers\MessageHandleHelper;
use App\Services\IOfferService;
use App\Transformers\OfferTransformer;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Request;

class OfferService implements IOfferService {

    use DispatchesJobs;

    protected $adapter;
    protected $userAdapter;
    protected $transform;
    protected $messageHandle;

    public function __construct(IOfferAdapter $adapter,IUserAdapter $userAdapter ,MessageHandleHelper $messageHandle, OfferTransformer $transform) {
        $this->adapter = $adapter;
        $this->userAdapter = $userAdapter;
        $this->messageHandler = $messageHandle;
        $this->transform= $transform;

    }

    public function listAllOffers($request)
    {
        $cond       = [];
        $cond     = ["offers.offer_allowed_to" => "all","branches_offers.is_active" => 1];
        $user = Auth::user();
        if($user)
        {
            if($user->plan_id > 1)
            {

                $cond     = ["branches_offers.is_active" => 1];
            }
        }

        $data = $this->adapter->getOffers(0,$cond);
        $result = $this->transform->transformListAllOffers($data);

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }


    public function getHotOffers($request)
    {
        $cond       = [];
        $cond     = ["offers.is_hot_offer" => 1,"branches_offers.is_active" => 1];
        $user = Auth::user();
        if(!is_object($user) || (is_object($user) && $user->plan_id == 1))
        {
            $cond  = array_merge($cond, [
                "offers.offer_allowed_to"   => "all" ,
            ]);
        }
        if (isset($request['city_id']) && !empty($request['city_id']))
        {
            $cond = array_merge($cond,[
                "branches.city_id" => $request['city_id']
            ]);

        }
        if (isset($request['district_id']) && !empty($request['district_id']))
        {
            $cond = array_merge($cond,[
                "branches.district_id" => $request['district_id']
            ]);

        }

        if(isset($request['cat_id']) && !empty($request['cat_id']))
        {
            $cond = array_merge($cond,[
                "category.cat_id" => $request['cat_id']
            ]);
        }
        $data = $this->adapter->getOffers(0,$cond);
        $result = $this->transform->transformListAllOffers($data->all());

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function getOffers($request)
    {
        $cond    = [];
        $cond    = ["offers.offer_allowed_to" => "all", "branches_offers.is_active" => 1];

        $cond2   = [];
        $cond2   = ["offers.offer_allowed_to" => "all" , "offers.is_hot_offer" => 1 ,"branches_offers.is_active" => 1];
        $user    = Auth::user();
        if($user)
        {
            if($user->plan_id > 1)
            {

                $cond  = ["branches_offers.is_active" => 1];
                $cond2 = ["offers.is_hot_offer" => 1 ,"branches_offers.is_active" => 1];
            }
        }

        $offers = $this->adapter->getOffers(4,$cond);
        $hot_offers = $this->adapter->getOffers(8,$cond2);
        $nearby_offers = $this->adapter->getNearByOffers($cond,$request,4,0);
        $result = $this->transform->transformHomeOffers($offers->all(),$hot_offers->all(),$nearby_offers);

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }


    public function getSingleOffer($offer_id)
    {
        $user = Auth::user();
        $user_allowed_money = [];
        $offer = $this->adapter->getOfferObject($offer_id);

        if(!is_object($offer))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("user.offer_not_exist"));
        }

        if($user && $user->user_wallet > 0 && $offer->max_offer_price > 0)
        {
            $user_wallet = $user->user_wallet;
            if($user->user_wallet > $offer->max_offer_price)
            {
                $user_wallet = $offer->max_offer_price;

                $user_allowed_money = $this->adapter->getUserAllowedMoney($user_wallet);
            }else{
                $user_allowed_money = $this->adapter->getUserAllowedMoney($user_wallet);
            }

        }


        $cond       = [];
        $cond[]     = ["offers.offer_id","=",$offer_id];
        $data = $this->adapter->getOffers(0,$cond);
        $data = $data[0];
        $branches    = $this->adapter->getBranches($offer_id);
        $slider  =  $this->adapter->getOfferSlider($data);
        $result = $this->transform->transformSingleOffer($data->toArray(),$branches,$slider,$user_allowed_money);

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }


    public function useOffer($data,$user,$offer_id)
    {
        $user_id = $user->user_id;
        #region check if user exist

        $user_data = $this->userAdapter->check_user_exist(
            $cond = [
                "user_id"       => $user_id,
                "user_type"     => "user",
                "is_active"     => 1
            ]
        );

        if(!is_object($user_data))
        {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("auth.user_not_exist"));
        }

        #endregion


        #region check if user plan expired
        $expire_plan_date = $user_data->plan_expire_date;
        $now = Carbon::now();

        if ($now >= $expire_plan_date) {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("user.plan_expired"));
        }

        #endregion


        #region check offers count for the user
        $plan =$this->userAdapter->getPlan($user_data->plan_id);
        if ($plan->offers_number > 0) {
            if ($user_data->offers_count == 0) {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("user.offers_finished_for_user"));
            }

        }
        #endregion


        #region check if the offer is allowed for the user plan
        $get_offer =$this->adapter->getOfferObject($offer_id);
        if($plan->is_basic_plan == 1 )
        {
            if($get_offer->offer_allowed_to == 'paid')
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("user.offer_not_allowed"));

            }

        }
        #endregion


        #region check if the offer exist
        $branch_offer_data = $this->adapter->getBranchOffer($offer_id,$data['branch_id']);

        if (!is_object($branch_offer_data)) {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("user.offer_not_exist"));
        }
        #endregion


        #region check if offer expired
        $offer_expire_date = $branch_offer_data->expiration_date;
        if ($now >= $offer_expire_date) {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("user.offer_expired"));
        }
        #endregion


        #region check num of usage for this offer
        $num_of_usage =$get_offer->num_of_usage;
        if ($num_of_usage == 0) {
            return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("user.offers_finished"));
        }
        #endregion


        #region check user wallet
        if(isset($data['money_used_from_wallet']) && !empty($data['money_used_from_wallet']))
        {
            $user_wallet = $user_data->user_wallet;
            if($data['money_used_from_wallet'] > $user_wallet)
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("user.not_enough_wallet"));
            }


            if($data['money_used_from_wallet'] > $get_offer->max_offer_price)
            {
                return $this->messageHandler->getJsonNotFoundErrorResponse(Lang::get("user.wallet_bigger_than_price"));
            }
        }
        #endregion

        $data['user_id'] = $user_data->user_id;
        $data['offer_id'] = $offer_id;

        $order = $this->adapter->createOrder($data);

        #region decrement offers count
        $get_offer->decrement('num_of_usage',1);
        #endregion


        #region decrement offers count for user
        $user_data->decrement('offers_count',1);
        #endregion

        #region decrement user wallet
        if(isset($data['money_used_from_wallet']) && !empty($data['money_used_from_wallet']))
        {
            $user_data->decrement('user_wallet',$data['money_used_from_wallet']);
        }

        #endregion

        #region increment user points
       $user_data->increment('user_points',$get_offer->num_of_points);
        #endregion


        $msg = Lang::get('user.order_is_created_successfully');
        return $this->messageHandler->postJsonSuccessResponse($msg, [
            "order_id"      => $order->order_id
        ]);


    }


    public function getNearByOffers($data)
    {

        $cond       = [];
        $cond     = ["offers.offer_allowed_to" => "all","branches_offers.is_active" => 1];
        $user = Auth::user();
        if($user)
        {
            if($user->plan_id > 1)
            {

                $cond     = ["branches_offers.is_active" => 1];
            }
        }


        $data = $this->adapter->getNearByOffers($cond,$data,0,10);
        $result = $this->transform->transformListAllOffers($data->all());

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }

    public function searchOffers($request)
    {
        $cond               = [];
        $cond[]             = ["branches_offers.is_active","=",1];
        $user               = Auth::user();
        $free_conditions    = "";


        if(!is_object($user) || (is_object($user) && $user->plan_id == 1))
        {
            $cond[]     = ["offers.offer_allowed_to","=", "all"];
        }

        if(isset($request["keyword"]) && !empty($request["keyword"]))
        {
            $keyword            = $request["keyword"];

            $free_conditions    = " (
                    brands_translate.brand_name like '%$keyword%' OR
                    offers_translate.offer_title like '%$keyword%'
                ) ";
        }


        $data = $this->adapter->getOffers(0,$cond, $free_conditions);

        $result = $this->transform->transformListAllOffers($data);

        return $this->messageHandler->getJsonSuccessResponse("", $result);
    }


}
