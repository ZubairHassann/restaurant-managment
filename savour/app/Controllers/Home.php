<?php

namespace App\Controllers;

use App\Models\CategorieModel;
use App\Models\ProductModel;
use App\Models\FooterModel; // Import Footer Model
use App\Models\ThemeModel; // Import Theme Model

class Home extends BaseController
{
    public function index()
    {
        // ===========] Get Categories
        $catgModel = new CategorieModel();
        $catgs = $catgModel->findAll();

        // ============] Get Products
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        // ============] Get Footer Data
        $footerModel = new FooterModel();
        $footer = $footerModel->first(); // Fetch first footer record

        // ============] Get Theme Data (Colors)
        $themeModel = new ThemeModel();
        $theme = $themeModel->first(); // Fetch the theme data (assuming you only have one record)

        // ============] Pass Data to View
        return view('Home', [
            'catg' => $catgs,
            'product' => $products,
            'footer' => $footer,
            'theme' => $theme // Pass theme data to the view
        ]);
    } 
}
