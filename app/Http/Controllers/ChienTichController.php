<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\SettingChienTich;
use Illuminate\Http\Request;

class ChienTichController extends Controller
{
    public function __construct()
    {
        $this->setting = SettingChienTich::query()->first();
    }

    public function index(Request $request)
    {
        $level = 0;
        if ($request->has('pvp') && in_array(intval(Helper::clearXSS($request->pvp)), [0,1,2,3])) $level = Helper::clearXSS(intval($request->pvp));

        $defaultPageSize = $this->setting->num_display;
        if ($defaultPageSize) {
            $defaultpage = 0;
            $validPageSizes = array($defaultPageSize); // This determines valid values for how many results can be displayed on a page.
            $validOrderBys = array('K1','K2','KDR'); // This determines valid values for how the results can be ordered on a page.
            $validPageDirections = array('ASC','DESC'); // This determines valid values for how the direction results can be sorted on a page.

            // Gather valid user input from the user's POST request
            $pagingData = array();
            $pagingData['page'] = isset($_REQUEST['page']) && (!empty($_REQUEST['page']) && is_numeric($_REQUEST['page'])) && $_REQUEST['page'] >= 0 ? Helper::clearXSS($_REQUEST['page']) : Helper::clearXSS($defaultpage);
            $pagingData['pageSize'] = isset($_REQUEST['pageSize']) && (!empty($_REQUEST['page']) && is_numeric($_REQUEST['pageSize'])) && in_array($_REQUEST['pageSize'],$validPageSizes) ? Helper::clearXSS($_REQUEST['pageSize']): Helper::clearXSS($defaultPageSize);
            $pagingData['pageOrder'] = isset($_REQUEST['pageOrder']) && !empty($_REQUEST['pageOrder']) && in_array($_REQUEST['pageOrder'],$validOrderBys) ? $_REQUEST['pageOrder'] : 'K1';
            $pagingData['pageDirection'] = isset($_REQUEST['pageDirection']) && !empty($_REQUEST['pageDirection']) && in_array($_REQUEST['pageDirection'],$validPageDirections) ? Helper::clearXSS($_REQUEST['pageDirection']) : 'DESC';

            $pagingData['level'] = $level;
            $pagingData['class'] = isset($_REQUEST['class']) && (!empty($_REQUEST['class']) || is_numeric($_REQUEST['class'])) ? Helper::clearXSS($_REQUEST['class']) : 0;
            $pagingData['faction'] = isset($_REQUEST['faction']) && (!empty($_REQUEST['faction']) || is_numeric($_REQUEST['faction'])) ? Helper::clearXSS($_REQUEST['faction']) : 0;

            $rank_DAO = new RankDAO();
            $list = $rank_DAO->getCharacterRanks($pagingData);
        } else {
            $list = collect();
        }
        return view('chien-tich')
            ->with([
                'settingChienTich' => $this->setting,
                'list' => $list
            ]);
    }

    public static function getListNav() {
        $level = 0;
        $defaultPageSize = 10;
        $defaultpage = 0;

        $pagingData = array();
        $pagingData['page'] = $defaultpage;
        $pagingData['pageSize'] = $defaultPageSize;
        $pagingData['pageOrder'] = 'K1';
        $pagingData['pageDirection'] = 'DESC';
        $pagingData['level'] = $level;
        $pagingData['class'] = 0;
        $pagingData['faction'] = 0;

        $rank_DAO = new RankDAO();
        return $rank_DAO->getCharacterRanks($pagingData);
    }
}
