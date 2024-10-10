<?php

namespace App\Http\Controllers;

class ElegantCollectionController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * @return array
     */
    public function index(): array
    {
        $output = [];

        $employees = [
            ['name' => 'John', 'city' => 'Dallas'],
            ['name' => 'Jane', 'city' => 'Austin'],
            ['name' => 'Jake', 'city' => 'Dallas'],
            ['name' => 'Jill', 'city' => 'Dallas'],
        ];

        $offices = [
            ['office' => 'Dallas HQ', 'city' => 'Dallas'],
            ['office' => 'Dallas South', 'city' => 'Dallas'],
            ['office' => 'Austin Branch', 'city' => 'Austin'],
        ];


        foreach ($employees as $employee) {
            foreach ($offices as $office) {
                if($employee['city'] == $office['city']){
                    $output[$employee['city']][$office['office']][] = $employee['name'];
                }
            }
        }

        return $output;
    }
}
