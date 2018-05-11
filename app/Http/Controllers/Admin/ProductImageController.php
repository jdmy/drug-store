<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function index($pid)
	{
		$data['product']=\App\Product::find($pid);
		$data['product_images']=\App\Product::find($pid)->product_images;
	    return view('admin/product_image/index',$data);
	}

	public function upload(Request $request, $pid)
	{
		$data['provinces']=\App\Province::all();
		$filename="";
		if ($request->isMethod('post')) {
            $file = $request->file('picture');
            // 文件是否上传成功
            if ($file->isValid()) {
                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                var_dump($bool);
            }
        }
        $product_image = new \App\ProductImage;
        $product_image->url=$filename;
        $product_image->pid=$pid;
        if ($product_image->save()) {
	        return redirect('admin/product_images/'.$pid);
	    } else {
	        return redirect()->back()->withInput()->withErrors('保存失败！');
	    }
	}

	public function destroy($pid, $id)
    {
        \App\ProductImage::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
