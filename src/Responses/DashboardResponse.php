<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 2019-03-07
 * Time: 03:50
 */

namespace Tcgv2\Bo\Responses;

use Illuminate\Contracts\Support\Responsable;
use Tcgv2\Bo\Presenters\UserPresenter;

class DashboardResponse implements Responsable
{

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        $data = [
            'admin' => new UserPresenter()
        ];
        return view('bo::dashboard', $data);
    }
}