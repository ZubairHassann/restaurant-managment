<?php

namespace App\Controllers;

use App\Models\ThemeModel;

class ThemeController extends BaseController
{
    // Show the form to edit theme colors
    public function index()
    {
        $model = new ThemeModel();
        $theme = $model->first();  // Get the first theme record

        // Pass the theme data to the view
        return view('admindashboard/color/edit_color', ['theme' => $theme]);
    }

    // Update the theme colors
    public function update()
    {
        $model = new ThemeModel();

        // Get the color values from the form submission
        $primary_color = $this->request->getPost('primary_color');
        $header_color = $this->request->getPost('header_color');
        $footer_color = $this->request->getPost('footer_color');
        $body_color = $this->request->getPost('body_color');

        // Update the theme colors in the database
        $model->update(1, [
            'primary_color' => $primary_color,
            'header_color' => $header_color,
            'footer_color' => $footer_color,
            'body_color' => $body_color
        ]);

        // Redirect with a success message
        return redirect()->to('/admindashboard/color/edit')->with('success', 'Theme updated successfully!');
    }
}
