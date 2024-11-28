<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;

class OrderController extends Controller
{
    public function index() {

      
       
        $Order = Order::all();
        $Order_detail = Order_detail::all(); // Lấy tất cả các chi tiết đơn hàng
    
        $Orderhistory = []; // Khởi tạo mảng rỗng để lưu lịch sử đơn hàng
    
        foreach ($Order as $order) { 
            // Lấy các chi tiết đơn hàng liên quan đến đơn hàng hiện tại
            $Order_details = $Order_detail->where('order_id', $order->id);
    
            // Khởi tạo mảng rỗng để lưu chi tiết của đơn hàng
            $orderDetailsArray = [];
    
            foreach ($Order_details as $detail) {
                // Lấy sản phẩm tương ứng với chi tiết đơn hàng
                $product = Product::find($detail->product_id);
    
                // Thêm chi tiết đơn hàng và sản phẩm vào mảng
                $orderDetailsArray[] = [
                    'detail' => $detail,
                    'product' => $product
                ];
            }
    
            // Lưu đơn hàng và chi tiết vào mảng Orderhistory
            $Orderhistory[] = [
                'order' => $order,
                'details' => $orderDetailsArray
            ];
        }
        echo "<script>console.log(" . json_encode($Orderhistory) . ");</script>";
        // Trả về Orderhistory hoặc view với dữ liệu
        return view('client.order.index', ['Orderhistory' => $Orderhistory]);
    }
    public function show($id)
{
    // Lấy thông tin đơn hàng và chi tiết đơn hàng
    $order = Order::with(['user', 'orderDetails.product'])->findOrFail($id);

    return view('admin.orders.show', compact('order'));
}

}
