<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\BankExpenseController;
use App\Http\Controllers\CarringExpenseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerDueController;
use App\Http\Controllers\CustomerFollowUpdateController;
use App\Http\Controllers\DokanExpenseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LabourExpenseController;
use App\Http\Controllers\MonthlyBonusController;
use App\Http\Controllers\MonthlyBonusCountController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PriceGroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SalaryExpenseController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ShowDueController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplierDueController;
use App\Http\Controllers\SupplierFollowUpdateController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\YearlyBonusController;
use App\Http\Controllers\YearlyBonusCountController;
use App\Livewire\Brand\Index;
use App\Livewire\Counter;
use App\Livewire\Purchase\Checkout;
use App\Models\CustomerFollowUpdate;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::get('permisssion','App\Http\Controllers\HomeController@index');

Route::get('/brand', App\Livewire\Brand\Index::class)->name('brand');

//Route::get('/counter', Counter::class);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function ()
{
    Route::get('/dashboard', function () {
        return view('dashboard');
        //return view('admin.home');
    })->name('dashboard');

    //customers route
    Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('customer', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('customer/view/{id}', [CustomerController::class, 'view'])->name('customer.view');
    Route::get('customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('customer/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');

    //suppliers route
    Route::get('supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('supplier/view/{id}', [SupplierController::class, 'view'])->name('supplier.view');
    Route::get('supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('supplier/update', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('supplier/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');
    Route::get('supplier/{id}/{status}', [SupplierController::class, 'status'])->name('supplier.status');

    //category route
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    //product group route
    Route::get('subcategory', [SubCategoryController::class, 'index'])->name('subcategory.index');
    Route::get('subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('subcategory', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('subcategory/update', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('subcategory/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');

    //brand route not use hare
    // Route::get('brand', [BrandController::class, 'index'])->name('brand.index');
    // Route::get('brand/create', [BrandController::class, 'create'])->name('brand.create');
    // Route::post('brand', [BrandController::class, 'store'])->name('brand.store');
    // Route::get('brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    // Route::post('brand/update', [BrandController::class, 'update'])->name('brand.update');
    // Route::get('brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

    //unit route
    Route::get('unit', [UnitController::class, 'index'])->name('unit.index');
    Route::get('unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('unit', [UnitController::class, 'store'])->name('unit.store');
    Route::get('unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('unit/update', [UnitController::class, 'update'])->name('unit.update');
    Route::get('unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');

    //size route
    Route::get('sizs', [SizeController::class, 'index'])->name('size.index');
    Route::get('size/create', [SizeController::class, 'create'])->name('size.create');
    Route::post('size', [SizeController::class, 'store'])->name('size.store');
    Route::get('size/edit/{id}', [SizeController::class, 'edit'])->name('size.edit');
    Route::post('size/update', [SizeController::class, 'update'])->name('size.update');
    Route::get('size/delete/{id}', [SizeController::class, 'delete'])->name('size.delete');

    //warehouse route
    Route::get('warehouse', [WarehouseController::class, 'index'])->name('warehouse.index');
    Route::get('warehouse/create', [WarehouseController::class, 'create'])->name('warehouse.create');
    Route::post('warehouse', [WarehouseController::class, 'store'])->name('warehouse.store');
    Route::get('warehouse/view/{id}', [WarehouseController::class, 'view'])->name('warehouse.view');
    Route::get('warehouse/edit/{id}', [WarehouseController::class, 'edit'])->name('warehouse.edit');
    Route::post('warehouse/update', [WarehouseController::class, 'update'])->name('warehouse.update');
    Route::get('warehouse/delete/{id}', [WarehouseController::class, 'delete'])->name('warehouse.delete');
    Route::get('warehouse/{id}/{status}', [WarehouseController::class, 'status'])->name('warehouse.status');

    //price group route
    Route::get('price_group', [PriceGroupController::class, 'index'])->name('price_group.index');
    Route::get('price_group/create', [PriceGroupController::class, 'create'])->name('price_group.create');
    Route::post('price_group', [PriceGroupController::class, 'store'])->name('price_group.store');
    Route::get('price_group/edit/{id}', [PriceGroupController::class, 'edit'])->name('price_group.edit');
    Route::post('price_group/update', [PriceGroupController::class, 'update'])->name('price_group.update');
    Route::get('price_group/delete/{id}', [PriceGroupController::class, 'delete'])->name('price_group.delete');

    //price group route
    Route::get('bank', [BankController::class, 'index'])->name('bank.index');
    Route::get('bank/create', [BankController::class, 'create'])->name('bank.create');
    Route::post('bank', [BankController::class, 'store'])->name('bank.store');
    Route::get('bank/edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
    Route::post('bank/update', [BankController::class, 'update'])->name('bank.update');
    Route::get('bank/delete/{id}', [BankController::class, 'delete'])->name('bank.delete');

    //product group route
    Route::get('product_group', [ProductGroupController::class, 'index'])->name('product_group.index');
    Route::get('product_group/create', [ProductGroupController::class, 'create'])->name('product_group.create');
    Route::post('product_group', [ProductGroupController::class, 'store'])->name('product_group.store');
    Route::get('product_group/edit/{id}', [ProductGroupController::class, 'edit'])->name('product_group.edit');
    Route::post('product_group/update', [ProductGroupController::class, 'update'])->name('product_group.update');
    Route::get('product_group/delete/{id}', [ProductGroupController::class, 'delete'])->name('product_group.delete');

    //employee route
    Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('employee/view/{id}', [EmployeeController::class, 'view'])->name('employee.view');
    Route::get('employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('employee/update', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');

     //product route
     Route::get('product', [ProductController::class, 'index'])->name('product.index');
     Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
     Route::post('product', [ProductController::class, 'store'])->name('product.store');
     Route::get('product/view/{id}', [ProductController::class, 'view'])->name('product.view');
     Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
     Route::post('product/update', [ProductController::class, 'update'])->name('product.update');
     Route::get('product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
     Route::get('product/gallery', [ProductController::class, 'gallery'])->name('product.gallery');

    //purchase route
    Route::get('purchase', [PurchaseController::class, 'index'])->name('purchase.index');
    Route::get('purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
    Route::post('purchase', [PurchaseController::class, 'sessionStore'])->name('session.store');
    Route::post('purchase/store', [PurchaseController::class, 'purchaseStore'])->name('purchase.store');
    Route::get('purchase/view/{invoice}', [PurchaseController::class, 'view'])->name('purchase.view');
    Route::get('purchase/edit/{id}', [PurchaseController::class, 'edit'])->name('purchase.edit');
    Route::post('purchase/update', [PurchaseController::class, 'update'])->name('purchase.update');
    Route::get('purchase/delete/{id}', [PurchaseController::class, 'delete'])->name('purchase.delete');
    Route::get('purchase/gallery', [PurchaseController::class, 'gallery'])->name('purchase.gallery');

     //purchase return route
    Route::get('purchase/return', [PurchaseController::class, 'returnIndex'])->name('purchase.return.index');
    Route::get('purchase/return/create', [PurchaseController::class, 'returnCreate'])->name('purchase.return.create');
    Route::post('purchase/return', [PurchaseController::class, 'sessionReturnStore'])->name('session.return.store');
    Route::post('purchase/return/store', [PurchaseController::class, 'returnStore'])->name('purchase.return.store');
    Route::get('purchase/return/edit/{id}', [PurchaseController::class, 'returnEdit'])->name('purchase.return.edit');
    Route::get('purchase/return/delete/{id}', [PurchaseController::class, 'returnDelete'])->name('purchase.return.delete');

    Route::get('test', [PurchaseController::class, 'testCart'])->name('purchase.test');


    //livewire purchase route
    Route::get('/live/purchase/create', App\Livewire\Purchase\Index::class)->name('live.purchase.create');
    Route::get('/live/purchase/checkout', App\Livewire\Purchase\Checkout::class)->name('live.purchase.checkout');

     //livewire Sales route
     Route::get('/live/sales/create', App\Livewire\Sales\Index::class)->name('live.sales.create');
     Route::get('/live/sales/checkout', App\Livewire\Sales\Checkout::class)->name('live.sales.checkout');


    //Sales route
     Route::get('sales', [SalesController::class, 'index'])->name('sales.index');
     Route::get('sales/view/{invoice}', [SalesController::class, 'view'])->name('sales.view');



    //account/collection route
    Route::get('collection', [CollectionController::class, 'index'])->name('collection.index');
    Route::get('collection/create', [CollectionController::class, 'create'])->name('collection.create');
    Route::post('collection', [CollectionController::class, 'store'])->name('collection.store');
    Route::get('collection/view/{id}', [CollectionController::class, 'view'])->name('collection.view');
    Route::get('collection/edit/{id}', [CollectionController::class, 'edit'])->name('collection.edit');
    Route::post('collection/update', [CollectionController::class, 'update'])->name('collection.update');
    Route::get('collection/delete/{id}', [CollectionController::class, 'delete'])->name('collection.delete');


     //account/payment route
     Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
     Route::get('payment/create', [PaymentController::class, 'create'])->name('payment.create');
     Route::post('payment', [PaymentController::class, 'store'])->name('payment.store');
     Route::get('payment/view/{id}', [PaymentController::class, 'view'])->name('payment.view');
     Route::get('payment/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
     Route::post('payment/update', [PaymentController::class, 'update'])->name('payment.update');
     Route::get('payment/delete/{id}', [PaymentController::class, 'delete'])->name('payment.delete');


    //expense route
    Route::get('expense', [ExpenseController::class, 'index'])->name('expense.index');
    Route::get('expense/create', [ExpenseController::class, 'create'])->name('expense.create');
    Route::post('expense', [ExpenseController::class, 'store'])->name('expense.store');
    Route::get('expense/edit/{id}', [ExpenseController::class, 'edit'])->name('expense.edit');
    Route::post('expense/update', [ExpenseController::class, 'update'])->name('expense.update');
    Route::get('expense/delete/{id}', [ExpenseController::class, 'delete'])->name('expense.delete');

    //salary expense route
    Route::get('salary/expense', [SalaryExpenseController::class, 'index'])->name('salary.expense.index');
    Route::get('salary/expense/create', [SalaryExpenseController::class, 'create'])->name('salary.expense.create');
    Route::post('salary/expense', [SalaryExpenseController::class, 'store'])->name('salary.expense.store');
    Route::get('salary/expense/edit/{id}', [SalaryExpenseController::class, 'edit'])->name('salary.expense.edit');
    Route::post('salary/expense/update', [SalaryExpenseController::class, 'update'])->name('salary.expense.update');
    Route::get('salary/expense/delete/{id}', [SalaryExpenseController::class, 'delete'])->name('salary.expense.delete');

     //bank expense route
     Route::get('bank/expense', [BankExpenseController::class, 'index'])->name('bank.expense.index');
     Route::get('bank/expense/create', [BankExpenseController::class, 'create'])->name('bank.expense.create');
     Route::post('bank/expense', [BankExpenseController::class, 'store'])->name('bank.expense.store');
     Route::get('bank/expense/edit/{id}', [BankExpenseController::class, 'edit'])->name('bank.expense.edit');
     Route::post('bank/expense/update', [BankExpenseController::class, 'update'])->name('bank.expense.update');
     Route::get('bank/expense/delete/{id}', [BankExpenseController::class, 'delete'])->name('bank.expense.delete');

    //labour expense route
    Route::get('labour/expense', [LabourExpenseController::class, 'index'])->name('labour.expense.index');
    Route::get('labour/expense/create', [LabourExpenseController::class, 'create'])->name('labour.expense.create');
    Route::post('labour/expense', [LabourExpenseController::class, 'store'])->name('labour.expense.store');
    Route::get('labour/expense/edit/{id}', [LabourExpenseController::class, 'edit'])->name('labour.expense.edit');
    Route::post('labour/expense/update', [LabourExpenseController::class, 'update'])->name('labour.expense.update');
    Route::get('labour/expense/delete/{id}', [LabourExpenseController::class, 'delete'])->name('labour.expense.delete');

     //dokan expense route
     Route::get('dokan/expense', [DokanExpenseController::class, 'index'])->name('dokan.expense.index');
     Route::get('dokan/expense/create', [DokanExpenseController::class, 'create'])->name('dokan.expense.create');
     Route::post('dokan/expense', [DokanExpenseController::class, 'store'])->name('dokan.expense.store');
     Route::get('dokan/expense/edit/{id}', [DokanExpenseController::class, 'edit'])->name('dokan.expense.edit');
     Route::post('dokan/expense/update', [DokanExpenseController::class, 'update'])->name('dokan.expense.update');
     Route::get('dokan/expense/delete/{id}', [DokanExpenseController::class, 'delete'])->name('dokan.expense.delete');

    //carring expense route
    Route::get('carring/expense', [CarringExpenseController::class, 'index'])->name('carring.expense.index');
    Route::get('carring/expense/create', [CarringExpenseController::class, 'create'])->name('carring.expense.create');
    Route::post('carring/expense', [CarringExpenseController::class, 'store'])->name('carring.expense.store');
    Route::get('carring/expense/edit/{id}', [CarringExpenseController::class, 'edit'])->name('carring.expense.edit');
    Route::post('carring/expense/update', [CarringExpenseController::class, 'update'])->name('carring.expense.update');
    Route::get('carring/expense/delete/{id}', [CarringExpenseController::class, 'delete'])->name('carring.expense.delete');

    //expense route
    Route::get('expense/category', [ExpenseCategoryController::class, 'index'])->name('expense_category.index');
    Route::get('expense/category/create', [ExpenseCategoryController::class, 'create'])->name('expense_category.create');
    Route::post('expense/category', [ExpenseCategoryController::class, 'store'])->name('expense_category.store');
    Route::get('expense/category/edit/{id}', [ExpenseCategoryController::class, 'edit'])->name('expense_category.edit');
    Route::post('expense/category/update', [ExpenseCategoryController::class, 'update'])->name('expense_category.update');
    Route::get('expense/category/delete/{id}', [ExpenseCategoryController::class, 'delete'])->name('expense_category.delete');


    //customer due route
    Route::get('customer/due', [CustomerDueController::class, 'index'])->name('customer.due.index');
    Route::get('customer/due/create', [CustomerDueController::class, 'create'])->name('customer.due.create');
    Route::post('customer/due', [CustomerDueController::class, 'store'])->name('customer.due.store');
    Route::get('customer/due/view/{id}', [CustomerDueController::class, 'view'])->name('customer.due.view');
    Route::get('customer/due/edit/{id}', [CustomerDueController::class, 'edit'])->name('customer.due.edit');
    Route::post('customer/due/update', [CustomerDueController::class, 'update'])->name('customer.due.update');
    Route::get('customer/due/delete/{id}', [CustomerDueController::class, 'delete'])->name('customer.due.delete');

    //supplier due route
    Route::get('due/supplier', [SupplierDueController::class, 'index'])->name('supplier.due.index');
    Route::get('due/supplier/create', [SupplierDueController::class, 'create'])->name('supplier.due.create');
    Route::post('due/supplier', [SupplierDueController::class, 'store'])->name('supplier.due.store');
    Route::get('due/supplier/{id}/view', [SupplierDueController::class, 'view'])->name('supplier.due.view');
    Route::get('due/supplier/edit/{id}', [SupplierDueController::class, 'edit'])->name('supplier.due.edit');
    Route::post('due/supplier/update', [SupplierDueController::class, 'update'])->name('supplier.due.update');
    Route::get('due/supplier/delete/{id}', [SupplierDueController::class, 'delete'])->name('supplier.due.delete');

    //show due route
    Route::get('show/customer/due', [ShowDueController::class, 'showCustomerDue'])->name('show.customer.due');
    Route::get('show/supplier/due', [ShowDueController::class, 'showSupplierDue'])->name('show.supplier.due');


    //customer follow Udate route
    Route::get('follow-update/customer', [CustomerFollowUpdateController::class, 'index'])->name('customer.follow.index');
    Route::get('follow-update/customer/create', [CustomerFollowUpdateController::class, 'create'])->name('customer.follow.create');
    Route::post('follow-update/customer', [CustomerFollowUpdateController::class, 'store'])->name('customer.follow.store');
    Route::get('follow-update/customer/{id}/view', [CustomerFollowUpdateController::class, 'view'])->name('customer.follow.view');
    Route::get('follow-update/customer/edit/{id}', [CustomerFollowUpdateController::class, 'edit'])->name('customer.follow.edit');
    Route::post('follow-update/customer/update', [CustomerFollowUpdateController::class, 'update'])->name('customer.follow.update');
    Route::get('follow-update/customer/delete/{id}', [CustomerFollowUpdateController::class, 'delete'])->name('customer.follow.delete');

    //customer follow Update route
    Route::get('follow-update/supplier', [SupplierFollowUpdateController::class, 'index'])->name('supplier.follow.index');
    Route::get('follow-update/supplier/create', [SupplierFollowUpdateController::class, 'create'])->name('supplier.follow.create');
    Route::post('follow-update/supplier', [SupplierFollowUpdateController::class, 'store'])->name('supplier.follow.store');
    Route::get('follow-update/supplier/{id}/view', [SupplierFollowUpdateController::class, 'view'])->name('supplier.follow.view');
    Route::get('follow-update/supplier/edit/{id}', [SupplierFollowUpdateController::class, 'edit'])->name('supplier.follow.edit');
    Route::post('follow-update/supplier/update', [SupplierFollowUpdateController::class, 'update'])->name('supplier.follow.update');
    Route::get('follow-update/supplier/delete/{id}', [SupplierFollowUpdateController::class, 'delete'])->name('supplier.follow.delete');

    //quotation route
    Route::get('quotation/create', [QuotationController::class, 'create'])->name('quotation.create');
    Route::get('quotation/{id}/view', [QuotationController::class, 'view'])->name('quotation.view');

    //bonus count route
    Route::get('bonus', [MonthlyBonusCountController::class, 'index'])->name('bonus.index');
    Route::get('bonus/create', [MonthlyBonusCountController::class, 'create'])->name('bonus.create');
    Route::post('bonus', [MonthlyBonusCountController::class, 'store'])->name('bonus.store');
    Route::get('bonus/{id}/view', [MonthlyBonusCountController::class, 'view'])->name('bonus.view');
    Route::get('bonus/edit/{id}', [MonthlyBonusCountController::class, 'edit'])->name('bonus.edit');
    Route::post('bonus/update', [MonthlyBonusCountController::class, 'update'])->name('bonus.update');
    Route::get('bonus/delete/{id}', [MonthlyBonusCountController::class, 'delete'])->name('bonus.delete');
    Route::get('get-supplier',  [MonthlyBonusCountController::class, 'supplierSearch'])->name('supplier.search');

    //yearly bonus count route
    Route::get('yearly/bonus', [YearlyBonusCountController::class,'index'])->name('yearly.bonus.index');
    Route::get('yearly/bonus/create', [YearlyBonusCountController::class, 'create'])->name('yearly.bonus.create');
    Route::post('yearly/bonus', [YearlyBonusCountController::class, 'store'])->name('yearly.bonus.store');
    Route::get('yearly/bonus/{id}/view', [YearlyBonusCountController::class, 'view'])->name('yearly.bonus.view');
    Route::get('yearly/bonus/edit/{id}', [YearlyBonusCountController::class, 'edit'])->name('yearly.bonus.edit');
    Route::post('yearly/bonus/update', [YearlyBonusCountController::class, 'update'])->name('yearly.bonus.update');
    Route::get('yearly/bonus/delete/{id}', [YearlyBonusCountController::class, 'delete'])->name('yearly.bonus.delete');
    Route::get('yearly/get-supplier',  [YearlyBonusCountController::class, 'supplierSearch'])->name('yearly.supplier.search');

    //monthly bonus route
    Route::get('monthly/bonus/list', [MonthlyBonusController::class, 'index'])->name('monthly.bonus.index');

     //yearly bonus route
    Route::get('yearly/bonus/list', [YearlyBonusController::class, 'show'])->name('yearly.bonus.show');

});
