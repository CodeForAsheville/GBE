<?php namespace DemocracyApps\GB\Http\Controllers\Build;
/**
 *
 * This file is part of the Government Budget Explorer (GBE).
 *
 *  The GBE is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GBE is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with the GBE.  If not, see <http://www.gnu.org/licenses/>.
 */
use DemocracyApps\GB\Http\Requests;
use DemocracyApps\GB\Http\Controllers\Controller;

use DemocracyApps\GB\Sites\Card;
use DemocracyApps\GB\Sites\CardSet;
use DemocracyApps\GB\Sites\Site;
use Illuminate\Http\Request;

class BuildController extends Controller {

    public function settings($slug)
    {
        $site = Site::where('slug','=', $slug)->first();
        return view('build.settings', array('site'=>$site));
    }

    public function pages($slug)
    {
        $site = Site::where('slug','=', $slug)->first();
        return view('build.pages', array('site'=>$site));
    }

    public function cards($slug, Request $request)
    {
        $site = Site::where('slug','=', $slug)->first();
        $list = CardSet::where('site','=',$site->id)->orderBy('id')->get();
        $cards = Card::where('site','=',$site->id)->orderBy('id')->get();
        $cardsets = array();
        foreach ($list as $item) {
            $cardset = new \stdClass();
            $cardset->id = $item->id;
            $cardset->name = $item->name;
            $cardset->cards = array();
            $cardset->cardsById = array();
            $cardsets[$cardset->id] = $cardset;
        }
        foreach($cards as $card) {
            $cardsets[$card->card_set]->cards[] = $card;
        }
        $selectedSet = ($list != null && sizeof($list) > 0)?$list[0]->id:-1;
        if ($request->has('selectedSet')) {
            $selectedSet = $request->get('selectedSet');
        }
        return view('build.cards', array('site'=>$site, 'cardsets'=>$cardsets, 'cards'=>$cards,
            'selectedSet'=>$selectedSet));
    }
}