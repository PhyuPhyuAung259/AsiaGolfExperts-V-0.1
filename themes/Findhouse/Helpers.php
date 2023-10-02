<?php
function is_agency_owner($id=false){

    if(!$id) $id = auth()->id();

    return \Themes\Findhouse\Agencies\Models\Agencies::query()->where('id',$id)->count();
}
