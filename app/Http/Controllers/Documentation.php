<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Documentation extends Controller
{
   public function main()
   {
		return view("documentation_page");
   }

   public function page_two()
   {
		return view("page_two");
   }
}






