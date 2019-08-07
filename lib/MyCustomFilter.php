<?php

use MoesifFilter;

class MyCustomFilter extends MoesifFilter {

    /**
     * Get UserId
     */
    public function identifyUserId($request, $response){

        $user = $this->getContext()->getUser();
        if (!is_null($user)) {
            $id = $user->getAttribute("id");
            if (!$this->IsNullOrEmptyString($id)) {
            return $id ;
            }
            return $user->getAttribute("user_id");
        }
        return null;
    }

    /**
     * Get sessionToken
     */
    function identifySessionToken($request, $response){
        # Return Authorization header
        return $request->getHttpHeader('Authorization');
    }

}
