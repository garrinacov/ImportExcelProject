<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menus;

use Session;

use App\Exports\MenusExport;
use App\Imports\MenusImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Service\ExcelHandler;

class MenusController extends Controller
{
	public function index()
	{
		$menus = Menus::all();
		return view('menus',['menus'=>$menus]);
	}

	public function export_excel()
	{
		return Excel::download(new MenusExport, 'menus.xlsx');
	}

	public function import_excel(Request $request) 
	{
		// capture file excel
		$file = $request->file('file');

		// format excel to array
		$excelHandler = new ExcelHandler;
		$menus = $excelHandler->read($file);

		// loop array to set to DB:
		foreach ($menus as $menu) {
			Menus::create($menu);
		}

		// validation
		// $this->validate($request, [
		// 	'file' => 'required|mimes:csv,xls,xlsx'
		// ]);

		// // make name file 
		// $nama_file = rand().$file->getClientOriginalName();

		// // upload to folder file_menus in the folder public
		// $file->move('file_menus',$nama_file);

		// // import data
		// Excel::import(new MenusImport, public_path('/file_menus/'.$nama_file));

		// // notification with session
		// Session::flash('success','Data Menus Congrats Import!');

		// redirect page back
		return redirect('/menus');
	}
}