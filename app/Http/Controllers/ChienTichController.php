<?php

namespace App\Http\Controllers;

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
        if ($request->has('pvp') && in_array(intval($request->pvp), [0,1,2,3])) $level = intval($request->pvp);

        $defaultPageSize = $this->setting->num_display;
        $defaultPageSize = 1;
        if ($defaultPageSize) {
            $defaultpage = 0;
            $validPageSizes = array($defaultPageSize); // This determines valid values for how many results can be displayed on a page.
            $validOrderBys = array('K1','K2','KDR'); // This determines valid values for how the results can be ordered on a page.
            $validPageDirections = array('ASC','DESC'); // This determines valid values for how the direction results can be sorted on a page.

            // Gather valid user input from the user's POST request
            $pagingData = array();
            $pagingData['page'] = isset($_REQUEST['page']) && (!empty($_REQUEST['page']) && is_numeric($_REQUEST['page'])) && $_REQUEST['page'] >= 0 ? $_REQUEST['page'] : $defaultpage;
            $pagingData['pageSize'] = isset($_REQUEST['pageSize']) && (!empty($_REQUEST['page']) && is_numeric($_REQUEST['pageSize'])) && in_array($_REQUEST['pageSize'],$validPageSizes) ? $_REQUEST['pageSize'] : $defaultPageSize;
            $pagingData['pageOrder'] = isset($_REQUEST['pageOrder']) && !empty($_REQUEST['pageOrder']) && in_array($_REQUEST['pageOrder'],$validOrderBys) ? $_REQUEST['pageOrder'] : 'K1';
            $pagingData['pageDirection'] = isset($_REQUEST['pageDirection']) && !empty($_REQUEST['pageDirection']) && in_array($_REQUEST['pageDirection'],$validPageDirections) ? $_REQUEST['pageDirection'] : 'DESC';

            $pagingData['level'] = $level;
            $pagingData['class'] = isset($_REQUEST['class']) && (!empty($_REQUEST['class']) || is_numeric($_REQUEST['class'])) ? $_REQUEST['class'] : 0;
            $pagingData['faction'] = isset($_REQUEST['faction']) && (!empty($_REQUEST['faction']) || is_numeric($_REQUEST['faction'])) ? $_REQUEST['faction'] : 0;

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
}
