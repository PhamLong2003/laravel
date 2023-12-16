    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AgentController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\Backend\PropertyTypeController;
    use App\Http\Controllers\Backend\PropertyController;
    use App\Http\Controllers\Backend\TestimonialsController;
    use App\Http\Controllers\Backend\StateController;
    use App\Http\Controllers\Backend\BlogController;
    use App\Http\Middleware\RedirectIfAuthenticated;
    use App\Http\Controllers\Agent\AgentPrpertyController;
    use App\Http\Controllers\Frontend\IndexController;
    use App\Http\Controllers\Frontend\WishlishController;
    use App\Http\Controllers\Frontend\CompareController;




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

    // Route::get('/', function () {
    //     return view('welcome');
    // });
    //User frontend All route
    Route::get('/', [UserController::class, 'Index']);






    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/logout/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');


    
                //User Wishlist all route from admin
        Route::controller(WishlishController::class)->group(function(){

            Route::get('/user/wishlist', 'UserWishlist')->name('user.wishlist');
            Route::get('/get-wishlist-property', 'GetWishlistProperty');
            Route::get('/wishlist-remove/{id}', 'WishlistRemove');



            });
 //User compare all route from admin
        Route::controller(CompareController::class)->group(function(){

            Route::get('/user/compare', 'UserCompare')->name('user.compare');
            Route::get('get-compare-property/', 'GetCompareProperty');
            Route::get('/compare-remove/{id}', 'CompareRemove');


          
    
    
    
            });






    
    });

    require __DIR__.'/auth.php';

    // admin group middleware

    Route::middleware(['auth','role:admin'])->group(function() {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');


        
    });//end group admin middleware

    // agent group middleware


    Route::middleware(['auth','role:agent'])->group(function() {


    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
    Route::get('/agent/logout', [AgentController::class, 'AgentLogout'])->name('agent.logout');
    Route::get('/agent/profile', [AgentController::class, 'AgentProfile'])->name('agent.profile');
    Route::post('/agent/profile/store', [AgentController::class, 'AgentProfileStore'])->name('agent.profile.store');
    Route::get('/agent/change/password', [AgentController::class, 'AgentChangePassword'])->name('agent.change.password');
    Route::post('/agent/update/password', [AgentController::class, 'AgentUpdatePassword'])->name('agent.update.password');







    });//And group agent middleware



    Route::get('/agent/login', [AdminController::class, 'AgentLogin'])->name('agent.login')->middleware(RedirectIfAuthenticated::class);
    Route::post('/agent/register', [AgentController::class, 'AgentRegister'])->name('agent.register');
    Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);


    // admin group middleware

        Route::middleware(['auth','role:admin'])->group(function() {

            //proprety type all route
            Route::controller(PropertyTypeController::class)->group(function(){

                Route::get('/all/type', 'Alltype')->name('all.type');
                Route::get('/add/type', 'Addtype')->name('add.type');
                Route::post('/store/type', 'Storetype')->name('store.type');
                Route::get('/edit/type/{id}', 'Edittype')->name('edit.type');
                Route::post('/update/type', 'UpdateType')->name('update.type');
                Route::get('/delete/type/{id}', 'Deletetype')->name('delete.type');
            });
            
            //Amenities type all route
            Route::controller(PropertyTypeController::class)->group(function(){

                Route::get('/all/amenitie', 'AllAmenitie')->name('all.amenitie');
                Route::get('/add/amenitie', 'AddAmenitie')->name('add.amenitie');
                Route::post('/store/amenitie', 'Storeamenitie')->name('store.amenitie');
                Route::get('/edit/amenitie/{id}', 'EditAmenitie')->name('edit.amenitie');
                Route::post('/update/amenitie', 'UpdateAmenitie')->name('update.amenitie');
                Route::get('/delete/amenitie/{id}', 'DeleteAmenitie')->name('delete.amenitie');
            });

            //Property type all route
            Route::controller(PropertyController::class)->group(function(){

                Route::get('/all/property', 'AllProperty')->name('all.property');
                Route::get('/add/property', 'AddProperty')->name('add.property');
                Route::post('/store/property', 'StoreProperty')->name('store.property');
                Route::get('/edit/property/{id}', 'EditProperty')->name('edit.property');
                Route::post('/update/property', 'UpdateProperty')->name('update.property');
                Route::post('/update/property/thumbnail', 'UpdatePropertyThumbnail')->name('update.property.thumbnail');
                Route::post('/update/property/multiimage', 'UpdatePropertyMultiimage')->name('update.property.multiimage');
                Route::get('/edit/property/multiimage/{id}', 'PropertyMultiImage')->name('property.multiimage.delete');
                Route::post('/store/new/multiimage', 'StoreNewMultiimage')->name('store.new.multiimage');
                Route::post('/update/property/facilities', 'UpdatePropertyFacilities')->name('update.property.facilities');
                Route::get('/delete/property/{id}', 'DeleteProperty')->name('delete.property');
                Route::get('/details/property/{id}', 'DetailsProperty')->name('details.property');
                Route::post('/inactive/property', 'InactiveProperty')->name('inactive.property');
                Route::post('/active/property', 'ActiveProperty')->name('active.property');
                Route::get('/admin/package/history', 'AdminPackageHistory')->name('admin.package.history');
                Route::get('/package/invoice/{id}', 'PackageInvoice')->name('package.invoice');
                Route::get('/admin/property/message', 'AdminPropertyMessage')->name('admin.property.message');



            });

                //Agent type all route from admin
                Route::controller(AdminController::class)->group(function(){

                    Route::get('/all/agent', 'AllAgent')->name('all.agent');
                    Route::get('/add/agent', 'AddAgent')->name('add.agent');
                    Route::post('/store/agent', 'StoreAgent')->name('store.agent');
                    Route::get('/edit/agent/{id}', 'EditAgent')->name('edit.agent');
                    Route::post('/update/agent', 'UpdateAgent')->name('update.agent');
                    Route::get('/delete/agent/{id}', 'DeleteAgent')->name('delete.agent');
                    Route::get('/changeStatus', 'ChangeStatus');

                    
                });


                 //state type all route
            Route::controller(StateController::class)->group(function(){

                Route::get('/all/state', 'AllState')->name('all.state');
                Route::get('/add/state', 'AddState')->name('add.state');
                Route::post('/store/state', 'StoreState')->name('store.state');
                Route::get('/edit/state/{id}', 'EditState')->name('edit.state');
                Route::post('/update/state', 'UpdateState')->name('update.state');
                Route::get('/delete/state/{id}', 'DeleteState')->name('delete.state');
           
            });

                //testimonials type all route
                Route::controller(TestimonialsController::class)->group(function(){

                Route::get('/all/testimonials', 'AllTestimonials')->name('all.testimonials');
                Route::get('/add/testimonials', 'AddTestimonials')->name('add.testimonials');
                Route::post('/store/testimonials', 'StoreTestimonials')->name('store.testimonials');
                Route::get('/edit/testimonials/{id}', 'EditTestimonials')->name('edit.testimonials');
                Route::post('/update/testimonials', 'UpdateTestimonials')->name('update.testimonials');
                Route::get('/delete/testimonials/{id}', 'DeleteTestimonials')->name('delete.testimonials');
            
            });

              //blog category all route
              Route::controller(BlogController::class)->group(function(){

                Route::get('all/blog/category', 'AllBlogCategory')->name('all.blog.category');
                Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
                Route::get('/blog/category/{id}', 'EditBlogCategory');
                Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
                Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
            });

                  //testimonials type all route
                  Route::controller(BlogController::class)->group(function(){

                    Route::get('/all/post', 'AllPost')->name('all.post');
                    Route::get('/add/post', 'AddPost')->name('add.post');
                    Route::post('/store/post', 'StorePost')->name('store.post');
                    Route::get('/edit/post/{id}', 'EditPost')->name('edit.post');
                    Route::post('/update/post', 'UpdatePost')->name('update.post');
                    Route::get('/delete/post/{id}', 'DeletePost')->name('delete.post');
                
                });























        });//end group admin middleware


        // admin group middleware

    Route::middleware(['auth','role:agent'])->group(function() {

            //Agent all property admin
            Route::controller(AgentPrpertyController::class)->group(function(){

                Route::get('/agent/all/property', 'AgentAllProperty')->name('agent.all.property');
                Route::get('/agent/add/property', 'AgentAddProperty')->name('agent.add.property');
                Route::post('/agent/store/property', 'AgentStoreProperty')->name('agent.store.property');
                Route::get('/agent/edit/property/{id}', 'AgentEditProperty')->name('agent.edit.property');
                Route::post('/agent/update/property', 'AgentUpdateProperty')->name('agent.update.property');
                Route::post('/agent/update/property/thumbnail', 'AgentUpdatePropertyThumbnail')->name('agent.update.property.thumbnail');
                Route::post('/agent/update/property/multiimage', 'AgentUpdatePropertyMultiimage')->name('agent.update.property.multiimage');
                Route::get('/agent/property/multiimage/delete/{id}', 'AgentPropertyMultiimageDelete')->name('agent.property.multiimage.delete');
                Route::post('/agent/store/new/multiimage', 'AgentStoreNewMultiimage')->name('agent.store.new.multiimage');
                Route::post('/agent/update/property/facilities', 'AgentUpdatePropertyFacilities')->name('agent.update.property.facilities');
                Route::get('/agent/details/property/{id}', 'AgentDetailsProperty')->name('agent.details.property');
                Route::get('/agent/delete/property/{id}', 'AgentDeleteProperty')->name('agent.delete.property');
                Route::get('/agent/property/message', 'AgentPropertyMessage')->name('agent.property.message');
                Route::get('agent/message/details/{id}', 'AgentMessageDetails')->name('agent.message.details');



                
            });

            // Agent Buy Package Route from admin

            Route::controller(AgentPrpertyController::class)->group(function(){
                Route::get('/buy/package', 'BuyPackage')->name('buy.package');
                Route::get('/buy/business/plan', 'BuyBusinessPlan')->name('buy.business.plan');
                Route::post('/store/business/plan', 'StoreBusinessPlan')->name('store.business.plan');
                Route::get('/buy/professional/plan', 'BuyProfessionalPlan')->name('buy.professional.plan');
                Route::post('/store/professional/plan', 'StoreProfessionalPlan')->name('store.professional.plan');
                Route::get('/package/history', 'PackageHistory')->name('package.history');
                Route::get('/agent/package/invoice/{id}', 'AgentPackageInvoice')->name('agent.package.invoice');

                
            });
            
        });//end group agent middleware


            //frontend property details all route

            Route::get('/property/details/{id}/{slug}' , [IndexController::class, 'PropertyDetails']);

            // Wishlist add route

            Route::post('/add-to-wishList/{property_id}' , [WishlishController::class, 'addToWishList']);

            // compare add Route

            Route::post('/add-to-compare/{property_id}' , [CompareController::class, 'addToCompare']);

        // Send message

        Route::post('/property/message' , [IndexController::class, 'PropertyMessage'])->name('property.message');

        // Agent details page in frontend
        Route::get('/agent/details/{id}' , [IndexController::class, 'AgentDetails'])->name('agent.details');


     // Send message form agent details page

     Route::post('/agent/details/message' , [IndexController::class, 'AgentDetailsMessage'])->name('agent.details.message');

        //Get all rent property

        Route::get('/rent/property' , [IndexController::class, 'RentProperty'])->name('rent.property');

        //Get all buy property

        Route::get('/buy/property' , [IndexController::class, 'BuyProperty'])->name('buy.property');

        //get property type data
        Route::get('/property/type/{id}' , [IndexController::class, 'PropertyType'])->name('property.type');


        
        //get property details data
        Route::get('/state/details/{id}' , [IndexController::class, 'StateDetails'])->name('state.details');


        // Home page buy search section
        Route::post('/buy/property/search' , [IndexController::class, 'BuyPropertySearch'])->name('buy.property.search');

         // Home page rent search section
        Route::post('/rent/property/search' , [IndexController::class, 'RentPropertySearch'])->name('rent.property.search');

         //  all rent search section
         Route::post('/all/property/search' , [IndexController::class, 'AllPropertySearch'])->name('all.property.search');

        //  blog details route
        Route::get('/blog/details/{slug}' , [BlogController::class, 'BlogDetails']);
        Route::get('/blog/cat/list/{id}' , [BlogController::class, 'BlogCatList']);
        Route::get('/blog/list' , [BlogController::class, 'BlogList'])->name('blog.list');
