<?php

namespace App\Http\Controllers;

use App\SettingTopRank;
use Illuminate\Http\Request;

class TopRankController extends Controller
{
    public function __construct()
    {
        $this->setting = SettingTopRank::query()->first();
    }

    public function index(Request $request)
    {
        $faction = 0;
        $level = 0;
        if ($request->has('lm') && in_array(intval($request->lm), [1,2])) $faction = intval($request->lm);

        $type = 0;
        if ($request->has('type') && in_array(intval($request->type), [1,2])) $type = intval($request->type);

        $rank_DAO = new RankDAO();
        $defaultPageSize = $this->setting->num_display;
        if ($defaultPageSize) {
            $defaultpage = 0;
            $validPageSizes = array($defaultPageSize); // This determines valid values for how many results can be displayed on a page.
            $validOrderBys = array('K1','K2','KDR'); // This determines valid values for how the results can be ordered on a page.
            $validPageDirections = array('ASC','DESC'); // This determines valid values for how the direction results can be sorted on a page.

            // Gather valid user input from the user's POST request
            $pagingData = array();
            if ($type == 1) {
                $pagingData['page'] = isset($_REQUEST['page']) && (!empty($_REQUEST['page']) && is_numeric($_REQUEST['page'])) && $_REQUEST['page'] >= 0 ? $_REQUEST['page'] : $defaultpage;
            } else {
                $pagingData['page'] = 0;
            }
            $pagingData['pageSize'] = isset($_REQUEST['pageSize']) && (!empty($_REQUEST['page']) && is_numeric($_REQUEST['pageSize'])) && in_array($_REQUEST['pageSize'],$validPageSizes) ? $_REQUEST['pageSize'] : $defaultPageSize;
            $pagingData['pageOrder'] = isset($_REQUEST['pageOrder']) && !empty($_REQUEST['pageOrder']) && in_array($_REQUEST['pageOrder'],$validOrderBys) ? $_REQUEST['pageOrder'] : 'K1';
            $pagingData['pageDirection'] = isset($_REQUEST['pageDirection']) && !empty($_REQUEST['pageDirection']) && in_array($_REQUEST['pageDirection'],$validPageDirections) ? $_REQUEST['pageDirection'] : 'DESC';

            $pagingData['level'] = $level;
            $pagingData['class'] = isset($_REQUEST['class']) && (!empty($_REQUEST['class']) || is_numeric($_REQUEST['class'])) ? $_REQUEST['class'] : 0;
            $pagingData['faction'] = $faction;

            $listType1 = $rank_DAO->getCharacterRanks($pagingData);

            $defaultpage = 0;
            $validPageSizes = array($defaultPageSize); // This determines valid values for how many results can be displayed on a page.
            $validOrderBys = array('K1','K2','KDR'); // This determines valid values for how the results can be ordered on a page.
            $validPageDirections = array('ASC','DESC'); // This determines valid values for how the direction results can be sorted on a page.

            // Gather valid user input from the user's POST request
            $pagingData = array();
            if ($type == 2) {
                $pagingData['page'] = isset($_REQUEST['page']) && (!empty($_REQUEST['page']) && is_numeric($_REQUEST['page'])) && $_REQUEST['page'] >= 0 ? $_REQUEST['page'] : $defaultpage;
            } else {
                $pagingData['page'] = 0;
            }
            $pagingData['pageSize'] = isset($_REQUEST['pageSize']) && (!empty($_REQUEST['page']) && is_numeric($_REQUEST['pageSize'])) && in_array($_REQUEST['pageSize'],$validPageSizes) ? $_REQUEST['pageSize'] : $defaultPageSize;
            $pagingData['pageOrder'] = 'LV';
            $pagingData['pageDirection'] = isset($_REQUEST['pageDirection']) && !empty($_REQUEST['pageDirection']) && in_array($_REQUEST['pageDirection'],$validPageDirections) ? $_REQUEST['pageDirection'] : 'DESC';

            $pagingData['level'] = $level;
            $pagingData['class'] = isset($_REQUEST['class']) && (!empty($_REQUEST['class']) || is_numeric($_REQUEST['class'])) ? $_REQUEST['class'] : 0;
            $pagingData['faction'] = $faction;

            $listType2 = $rank_DAO->getCharacterRanks($pagingData);
        } else {
            $listType1 = collect();
            $listType2 = collect();
        }
        return view('top-rank')
            ->with([
                'settingTopRank' => $this->setting,
                'listType1' => $listType1,
                'listType2' => $listType2
            ]);
    }

    public static function getListNav()
    {
        $level = 0;
        $defaultPageSize = 10;
        $defaultpage = 0;

        $pagingData = array();
        $pagingData['page'] = $defaultpage;
        $pagingData['pageSize'] = $defaultPageSize;
        $pagingData['pageOrder'] = 'LV';
        $pagingData['pageDirection'] = 'DESC';
        $pagingData['level'] = $level;
        $pagingData['class'] = 0;
        $pagingData['faction'] = 0;

        $rank_DAO = new RankDAO();
        return $rank_DAO->getCharacterRanks($pagingData);
    }
}
