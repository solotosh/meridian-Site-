<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\LogoSettingController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutCustomerController;
use App\Http\Controllers\AboutCounterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\TopbarController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutLandSurveyController;
use App\Http\Controllers\SurveyServiceController;
use App\Http\Controllers\ChooseUsReasonController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\HeaderSettingController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\FaqMessageController;
use App\Http\Controllers\FunfactController;
use App\Http\Controllers\CallbackRequestController;
use App\Http\Controllers\SeoController;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('about', [HomeController::class, 'aboutPage'])->name('about.us');

Route::get('project/', [HomeController::class, 'project'])->name('project.home');
Route::get('projects/{id}', [HomeController::class, 'projectDetail'])->name('project.detail');

Route::get('technology', [HomeController::class, 'technology'])->name('technology.home');
Route::get('/technology/{id}', [HomeController::class, 'showTechnology'])->name('technology.show');
Route::get('blog', [HomeController::class, 'blog'])->name('blog.home');
Route::get('/projects', [ProjectController::class, 'index']);

Route::get('details/blog/{slug}', [HomeController::class, 'bshow'])->name('blog.show');




Route::get('contact', [HomeController::class, 'contact'])->name('contact.home');
Route::post('contact/store', [HomeController::class, 'store'])->name('contact.store');
Route::get('service', [HomeController::class, 'service'])->name('service.home');
Route::get('/services/{id}', [HomeController::class, 'show'])->name('service.detail');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/header', [HeaderSettingController::class, 'index'])->name('header.index');
    Route::get('/header/{headerSetting}/edit', [HeaderSettingController::class, 'edit'])->name('header.edit');
    Route::put('/header/{headerSetting}', [HeaderSettingController::class, 'update'])->name('header.update');
});


Route::post('/quotation-request', [App\Http\Controllers\QuotationController::class, 'store'])->name('quotation.store');

require __DIR__.'/auth.php';

// Route::middleware(['auth', 'user'])->group(function () {
//     Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
// });

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/profile/admin', [AdminController::class, 'AdminProfile'])->name('adminprofile');
    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    Route::get('/menu/add', [MenuController::class, 'AllMenu'])->name('allmenu');
    Route::get('/menu/create', [MenuController::class, 'Create'])->name('menucreate');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('storemenu');
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('editmenu');
    Route::post('/menu/update/{id}', [MenuController::class, 'update'])->name('updatemenu');
    Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menudestroy');

    Route::get('/admin/quotations', [QuotationController::class, 'index'])->name('allrequest');
    Route::get('/admin/quotations/export-excel', [App\Http\Controllers\QuotationController::class, 'exportExcel'])->name('admin.quotations.excel');
    Route::get('/admin/quotations/export-pdf', [App\Http\Controllers\QuotationController::class, 'exportPdf'])->name('admin.quotations.pdf');
    
    Route::get('/admin/logo', [LogoSettingController::class, 'index'])->name('setlogo');
    Route::get('/admin/create/logo', [LogoSettingController::class, 'create'])->name('logocreate');
    Route::post('/admin/store/logo', [LogoSettingController::class, 'store'])->name('logostore');

    Route::get('/admin/slider', [CarouselController::class, 'index'])->name('allslider');
    Route::get('/add/slider', [CarouselController::class, 'create'])->name('addslider');
    Route::post('/store/slider', [CarouselController::class, 'store'])->name('carouselstore');
    Route::get('/edit/slider/{id}', [CarouselController::class, 'edit'])->name('editslider');
    Route::post('/carousel/{id}', [CarouselController::class, 'update'])->name('carouselupdate');
    Route::delete('/carousel/delete/{id}', [CarouselController::class, 'destroy'])->name('deleslider');


    Route::get('/admin/about', [AboutController::class, 'allAbout'])->name('allabout');
    Route::get('/admin/about/add', [AboutController::class, 'addAbout'])->name('addaboutadmin');
    Route::post('/admin/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/admin/about/edit/{id}', [AboutController::class, 'EditAbout'])->name('editadminabout');
    Route::put('/admin/about/update/{about}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/admin/about/delete/{about}', [AboutController::class, 'destroy'])->name('about.destroy');

    Route::get('/admin/about/clients', [AboutCustomerController::class, 'index'])->name('aboutclients');
    Route::get('/admin/add/clients', [AboutCustomerController::class, 'create'])->name('addclientab');
    Route::post('/store/admin/clients', [AboutCustomerController::class, 'store'])->name('abcilentstore');
    Route::get('/admin/about-customers/edit/{id}', [AboutCustomerController::class, 'edit'])->name('editclientab');
    Route::put('/admin/about-customers/update/{id}', [AboutCustomerController::class, 'update'])->name('updateclientab');
    Route::delete('/admin/about-customers/delete/{id}', [AboutCustomerController::class, 'destroy'])->name('deleteclientab');

    Route::get('/all/counters', [AboutCounterController::class, 'index'])->name('allcounts');
    Route::get('/add/counters', [AboutCounterController::class, 'create'])->name('addcounter');
    Route::post('/store/counters', [AboutCounterController::class, 'store'])->name('storecounter');
    Route::get('/edit/counters/{id}', [AboutCounterController::class, 'edit'])->name('editroute');
    Route::put('/admin/about-counters/update/{id}', [AboutCounterController::class, 'update'])->name('updatecounter');


    Route::get('/admin/services/all', [ServiceController::class, 'index'])->name('allservices');
    Route::get('/admin/services/add', [ServiceController::class, 'create'])->name('addservead');
    Route::post('/admin/services/store', [ServiceController::class, 'store'])->name('storeadservice');
    Route::get('/admin/ser/edit/{id}', [ServiceController::class, 'edit'])->name('editadmservice');
    Route::put('/admin/services/up/{service}', [ServiceController::class, 'update'])->name('servicup');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('servicedestroy');


Route::get('/admin/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/admin/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/admin/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::post('/admin/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/admin/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/admin/team', [TeamController::class, 'index'])->name('team.index');
Route::get('/admin/team/create', [TeamController::class, 'create'])->name('team.create');
Route::post('/admin/team', [TeamController::class, 'store'])->name('team.store');
Route::get('/admin/team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
Route::put('/admin/team/{id}', [TeamController::class, 'update'])->name('team.update');
Route::delete('/admin/team/{team}', [TeamController::class, 'destroy'])->name('team.destroy');



Route::get('/admin/footer', [FooterController::class, 'index'])->name('footer.index');
Route::get('/admin/footer/create', [FooterController::class, 'create'])->name('footer.create');
Route::post('/admin/footer', [FooterController::class, 'store'])->name('footer.store');
Route::get('/admin/footer/{id}/edit', [FooterController::class, 'edit'])->name('footer.edit');
Route::put('/admin/footer/{id}', [FooterController::class, 'update'])->name('footer.update');


Route::get('/admin/topbar', [TopbarController::class, 'index'])->name('topbar.index');
Route::get('/admin/topbar/create', [TopbarController::class, 'create'])->name('topbar.create');
Route::post('/admin/topbar', [TopbarController::class, 'store'])->name('topbar.store');
Route::get('/admin/topbar/{id}/edit', [TopbarController::class, 'edit'])->name('topbar.edit');
Route::put('/admin/topbar/{id}', [TopbarController::class, 'update'])->name('topbar.update');


// ABOUT FEATURES ROUTES
Route::get('/admin/about-features', [App\Http\Controllers\AboutFeatureController::class, 'index'])->name('about-features.index');
Route::get('/admin/about-features/create', [App\Http\Controllers\AboutFeatureController::class, 'create'])->name('about-features.create');
Route::post('/admin/about-features', [App\Http\Controllers\AboutFeatureController::class, 'store'])->name('about-features.store');
Route::get('/admin/about-features/{id}/edit', [App\Http\Controllers\AboutFeatureController::class, 'edit'])->name('about-features.edit');
Route::put('/admin/about-features/{id}', [App\Http\Controllers\AboutFeatureController::class, 'update'])->name('about-features.update');
Route::delete('/admin/about-features/{id}', [App\Http\Controllers\AboutFeatureController::class, 'destroy'])->name('about-features.destroy');



    Route::get('/technologies', [TechnologyController::class, 'index'])->name('technologies.index');
    Route::get('/technologies/create', [TechnologyController::class, 'create'])->name('technologies.create');
    Route::post('/technologies', [TechnologyController::class, 'store'])->name('technologies.store');
    Route::get('/technologies/{id}/edit', [TechnologyController::class, 'edit'])->name('technologies.edit');
    Route::put('/technologies/{id}', [TechnologyController::class, 'update'])->name('technologies.update');
    Route::delete('/technologies/{id}', [TechnologyController::class, 'destroy'])->name('technologies.destroy');



    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
  
    
    // Routes for AboutLandSurveyController
    Route::prefix('admin/about/land')->group(function () {
        Route::get('/index', [AboutLandSurveyController::class, 'index'])->name('admin.about.land.index');
        Route::get('/create', [AboutLandSurveyController::class, 'create'])->name('admin.about.land.create');
        Route::post('/store', [AboutLandSurveyController::class, 'store'])->name('admin.about.land.store');
        Route::get('/edit/{id}', [AboutLandSurveyController::class, 'edit'])->name('admin.about.land.edit');
        Route::post('/update/{id}', [AboutLandSurveyController::class, 'update'])->name('admin.about.land.update');
        Route::get('/delete/{id}', [AboutLandSurveyController::class, 'destroy'])->name('admin.about.land.delete');
    });
    
// Routes for SurveyServiceController
Route::prefix('admin/survey/services')->group(function () {
    Route::get('/index', [SurveyServiceController::class, 'index'])->name('admin.survey.services.index');
    Route::get('/create', [SurveyServiceController::class, 'create'])->name('admin.survey.services.create');
    Route::post('/store', [SurveyServiceController::class, 'store'])->name('admin.survey.services.store');
    Route::get('/edit/{id}', [SurveyServiceController::class, 'edit'])->name('admin.survey.services.edit');
    Route::post('/update/{id}', [SurveyServiceController::class, 'update'])->name('admin.survey.services.update');
    Route::get('/delete/{id}', [SurveyServiceController::class, 'destroy'])->name('admin.survey.services.delete');
});


   

    Route::prefix('admin/chooseus')->group(function () {
        Route::get('/index', [ChooseUsReasonController::class, 'index'])->name('admin.chooseus.index');
        Route::get('/create', [ChooseUsReasonController::class, 'create'])->name('admin.chooseus.create');
        Route::post('/store', [ChooseUsReasonController::class, 'store'])->name('admin.chooseus.store');
        Route::get('/edit/{id}', [ChooseUsReasonController::class, 'edit'])->name('admin.chooseus.edit');
        Route::post('/update/{id}', [ChooseUsReasonController::class, 'update'])->name('admin.chooseus.update');
        Route::get('/delete/{id}', [ChooseUsReasonController::class, 'destroy'])->name('admin.chooseus.delete');
    });

 

    Route::prefix('admin/team')->group(function () {
        Route::get('/index', [TeamMemberController::class, 'index'])->name('admin.team.index');
        Route::get('/create', [TeamMemberController::class, 'create'])->name('admin.team.create');
        Route::post('/store', [TeamMemberController::class, 'store'])->name('admin.team.store');
        Route::get('/edit/{id}', [TeamMemberController::class, 'edit'])->name('admin.team.edit');
        Route::post('/update/{id}', [TeamMemberController::class, 'update'])->name('admin.team.update');
        Route::delete('/admin/team/delete/{id}', [TeamMemberController::class, 'destroy'])->name('admin.team.delete');
    });


    Route::prefix('admin')->name('admin.')->group(function () {
    
        // FAQ routes
        Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
        Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
        Route::post('/faqs/store', [FaqController::class, 'store'])->name('faqs.store');
        Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
        Route::post('/faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');
        Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');
    
        // Testimonials routes
        Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
        Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
        Route::post('/testimonials/store', [TestimonialController::class, 'store'])->name('testimonials.store');
        Route::get('/testimonials/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonials.edit');
        Route::post('/testimonials/update/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
        Route::delete('/testimonials/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.delete');
    
    });
    
 

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
    Route::get('/partners/create', [PartnerController::class, 'create'])->name('partners.create');
    Route::post('/partners/store', [PartnerController::class, 'store'])->name('partners.store');
    Route::get('/partners/{partner}/edit', [PartnerController::class, 'edit'])->name('partners.edit');
    Route::put('/partners/{partner}', [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy');
});




Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});


Route::prefix('admin')->name('admin.')->group(function () {
   
    Route::get('/admin/footer', [FooterController::class, 'edit'])->name('footer.edit');

    Route::put('/footer', [FooterController::class, 'update'])->name('footer.update');
    Route::get('/header', [HeaderSettingController::class, 'index'])->name('header.index');

});



Route::get('/admin/comments', [App\Http\Controllers\BlogCommentController::class, 'index'])->name('admin.comments.index');
Route::post('/admin/comments/{id}/approve', [App\Http\Controllers\BlogCommentController::class, 'approve'])->name('admin.comments.approve');
Route::delete('/admin/comments/{id}', [App\Http\Controllers\BlogCommentController::class, 'destroy'])->name('admin.comments.delete');

Route::prefix('admin')->group(function () {
    Route::get('contact', [ContactController::class, 'index'])->name('admin.contact.index');
    Route::post('contact', [ContactController::class, 'update'])->name('admin.contact.update');
});

// Frontend message submission
Route::post('contact/message', [ContactMessageController::class, 'store'])->name('contact.message');

// Backend (admin)
Route::prefix('admin/contact')->group(function () {
    Route::get('messages', [ContactMessageController::class, 'index'])->name('admin.contact.messages');
    Route::get('messages/{id}', [ContactMessageController::class, 'show'])->name('admin.contact.messages.show');
    Route::delete('admin/contact/messages/{id}', [ContactMessageController::class, 'destroy'])->name('admin.contact.messages.destroy');
    Route::get('admin/contact/messages/download/{id}', [ContactMessageController::class, 'download'])->name('admin.contact.messages.download');
    Route::post('admin/contact/messages/{id}/reply', [ContactMessageController::class, 'reply'])->name('admin.contact.messages.reply');

});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/quotes', [QuotationController::class, 'index'])->name('admin.quotes.index');
    Route::get('/quotes/{id}', [QuotationController::class, 'show'])->name('admin.quotes.show');
    Route::delete('/quotes/{id}', [QuotationController::class, 'destroy'])->name('admin.quotes.destroy');
});



Route::get('/admin/faq-messages', [FaqMessageController::class, 'index'])->name('admin.faq.messages');
Route::get('/admin/faq-messages/{id}', [FaqMessageController::class, 'show'])->name('admin.faq.messages.show');
Route::delete('/admin/faq-messages/{id}', [FaqMessageController::class, 'destroy'])->name('admin.faq.messages.delete');

Route::resource('funfacts', FunfactController::class);

Route::get('/admin/callback-requests', [App\Http\Controllers\CallbackRequestController::class, 'index'])->name('callback.index');

});

Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blogs.show');

Route::post('/quote/send', [QuotationController::class, 'store'])->name('quote.send');
Route::post('details/blog/{slug}/comment', [HomeController::class, 'postComment'])->name('blog.comment');
Route::get('blog/category/{category}', [HomeController::class, 'categoryFilter'])->name('blog.category');
Route::get('/faq', [HomeController::class, 'faqPage'])->name('faq.page');
Route::get('/faqs', [App\Http\Controllers\FaqController::class, 'index'])->name('faqs.index');
Route::post('/faq/message', [FaqMessageController::class, 'store'])->name('faq.message.store');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('technologies', TechnologyController::class);
});
Route::post('/callback-request', [CallbackRequestController::class, 'store']);


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/seo', [SeoController::class, 'index'])->name('seo.index');
    Route::get('/seo/create', [SeoController::class, 'create'])->name('seo.create');
    Route::post('/seo', [SeoController::class, 'store'])->name('seo.store');
    Route::get('/seo/{id}/edit', [SeoController::class, 'edit'])->name('seo.edit');
    Route::put('/seo/{id}', [SeoController::class, 'update'])->name('seo.update');
    Route::delete('/seo/{id}', [SeoController::class, 'destroy'])->name('seo.destroy');
});

