<?php

/**
 * Created by PhpStorm.
 * User: todary
 * Date: 23/11/17
 * Time: 10:05 م
 */

namespace App\Transformers;

use App\models\team_member_m;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class SettingTransformer extends Transformer
{


    /**
     * method to custom transform an item
     * @param  [mixed] $item [item to be transformed]
     * @return [mixeed]       [counts of the implementation in child class]
     */
    public function transform($item)
    {
        // TODO: Implement transform() method.
    }


    #region social
    public function transformSocial($data)
    {

        $pageData =[];
        $allPages = [];

        foreach($data as $key => $item)
        {
            $pageData['name']       = isset($item->name)?$item->name:"";
            $pageData['value'] = isset($item->social_url)?$item->social_url:"";
            $pageData['type'] = isset($item->type)?$item->type:"";

            $pageData['image'] = '';
            if(!empty($item->social_image_path) && $item->social_image_path != "T")
            {
                $pageData['image'] = isset($item->social_image_path)?url($item->social_image_path):'';
            }

            $allPages [] = $pageData;
            $pageData = [];
        }

        return array_values($allPages);

    }
    #endregion



    #region pages
    public function transformPages($page)
    {
        $data = [];

        $data['page_id'] = isset($page['page_id'])?intval($page['page_id']):0;
        $data['page_body'] = isset($page['page_body'])?$page['page_body']:'';
        $data['page_title'] = isset($page['page_title'])?$page['page_title']:'';
        $data['image'] = url("public/images/no_image.png");
        if(!empty($page['small_image_path']) && $page['small_image_path'] != "T")
        {
            $data['image'] = isset($page['small_image_path'])?url($page['small_image_path']):'';
        }

        if(isset($page['page_id']) && $page['page_id'] == 1)
        {
            $team = team_member_m::get_team_member();
            $data['team_members'] = [];
            $data['team_members'] = $this->getTeamMembers($team);
        }

        return $data;
    }

    private function getTeamMembers($team)
    {
        $pageData =[];
        $allPages = [];

        foreach ($team as $tm){
            $pageData['name']=isset($tm->name)?$tm->name:"";
            $pageData['title']=isset($tm->title)?$tm->title:'';

            $pageData['team_member_image'] = url("public/images/no_image.png");
            if(!empty($tm->user_image_path) && $tm->user_image_path != "T")
            {
                $pageData['team_member_image'] = isset($tm->user_image_path)?url($tm->user_image_path):'';
            }
            $allPages [] = $pageData;
            $pageData = [];
        }

        return array_values($allPages);
    }

    public function transformAllPages($data)
    {

        $pageData =[];
        $allPages = [];

        foreach ($data as $page_result){
            $pageData['page_id']=isset($page_result->page_id)?$page_result->page_id:0;
            $pageData['page_body']=isset($page_result->page_body)?$page_result->page_body:'';
            $pageData['page_title']=isset($page_result->page_title)?$page_result->page_title:'';
            $pageData['page_slug']=isset($page_result->page_slug)?$page_result->page_slug:'';

            $pageData['image'] = url("public/images/no_image.png");
            if(!empty($page_result->small_image_path) && $page_result->small_image_path != "T")
            {
                $pageData['image'] = isset($page_result->small_image_path)?url($page_result->small_image_path):'';
            }
            $allPages [] = $pageData;
            $pageData = [];
        }

        return array_values($allPages);
    }
    #endregion


    #region categories

    public function transformCategories($categories)
    {

        $data = [];
        $allData = [];

        foreach ($categories as $key => $value){

            $data['id']         = isset($value->cat_id)?intval($value->cat_id):0;
            $data['name']       = isset($value->cat_name)?$value->cat_name:"";
            $data['color']       = isset($value->color)?$value->color:"";
            $data['image']      = url("public/images/no_image.png");
            if(isset($value->cat_img) && !empty($value->cat_img) && $value->cat_img != "T")
            {
                $data['image'] = url($value->cat_img);
            }

            $allData[] = $data;
            $data = [];

        }

        return array_values($allData);

    }
    #endregion




    #region languages
    public function transformLanguages($data)
    {

        $pageData =[];
        $allPages = [];

        foreach ($data as $key => $item){
            $pageData['lang_id']    =   isset($item->lang_id)?intval($item->lang_id):0;
            $pageData['name']=isset($item->lang_text)?$item->lang_text:'';

            $pageData['image'] = url("public/img/no_image.png");
            if(!empty($item->lang_img_path) && $item->lang_img_path != "T")
            {
                $pageData['image'] = isset($item->lang_img_path)?url($item->lang_img_path):'';
            }
            $allPages [] = $pageData;
            $pageData = [];
        }

        return array_values($allPages);
    }
    #endregion


    #region cities

    public function transformCityData($data)
    {

        $city    = [];
        $district  = [];
        $districts = [];
        $all_data  = [];
        foreach ($data as $key => $array_data){
            $city['id'] = $key;
            foreach ($array_data as $single_data){
                $city['name']   =  $single_data->city_name;
                $district['id']   = $single_data->district_id;
                $district['name'] = $single_data->district_name;
                $districts[]= $district;

            }
            $city['districts'] =array_values($districts);
            $all_data[] = $city;
            $city       = [];
            $districts  = [];

        }

        return array_values($all_data);
    }
    #endregion

}
