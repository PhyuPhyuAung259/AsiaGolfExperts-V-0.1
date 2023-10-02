<?php

namespace Themes\Findhouse\User\Models;

use Themes\Findhouse\Property\Models\Property;

class User extends \App\User
{

    public function property()
    {
        return $this->hasMany(Property::class, 'author_id')->where('bravo_properties.status', '=', 'publish');
    }
    public static function getListUser($agenciesId = null)
    {
        $listAgentHasAgencies = AgenciesAgent::query();
        if (!empty($agenciesId)) {
            $listAgentHasAgencies->where('agencies_id', '<>', $agenciesId);
        }
        $listAgentHasAgencies = $listAgentHasAgencies->pluck('agent_id')->toArray();
        $users = User::select('*')
            ->whereNotIn('id', $listAgentHasAgencies)
            ->orderBy('id', 'desc')->orderBy('first_name', 'asc')->limit(20)->get();
        $data = [];
        foreach ($users as $item) {
            $data[] = [
                'id'   => $item->id,
                'name' => $item->email,
            ];
        }
        return $data;
    }
}
