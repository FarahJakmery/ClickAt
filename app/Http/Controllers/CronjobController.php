<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fastproduct;

class CronjobController extends Controller
{

    public function updateItem()
    {
        $updates = Fastproduct::where('status_for_show', 1)->get();
        foreach ($updates as $update) {
            $d2 = strtotime($update->expiry_date);
            $d3 = $d2 + 7200;
            $d4 = strtotime(now());
            $d5 = $d3 - $d4;
            if ($d5 <= 0) {
                $data = [
                    'status_for_show' => 0
                ];
                $update->update($data);
            }
        }
    }
}
