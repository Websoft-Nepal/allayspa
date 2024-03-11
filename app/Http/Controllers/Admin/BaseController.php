<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class BaseController extends Controller
{

    protected $url = "http://192.168.1.95:8000/uploads";

    protected function slugValidate(string $tableName, $ignoreId = null): string
    {
        $uniqueRule = Rule::unique($tableName);

        if ($ignoreId !== null) {
            $uniqueRule->ignore($ignoreId);
        }

        return 'required|' . $uniqueRule . '|min:3|regex:/^[a-z0-9-]+$/';
    }



    /**
     * @param $value = $request->slug
     * return ('active' || 'inactive')
     */
    protected function status($value): String
    {
        return $value == 'on' ? "active" : "inactive";
    }


    public function uploadImage($location = 'upload/', $image)
    {
        $filename = Str::uuid()->toString() . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move($location, $filename);

        return $filename;
    }
}
