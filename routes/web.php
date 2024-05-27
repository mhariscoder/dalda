<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use \Illuminate\Support\Facades\Artisan;
use \Illuminate\Support\Facades\File;
use \App\Http\Controllers\Website\HomeController;


Route::get('/config-clear', function () {
    Artisan::call('config:clear');
    dd("config clear done");
});

Route::get('/optimize-clear', function () {
    Artisan::call('optimize:clear');
    dd("optimize clear done");
});

Route::get('/storage-link', function () {
    if (!is_dir(public_path('storage'))) {
        File::link(storage_path('app/public'), public_path('storage'));
    }
    dd("storage link done");
});

Route::get('/detail', function () {
    return view('student-detail');
});

Route::get('/test-event', function () {
    return view('admit-card');
});

Route::namespace('Website')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/about', 'AboutController@index')->name('about');
    Route::get('/education', 'EducationController@index')->name('education');
    Route::post('/counselling/customer-query', 'EducationController@customerQuery')->name('counselling.customer-query');
    Route::get('/health', 'HealthController@index')->name('health');
    Route::get('/agriculture', 'AgricultureController@index')->name('agriculture');
    // Route::get('/donate', 'DonateUsController@index')->name('donate');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::post('/contact/inquiry', 'InquiryController@storeInquiry')->name('contact.inquiry');
    Route::post('/contact/inquiry/modal', 'InquiryController@storeInquiryModal')->name('contact.inquiry.modal');
    Route::post('/contact/inquiry/alliance', 'InquiryController@storeInquiryAlliance')->name('contact.inquiry.alliance');
    // Route::get('/media/gallery', 'MediaController@gallery')->name('gallery');
    // Route::get('/blog/posts', 'BlogController@index')->name('blog.post');
    // Route::get('/blog/posts/{slug}/detail', 'BlogController@postDetail')->name('blog.post.detail');
    // Route::get('/news', 'NewsController@index')->name('news');
    // Route::get('/news/{id}/detail', 'NewsController@newsDetail')->name('news.detail');
    // Route::get('/faq', 'FaqController@index')->name('faq');
    // Route::get('/hall-of-fame', 'HallOfFameController@index')->name('hall-of-fame');
    // Route::get('/volunteers', 'VolunteerController@index')->name('volunteers');

    Route::get('/process-to-apply','ProcessToApplyController@index')->name('process-to-apply');
    Route::get('/screening-criteria','ScreeningCriteriaController@index')->name('screening-criteria');
    Route::get('/achievers-profile/{achieverId}','AchieverProfileController@index')->name('achievers-profile');

    Route::get('/high-potentials','HomeController@highPotentials')->name('high-potentials');
    Route::get('/high-potentials-profile/{highPotentialId}','HomeController@highPotentials')->middleware('trust')->name('high-potentials-profile');
    Route::get('/high-achievers','EducationController@highAchievers')->name('high-achievers');
    Route::get('/story','StoryController@index')->name('story');


});

Route::get('/admin', function () {
    return redirect('/login');
});

Route::get('/student', function () {
    return redirect('/login');
});


Route::namespace('Cms')->prefix('admin')->group(function () {
    Route::middleware('UnAuthentic')->group(function () {
        Route::get('/login', 'AuthenticationController@index');
        Route::post('/login', 'AuthenticationController@loginData');
        Route::get('/user-verification/{verificationToken}', 'AuthenticationController@userVerification');
        Route::post('/user-verification/{verificationToken}', 'AuthenticationController@userVerificationData');
        Route::get('/forgot-password', 'AuthenticationController@forgotPassword');
        Route::post('/forgot-password', 'AuthenticationController@forgotPasswordData');
    });

    Route::middleware(['AuthenticAdmin', 'not_student'])->group(function () {
        Route::get('/dashboard', 'HomeController@index');
        Route::get('/logout', 'AuthenticationController@logout');
        Route::get('/manage-profile', 'ProfileController@index');
        Route::post('/manage-profile', 'ProfileController@updateProfile');
        Route::get('/notifications', 'NotificationController@index');
        Route::get('/delete-notification/{notificationId}', 'NotificationController@deleteNotification');
        Route::get('/notification-detail/{notificationId}', 'NotificationController@detailNotification');

        Route::get('/manage-users', 'UserManagementController@index');
        Route::get('/add-user', 'UserManagementController@addUser');
        Route::post('/add-user', 'UserManagementController@addUserData');
        Route::get('/update-user/{userId}', 'UserManagementController@updateUser');
        Route::put('/update-user/{userId}', 'UserManagementController@updateUserData');
        Route::get('/user-detail/{userId}', 'UserManagementController@getUserDetail');
        Route::get('/block-user/{userId}', 'UserManagementController@blockUser');
        Route::get('/resend-verification-email/{verificationToken}', 'UserManagementController@resendVerificationEmail');
        Route::get('/users/export', 'UserManagementController@exportUsers');


        Route::get('/manage-roles', 'RoleController@index');
        Route::get('/add-role', 'RoleController@addRole');
        Route::post('/add-role', 'RoleController@addRoleData');
        Route::get('/update-role/{roleId}', 'RoleController@updateRole');
        Route::put('/update-role/{roleId}', 'RoleController@updateRoleData');
        Route::get('/delete-role/{roleId}', 'RoleController@deleteRole');

        Route::namespace('Announcement')->group(function () {
            Route::get('/test-dates', 'TestDateController@index');
            Route::get('/test-dates/add', 'TestDateController@addTestDate');
            Route::post('/test-dates/add', 'TestDateController@addTestDateData');


            Route::get('/test-dates/{testDateId}/update', 'TestDateController@updateTest');
            Route::post('/test-dates/{testDateId}/update', 'TestDateController@updateTestDate');


            Route::get('/test-dates/{testDateId}/delete', 'TestDateController@deleteTestDate');

            Route::get('/student-result', 'TestResultController@index');
            Route::get('/add-student-result', 'TestResultController@addTestResult');
            Route::post('/add-student-result', 'TestResultController@addTestResultData');
            Route::get('/update-student-result/{testResultId}', 'TestResultController@updateTestResult');
            Route::put('/update-student-result/{testResultId}', 'TestResultController@updateTestResultData');
            Route::get('/delete-student-result/{testResultId}', 'TestResultController@deleteTestResult');
        });

        Route::namespace('Student')->group(function () {
            Route::get('/upload-documents', 'UploadDocumentController@index');
            Route::get('/add-upload-document', 'UploadDocumentController@addDocument');
            Route::post('/add-upload-document', 'UploadDocumentController@addDocumentData');
            Route::get('/update-upload-document/{documentId}', 'UploadDocumentController@updateDocument');
            Route::post('/update-upload-document/{documentId}', 'UploadDocumentController@updateDocumentData');
            Route::get('/delete-document/{documentId}', 'UploadDocumentController@deleteDocument');

            Route::get('/apply-for-scoloarships', 'ApplyScholarShipController@index');
            Route::get('/add-apply-for-scoloarship', 'ApplyScholarShipController@addApply');
            Route::post('/add-apply-for-scoloarship', 'ApplyScholarShipController@addApplyData');
            Route::get('/update-apply-for-scoloarship/{applyId}', 'ApplyScholarShipController@updateApply');
            Route::post('/update-apply-for-scoloarship/{applyId}', 'ApplyScholarShipController@updateApplyData');
            Route::get('/apply-for-scoloarship-detail/{applyId}', 'ApplyScholarShipController@detailApply');
            Route::get('/apply-scholarship-change-status/{applyId}/{status}', 'ApplyScholarShipController@changeStatus');
            Route::get('/admit-card/{applyId}', 'ApplyScholarShipController@generateAdmitCard');
            Route::get('/apply-for-scoloarships/pdf/{applyId}', 'ApplyScholarShipController@generatePdf');
            Route::post('/import-apply-for-scholarship', 'ApplyScholarShipController@import');

            Route::get('/claim-for-scoloarships', 'ClaimScholarShipController@index');
            Route::get('/add-claim-for-scoloarship', 'ClaimScholarShipController@addClaim');
            Route::post('/add-claim-for-scoloarship', 'ClaimScholarShipController@addClaimData');
            Route::get('/update-claim-for-scoloarship/{claimId}', 'ClaimScholarShipController@updateClaim');
            Route::post('/update-claim-for-scoloarship/{claimId}', 'ClaimScholarShipController@updateClaimData');
            Route::get('/claim-for-scoloarship-detail/{claimId}', 'ClaimScholarShipController@detailClaim');
            Route::get('/claim-scholarship-change-status/{claimId}/{status}', 'ClaimScholarShipController@changeStatus');
            Route::get('/claim-for-scoloarships/pdf/{claimId}', 'ClaimScholarShipController@generatePdf');
            Route::post('/import-claim-for-scholarship', 'ClaimScholarShipController@import');

            Route::get('/course-offering', 'CourseOfferingController@index');
            Route::get('/add-course-offering', 'CourseOfferingController@addForm');
            Route::post('/add-course-offering', 'CourseOfferingController@addFormData');
            Route::get('/update-course-offering/{courseId}', 'CourseOfferingController@updateForm');
            Route::post('/update-course-offering/{courseId}', 'CourseOfferingController@updateFormData');
            Route::get('/delete-course-offering/{courseId}', 'CourseOfferingController@deleteForm');

            Route::get('/eligibility-criteria', 'EligibilityCriteriaController@index');
            Route::get('/add-eligibility-criteria', 'EligibilityCriteriaController@addForm');
            Route::post('/add-eligibility-criteria', 'EligibilityCriteriaController@addFormData');
            Route::get('/update-eligibility-criteria/{eligibilityId}', 'EligibilityCriteriaController@updateForm');
            Route::post('/update-eligibility-criteria/{eligibilityId}', 'EligibilityCriteriaController@updateFormData');
            Route::get('/delete-eligibility-criteria/{eligibilityId}', 'EligibilityCriteriaController@deleteForm');

            Route::get('/exam', 'ExamController@index');
            Route::get('/add-exam', 'ExamController@addForm');
            Route::post('/add-exam', 'ExamController@addFormData');
            Route::get('/update-exam/{examId}', 'ExamController@updateForm');
            Route::post('/update-exam/{examId}', 'ExamController@updateFormData');
            Route::get('/delete-exam/{examId}', 'TestScheduleController@deleteForm');

            Route::get('/test-schedule', 'TestScheduleController@index');
            Route::get('/add-test-schedule', 'TestScheduleController@addForm');
            Route::post('/add-test-schedule', 'TestScheduleController@addFormData');
            Route::get('/update-test-schedule/{testId}', 'TestScheduleController@updateForm');
            Route::post('/update-test-schedule/{testId}', 'TestScheduleController@updateFormData');
            Route::get('/delete-test-schedule/{testId}', 'TestScheduleController@deleteForm');

            Route::get('/students/applied-scholarships/export', 'ExportController@applyForScholarship');
            Route::get('/students/claimed-scholarships/export', 'ExportController@claimForScholarship');
            Route::post('/close-claims', 'ClaimScholarShipController@closeClaims')->name('close-claims');
            Route::post('/appeared-in-test', 'SettingController@appearedInTestCreate')->name('appeared-in-test');
        });

        Route::namespace('Website')->group(function () {
            Route::resource('high-potential-student', 'HighPotentialStudentController');
            Route::resource('achievers-student', 'HighAchieversStudentController');

            Route::prefix('pages')->group(function () {

                Route::resource('screening-criteria', 'CMSScreeningCriteriaController');
                Route::resource('process-to-apply', 'CMSProcessToApplyController');

                Route::get('/home', 'CMSHomeController@index');
                Route::get('/add-home', 'CMSHomeController@addHome');
                Route::post('/add-home', 'CMSHomeController@addHomeData');
                Route::get('/home-update/{cmsHomeId}', 'CMSHomeController@updateHome');
                Route::post('/home-update/{cmsHomeId}', 'CMSHomeController@updateHomeData');
                Route::get('/delete-home/{cmsHomeId}', 'CMSHomeController@deleteHome');


                Route::get('/heroes-list/{home}', 'HomeHeroController@index');
                Route::get('/add-heroes-list/{home}', 'HomeHeroController@create');
                Route::post('/add-heroes-list/{home}/add', 'HomeHeroController@store');
                Route::get('/heroes-update/{heroId}', 'HomeHeroController@edit');
                Route::post('/heroes-update/{heroId}', 'HomeHeroController@update');
                Route::get('/delete-heroes-list/{heroId}', 'HomeHeroController@destroy');



                Route::prefix('education')->group(function () {
                    Route::resource('university-icons', 'CMSUniversityIconsController');
                    Route::get('/education-list', 'CMSEducationController@index');
                    Route::get('/add-education-list', 'CMSEducationController@addList');
                    Route::post('/add-education-list', 'CMSEducationController@addListData');
                    Route::get('/main-update/{educationId}', 'CMSEducationController@updateList');
                    Route::put('/main-update/{educationId}', 'CMSEducationController@updateListData');
                    Route::get('/delete-education-list/{educationId}', 'CMSEducationController@deleteList');

                    Route::get('/education-box-list/{education}', 'CMSEducationBoxesController@index')->name('education-box.index');
                    Route::get('/add-education-box-list/{education}', 'CMSEducationBoxesController@create');
                    Route::post('/add-education-box-list/{education}/add', 'CMSEducationBoxesController@store');
                    Route::get('/box-data-update/{box}', 'CMSEducationBoxesController@edit');
                    Route::put('/box-data-update/{box}', 'CMSEducationBoxesController@update');
                    Route::get('/delete-education-box-list/{boxId}', 'CMSEducationBoxesController@destroy');


                    Route::get('/services-list/{education}', 'CMSEducationServicesController@index');
                    Route::get('/add-services-list/{education}', 'CMSEducationServicesController@create');
                    Route::post('/add-services-list/{education}/add', 'CMSEducationServicesController@store');
                    Route::get('/services-update/{serviceId}', 'CMSEducationServicesController@edit');
                    Route::post('/services-update/{serviceId}', 'CMSEducationServicesController@update');
                    Route::get('/delete-services-list/{servicesId}', 'CMSEducationServicesController@destroy');

                    Route::get('/directory', 'CMSEducationDirectoryController@index');
                    Route::post('/directory/upload', 'CMSEducationDirectoryController@upload');

                    Route::resource('counselling', 'CMSEducationCounsellingController')->names('counselling');
                    
                    Route::get('/counselling-category/create', 'CMSEducationCounsellingController@_create')->name('counselling-category.create');
                    Route::get('/counselling-category/{id}/edit', 'CMSEducationCounsellingController@_edit')->name('counselling-category.edit');
                    Route::post('/counselling-category', 'CMSEducationCounsellingController@_store')->name('counselling_category.store');
                    Route::put('/counselling-category/{id}', 'CMSEducationCounsellingController@_update')->name('counselling-category.update');
                    Route::delete('/counselling-category/{id}', 'CMSEducationCounsellingController@_destroy')->name('counselling.category.destroy');
                });

                Route::prefix('health')->group(function () {

                    Route::get('/main-update/{healthId}', 'CMSHealthController@updateList');
                    Route::post('/main-update/{healthId}', 'CMSHealthController@updateListData');

                    Route::get('/hospitals-list/{health}', 'CMSHealthHospitalController@index');
                    Route::get('/add-hospitals-list/{health}', 'CMSHealthHospitalController@create');
                    Route::post('/add-hospitals-list/{health}/add', 'CMSHealthHospitalController@store');
                    Route::get('/hospitals-update/{hospitalId}', 'CMSHealthHospitalController@edit');
                    Route::post('/hospitals-update/{hospitalId}', 'CMSHealthHospitalController@update');
                    Route::get('/delete-hospitals-list/{hospitalId}', 'CMSHealthHospitalController@destroy');
                });



                Route::resource('university-icons', 'CMSUniversityIconsController');
                Route::resource('story', 'CMSStoryController');

                Route::get('/about', 'CMSAboutController@index');
                Route::get('/add-about', 'CMSAboutController@addAbout');
                Route::post('/add-about', 'CMSAboutController@addAboutData');
                Route::get('/about-update/{cmsAboutId}', 'CMSAboutController@updateAbout');
                Route::post('/about-update/{cmsAboutId}', 'CMSAboutController@updateAboutData');
                Route::get('/delete-about/{cmsAboutId}', 'CMSAboutController@deleteAbout');

                Route::get('/contact', 'CMSContactController@index');
                Route::get('/add-contact', 'CMSContactController@addContact');
                Route::post('/add-contact', 'CMSContactController@addContactData');
                Route::get('/update-contact/{cmsContactId}', 'CMSContactController@updateContact');
                Route::post('/update-contact/{cmsContactId}', 'CMSContactController@updateContactData');
                Route::get('/delete-contact/{cmsContactId}', 'CMSContactController@deleteContact');

                Route::get('/success-story', 'CMSSuccessStoryController@index');
                Route::get('/success-story/add', 'CMSSuccessStoryController@addMediaCenter');
                Route::post('/success-story/add', 'CMSSuccessStoryController@addMediaCenterData');
                Route::get('/success-story/{cmsMediaCenterId}/update', 'CMSSuccessStoryController@updateMediaCenter');
                Route::post('/success-story/{cmsMediaCenterId}/update', 'CMSSuccessStoryController@updateMediaCenterData');
                Route::get('/success-story/{cmsMediaCenterId}/delete', 'CMSSuccessStoryController@deleteMediaCenter');

                Route::get('/interviews', 'CMSInterviewController@index');
                Route::get('/interviews/add', 'CMSInterviewController@addMediaCenter');
                Route::post('/interviews/add', 'CMSInterviewController@addMediaCenterData');
                Route::get('/interviews/{cmsMediaCenterId}/update', 'CMSInterviewController@updateMediaCenter');
                Route::post('/interviews/{cmsMediaCenterId}/update', 'CMSInterviewController@updateMediaCenterData');
                Route::get('/interviews/{cmsMediaCenterId}/delete', 'CMSInterviewController@deleteMediaCenter');

                Route::get('/press-releases', 'CMSPressReleaseController@index');
                Route::get('/press-releases/add', 'CMSPressReleaseController@addMediaCenter');
                Route::post('/press-releases/add', 'CMSPressReleaseController@addMediaCenterData');
                Route::get('/press-releases/{cmsMediaCenterId}/update', 'CMSPressReleaseController@updateMediaCenter');
                Route::post('/press-releases/{cmsMediaCenterId}/update', 'CMSPressReleaseController@updateMediaCenterData');
                Route::get('/press-releases/{cmsMediaCenterId}/delete', 'CMSPressReleaseController@deleteMediaCenter');

                Route::get('/faq', 'CMSFAQController@index');
                Route::get('/faq/add', 'CMSFAQController@addMediaCenter');
                Route::post('/faq/add', 'CMSFAQController@addMediaCenterData');
                Route::get('/faq/{cmsMediaCenterId}/update', 'CMSFAQController@updateMediaCenter');
                Route::post('/faq/{cmsMediaCenterId}/update', 'CMSFAQController@updateMediaCenterData');
                Route::get('/faq/{cmsMediaCenterId}/delete', 'CMSFAQController@deleteMediaCenter');

                Route::get('/agriculture-list', 'CMSAgricultureController@index');
                Route::get('/add-agriculture-list', 'CMSAgricultureController@addList');
                Route::post('/add-agriculture-list', 'CMSAgricultureController@addListData');
                Route::get('/agriculture-list/update/{agricultureId}', 'CMSAgricultureController@updateList');
                Route::post('/agriculture-list/update/{agricultureId}', 'CMSAgricultureController@updateListData');
                Route::get('/delete-agriculture-list/{agricultureId}', 'CMSAgricultureController@deleteList');
            });

            Route::group(['prefix' => 'media-center'], function () {
                Route::get('/news', 'CMSNewsController@index');
                Route::get('/news/add', 'CMSNewsController@addMediaCenter');
                Route::post('/news/add', 'CMSNewsController@addMediaCenterData');
                Route::get('/news/{cmsMediaCenterId}/update', 'CMSNewsController@updateMediaCenter');
                Route::post('/news/{cmsMediaCenterId}/update', 'CMSNewsController@updateMediaCenterData');
                Route::get('/news/{cmsMediaCenterId}/delete', 'CMSNewsController@deleteMediaCenter');

                Route::get('/hall-of-fame', 'CMSHallOfFameController@index');
                Route::get('/hall-of-fame/add', 'CMSHallOfFameController@addMediaCenter');
                Route::post('/hall-of-fame/add', 'CMSHallOfFameController@addMediaCenterData');
                Route::get('/hall-of-fame/{cmsMediaCenterId}/update', 'CMSHallOfFameController@updateMediaCenter');
                Route::post('/hall-of-fame/{cmsMediaCenterId}/update', 'CMSHallOfFameController@updateMediaCenterData');
                Route::get('/hall-of-fame/{cmsMediaCenterId}/delete', 'CMSHallOfFameController@deleteMediaCenter');

                Route::get('/volunteers', 'CMSVolunteerController@index');
                Route::get('/volunteers/add', 'CMSVolunteerController@addMediaCenter');
                Route::post('/volunteers/add', 'CMSVolunteerController@addMediaCenterData');
                Route::get('/volunteers/{cmsMediaCenterId}/update', 'CMSVolunteerController@updateMediaCenter');
                Route::post('/volunteers/{cmsMediaCenterId}/update', 'CMSVolunteerController@updateMediaCenterData');
                Route::get('/volunteers/{cmsMediaCenterId}/delete', 'CMSVolunteerController@deleteMediaCenter');
            });

            Route::namespace('Blog')->prefix('blog')->group(function () {
                Route::get('/posts', 'PostController@index');
                Route::get('/posts/add', 'PostController@addPost');
                Route::post('/posts/add', 'PostController@addPostData');
                Route::get('/posts/{postId}/update', 'PostController@updatePost');
                Route::post('/posts/{postId}/update', 'PostController@updatePostData');
                Route::get('/posts/{postId}/delete', 'PostController@deletePost');
                Route::get('/posts/{postId}/change-active-status', 'PostController@changePostActiveStatus');
                Route::get('/posts/{postId}/change-featured-status', 'PostController@changePostFeaturedStatus');

                Route::get('/tags', 'TagController@index');
                Route::get('/tags/add', 'TagController@addTag');
                Route::post('/tags/add', 'TagController@addTagData');
                Route::get('/tags/{tagId}/update', 'TagController@updateTag');
                Route::put('/tags/{tagId}/update', 'TagController@updateTagData');
                Route::get('/tags/{tagId}/delete', 'TagController@deleteTag');

                Route::get('/categories', 'CategoryController@index');
                Route::get('/categories/add', 'CategoryController@addCategory');
                Route::post('/categories/add', 'CategoryController@addCategoryData');
                Route::get('/categories/{categoryId}/update', 'CategoryController@updateCategory');
                Route::put('/categories/{categoryId}/update', 'CategoryController@updateCategoryData');
                Route::get('/categories/{categoryId}/delete', 'CategoryController@deleteCategory');
            });





            Route::get('/hospital-list', 'CMSHospitalController@index');
            Route::get('/add-hospital-list', 'CMSHospitalController@addList');
            Route::post('/add-hospital-list', 'CMSHospitalController@addListData');
            Route::get('/update-hospital-list/{hospitalId}', 'CMSHospitalController@updateList');
            Route::put('/update-hospital-list/{hospitalId}', 'CMSHospitalController@updateListData');
            Route::get('/delete-hospital-list/{hospitalId}', 'CMSHospitalController@deleteList');

            Route::get('/gallery-image-list', 'CMSGalleryImageController@index');
            Route::get('/add-gallery-image-list', 'CMSGalleryImageController@addImageList');
            Route::post('/add-gallery-image-list', 'CMSGalleryImageController@addImageListData');
            Route::get('/update-gallery-image-list/{galleryImageId}', 'CMSGalleryImageController@updateImageList');
            Route::post('/update-gallery-image-list/{galleryImageId}', 'CMSGalleryImageController@updateImageListData');
            Route::get('/delete-gallery-image-list/{galleryImageId}', 'CMSGalleryImageController@deleteImageList');

            Route::get('/gallery-video-list', 'CMSGalleryVideoController@index');
            Route::get('/add-gallery-video-list', 'CMSGalleryVideoController@addVideoList');
            Route::post('/add-gallery-video-list', 'CMSGalleryVideoController@addVideoListData');
            Route::get('/update-gallery-video-list/{galleryVideoId}', 'CMSGalleryVideoController@updateVideoList');
            Route::post('/update-gallery-video-list/{galleryVideoId}', 'CMSGalleryVideoController@updateVideoListData');
            Route::get('/delete-gallery-video-list/{galleryVideoId}', 'CMSGalleryVideoController@deleteVideoList');
        });

        Route::post('/forms-filter', 'HomeController@formsFilter');
        
    });
});

Route::namespace('FrontEnd')->group(function () {
    Route::middleware('UnAuthentic')->group(function () {
        Route::get('/login', 'AuthenticationController@index');
        Route::post('/login', 'AuthenticationController@loginData');
        Route::get('/confirm-student', 'AuthenticationController@signUpPopUp');
        Route::get('/register', 'AuthenticationController@registerUser');
        Route::post('/register', 'AuthenticationController@registerUserData');
        Route::get('/new-student-verification/{verificationToken}', 'AuthenticationController@userVerification');
        Route::get('/student-password-verification/{verificationToken}', 'AuthenticationController@userPasswordVerification');
        Route::post('/student-password-verification/{verificationToken}', 'AuthenticationController@userPasswordVerificationData');
        Route::get('/forgot-password', 'AuthenticationController@forgotPassword');
        Route::post('/forgot-password', 'AuthenticationController@forgotPasswordData');
    });

    Route::middleware(['AuthenticStudent', 'not_admin'])->prefix('student')->group(function () {
        Route::get('/dashboard', 'HomeController@index');
        Route::get('/logout', 'AuthenticationController@logout');
        Route::get('/manage-profile', 'ProfileController@index');
        Route::post('/manage-profile', 'ProfileController@updateProfile');
        Route::get('/announcements', 'AnnouncementController@index');
        Route::get('/get-more-announcements', 'AnnouncementController@loadMore');
        Route::get('/notifications', 'NotificationController@index');
        Route::get('/delete-notification/{notificationId}', 'NotificationController@deleteNotification');
        Route::get('/notification-detail/{notificationId}', 'NotificationController@detailNotification');

        Route::namespace('Student')->group(function () {
            Route::get('/upload-documents', 'UploadDocumentController@index');
            Route::get('/offered-courses', 'CourseOfferingController@index');
            Route::get('/apply-for-scholarship', 'ApplyScholarShipController@index');
            Route::get('/add-apply-for-scholarship', 'ApplyScholarShipController@addStudentApply')->middleware('check.scholarship.dates');
            Route::post('/add-apply-for-scholarship', 'ApplyScholarShipController@addStudentApplyData')->middleware('check.scholarship.dates');
            Route::get('/update-apply-for-scholarship/{applyId}', 'ApplyScholarShipController@updateApply');
            Route::post('/update-apply-for-scholarship/{applyId}', 'ApplyScholarShipController@updateApplyData');
            Route::get('/apply-for-scholarship-detail/{applyId}', 'ApplyScholarShipController@detailStudentApply');
            Route::get('/admit-card/{applyId}', 'ApplyScholarShipController@generateAdmitCard');
            Route::get('/claim-for-scholarship', 'ClaimScholarShipController@index');
            Route::get('/add-claim-for-scholarship', 'ClaimScholarShipController@addStudentClaim')->middleware('check.scholarship.dates');
            Route::post('/add-claim-for-scholarship', 'ClaimScholarShipController@addStudentClaimData')->middleware('check.scholarship.dates');
            Route::get('/claim-for-scholarship-detail/{claimId}', 'ClaimScholarShipController@detailStudentClaim');
            Route::get('/update-claim-for-scholarship/{claimId}', 'ClaimScholarShipController@updateStudentClaim');
            Route::post('/update-claim-for-scholarship/{claimId}', 'ClaimScholarShipController@updateStudentClaimData');
            Route::get('/course-offering', 'CourseOfferingController@index');
            Route::get('/eligibility-criteria', 'EligibilityCriteriaController@index');
            Route::get('/exam', 'ExamController@index');
            Route::get('/test-schedule', 'TestScheduleController@index');
            Route::get('/result', 'ResultController@index');
        });
    });
});

