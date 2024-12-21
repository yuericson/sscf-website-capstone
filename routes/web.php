<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentication Controllers
use App\Http\Controllers\Auth\UnifiedLoginController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

// NAV CONTROLLER CONTROLLER
use App\Http\Controllers\AcademicResourcesController;
use App\Http\Controllers\AuditorController;
use App\Http\Controllers\LatestNewsController;
use App\Http\Controllers\MediaGalleryController;
use App\Http\Controllers\PressReleasesController;
use App\Http\Controllers\PresidentCornerController;
use App\Http\Controllers\JoinOrganizationController;
use App\Http\Controllers\VolunteerOpportunitiesController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SportsRegistrationController;
use App\Http\Controllers\LocalElectionController;
use App\Http\Controllers\TabulationController;


// USER AND ADMIN PAGE CONTROLLER
use App\Http\Controllers\Auth\AdministratorLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VotersLoginController;

use App\Http\Controllers\UpcomingEventsController;


use App\Http\Controllers\Auth\TabulationAuthController;

use App\Http\Controllers\Auth\TabulatorAuthController;

Route::prefix('tabulator')->name('tabulator.')->group(function () {
    // Login Routes
    Route::get('/login', [TabulatorAuthController::class, 'showLoginForm'])
        ->name('login')
        ->middleware('guest:tabulator');

    Route::post('/login', [TabulatorAuthController::class, 'login'])
        ->name('login.submit')
        ->middleware('guest:tabulator');

        Route::post('/logout', [AdministratorLoginController::class, 'logout'])
        ->name('logout');


        
});



Route::prefix('tabulator')->name('tabulator.')->middleware('auth:tabulator')->group(function () {
    Route::get('/dashboard', function () {
        return view('tabulator.dashboard'); // Ensure this view exists
    })->name('dashboard');
});







Route::prefix('tabulations')->name('tabulations.')->group(function () {
    
    Route::get('/login', [AdministratorLoginController::class, 'showLoginForm'])
        ->name('login')
        ->middleware('guest');


    Route::post('/login', [AdministratorLoginController::class, 'login'])
        ->name('login.submit')
        ->middleware('guest');

  
    Route::post('/logout', [AdministratorLoginController::class, 'logout'])
        ->name('logout');

    Route::middleware(['auth:tabulation'])->group(function () {
        Route::view('/dashboard', 'Tabulation_Dashboard.dashboard')->name('dashboard'); 
        Route::view('/register-judge', 'Tabulation_Dashboard.register-judge')->name('register-judge');
        Route::view('/event-title', 'Tabulation_Dashboard.event-title')->name('event-title');
        Route::view('/criteria', 'Tabulation_Dashboard.criteria')->name('criteria');
        Route::view('/participants', 'Tabulation_Dashboard.participants')->name('participants');
        Route::view('/category', 'Tabulation_Dashboard.category')->name('category');
        Route::view('/final-results', 'Tabulation_Dashboard.final-results')->name('final-results');
    });
});





// Admin-Protected Routes for Upcoming Events
Route::get('/dashboard/upcoming-events', [UpcomingEventsController::class, 'index'])->name('dashboard.upcoming-events.index');
Route::post('/dashboard/upcoming-events/add', [UpcomingEventsController::class, 'store'])->name('dashboard.upcoming-events.add');
Route::get('/dashboard/upcoming-events/edit/{id}', [UpcomingEventsController::class, 'edit'])->name('dashboard.upcoming-events.edit');
Route::put('/dashboard/upcoming-events/update/{id}', [UpcomingEventsController::class, 'update'])->name('dashboard.upcoming-events.update');
Route::delete('/dashboard/upcoming-events/delete/{id}', [UpcomingEventsController::class, 'destroy'])->name('dashboard.upcoming-events.delete');

// Public Route for Fetching Latest Event Images (Optional)
Route::get('/upcoming-events/latest-images', [UpcomingEventsController::class, 'getLatestImages'])->name('upcoming-events.latest-images');


// routes/web.php




// Auditor Dashboard
Route::get('/dashboard', [AuditorController::class, 'dashboardIndex'])->name('dashboard');

// Transactions Management
Route::post('/transactions/store', [AuditorController::class, 'storeTransaction'])->name('transactions.store');
Route::put('/transactions/update/{id}', [AuditorController::class, 'updateTransaction'])->name('transactions.update');
Route::delete('/transactions/destroy/{id}', [AuditorController::class, 'destroyTransaction'])->name('transactions.destroy');

// Totals Management
Route::post('/totals/store', [AuditorController::class, 'storeTotal'])->name('totals.store');
Route::put('/totals/update/{id}', [AuditorController::class, 'updateTotal'])->name('totals.update');
Route::delete('/totals/destroy/{id}', [AuditorController::class, 'destroyTotal'])->name('totals.destroy');

// Beginning Balances Management
Route::post('/beginning-balances/store', [AuditorController::class, 'storeBeginningBalance'])->name('beginning-balances.store');
Route::put('/beginning-balances/update/{id}', [AuditorController::class, 'updateBeginningBalance'])->name('beginning-balances.update');
Route::delete('/beginning-balances/destroy/{id}', [AuditorController::class, 'destroyBeginningBalance'])->name('beginning-balances.destroy');

// **Bagong Routes para sa Index Pages**
Route::get('/beginning-balances', [AuditorController::class, 'indexBeginningBalances'])->name('beginning-balances.index');
Route::get('/totals', [AuditorController::class, 'indexTotals'])->name('totals.index');




// Public Routes for Viewing Academic Resources
Route::get('/academic-resources', [AcademicResourcesController::class, 'index'])
    ->name('academic-resources.index');

// Admin-Protected Routes for Managing Academic Resources

    Route::post('/academic-resources', [AcademicResourcesController::class, 'store']);
    Route::put('/academic-resources/{academicResource}', [AcademicResourcesController::class, 'update']);
    Route::delete('/academic-resources/{academicResource}', [AcademicResourcesController::class, 'destroy']);









// Public Routes
Route::get('/', [TabulationController::class, 'index'])->name('home');

// Authentication Routes
Route::prefix('tabulation')->group(function () {
    Route::get('/login', [TabulationController::class, 'showLoginForm'])->name('tabulation-login');
    Route::post('/login', [TabulationController::class, 'login'])->name('tabulation-login.submit');
    Route::post('/logout', [TabulationController::class, 'logout'])->name('judgelogout');

    // Protected Routes (You can re-add middleware as needed)
    Route::get('/form', [TabulationController::class, 'form'])->name('tabulationform');
    Route::post('/scores/submit', [TabulationController::class, 'submitScores'])->name('submitScores');

    Route::get('/dashboard', [TabulationController::class, 'dashboard'])->name('tabulationdashboard');

    // Judge Management
    Route::post('/judge/add', [TabulationController::class, 'addJudge'])->name('tabulation-judge-add');
    Route::put('/judge/edit/{id}', [TabulationController::class, 'editJudge'])->name('tabulation-judge-edit');
    Route::delete('/judge/delete/{id}', [TabulationController::class, 'deleteJudge'])->name('tabulation-judge-delete');

    // Pageant Management
    Route::post('/pageant/add', [TabulationController::class, 'addPageant'])->name('pageant-add');
    Route::put('/pageant/edit/{id}', [TabulationController::class, 'editPageant'])->name('pageant-edit');
    Route::delete('/pageant/delete/{id}', [TabulationController::class, 'deletePageant'])->name('pageant-delete');

    // Criteria Management
    Route::post('/criteria/add/{pageant_id}', [TabulationController::class, 'addCriteria'])->name('criteria-add');
    Route::put('/criteria/edit/{id}', [TabulationController::class, 'editCriteria'])->name('criteria-edit');
    Route::delete('/criteria/delete/{id}', [TabulationController::class, 'deleteCriteria'])->name('criteria-delete');

    // Participant Management
    Route::post('/participants/add/{pageant_id}', [TabulationController::class, 'addParticipant'])->name('participant-add');
    Route::put('/participants/edit/{id}', [TabulationController::class, 'editParticipant'])->name('participant-edit');
    Route::delete('/participants/delete/{id}', [TabulationController::class, 'deleteParticipant'])->name('participant-delete');

    // Final Results
    Route::get('/final-results/{pageant_id}', [TabulationController::class, 'finalResults'])->name('final-results');
    Route::get('/user-final-results/{pageant_id}', [TabulationController::class, 'userFinalResults'])->name('user-final-results');

    // API Endpoint for Tabulation Form
    Route::get('/pageant/{id}/details', [TabulationController::class, 'getPageantDetails']);

    Route::post('/submit-scores', [TabulationController::class, 'submitScores'])->name('submit-scores');

    
// routes/web.php
//Route::post('/tabulation/finish', [TabulationController::class, 'finishTabulation'])->name('tabulation.finish');

    // Judge Assignment Routes
    Route::post('/judge/{judge}/assign', [TabulationController::class, 'assignJudgeToPageant'])->name('judge.assign');
    Route::delete('/judge/{judge}/pageant/{pageant}', [TabulationController::class, 'removeJudgeFromPageant'])->name('judge.removePageant');

    // Category Management Routes
Route::post('/category/add', [TabulationController::class, 'addCategory'])->name('tabulation-category-add');
Route::put('/category/edit/{id}', [TabulationController::class, 'editCategory'])->name('tabulation-category-edit');
Route::delete('/category/delete/{id}', [TabulationController::class, 'deleteCategory'])->name('tabulation-category-delete');

// Approve a Pageant
Route::post('/pageants/{pageant}/approve', [TabulationController::class, 'approve'])
    ->name('pageant.approve');

// Deny a Pageant
Route::post('/pageants/{pageant}/deny', [TabulationController::class, 'deny'])
    ->name('pageant.deny');

});





// Public Routes for Press Releases
Route::get('/press-releases', [PressReleasesController::class, 'index'])->name('press-releases.index');

// Admin-Protected Routes for Managing Press Releases

    Route::post('/press-releases', [PressReleasesController::class, 'store'])->name('press-releases.store');
    Route::put('/press-releases/{pressRelease}', [PressReleasesController::class, 'update'])->name('press-releases.update');
    Route::delete('/press-releases/{pressRelease}', [PressReleasesController::class, 'destroy'])->name('press-releases.destroy');


// Public Routes for Volunteer Opportunities
Route::get('/volunteer-opportunities', [VolunteerOpportunitiesController::class, 'index'])->name('volunteer-opportunities.index');
Route::get('/volunteer-opportunities-page', [VolunteerOpportunitiesController::class, 'showOpportunities'])->name('volunteer-opportunities.page');

// Admin-Protected Routes for Managing Volunteer Opportunities

    Route::post('/volunteer-opportunities', [VolunteerOpportunitiesController::class, 'store']);
    Route::put('/volunteer-opportunities/{opportunity}', [VolunteerOpportunitiesController::class, 'update']);
    Route::delete('/volunteer-opportunities/{opportunity}', [VolunteerOpportunitiesController::class, 'destroy']);





// Public Routes for Latest News
Route::get('/', [LatestNewsController::class, 'homepage'])->name('home');
Route::get('/latest-news-page', [LatestNewsController::class, 'latestNewsPage'])->name('latest-news.page');
Route::get('/latest-news/{latestNews}', [LatestNewsController::class, 'show'])->name('news.detail');

// Admin-Protected Routes for Managing Latest News

    // Dashboard Route
    Route::get('/dashboard/latest-news', [LatestNewsController::class, 'index'])->name('latest-news.dashboard');

    // CRUD Routes
    Route::post('/latest-news', [LatestNewsController::class, 'store'])->name('latest-news.store');
    Route::put('/latest-news/{latestNews}', [LatestNewsController::class, 'update'])->name('latest-news.update');
    Route::delete('/latest-news/{latestNews}', [LatestNewsController::class, 'destroy'])->name('latest-news.destroy');








// Public Routes for Forum
Route::middleware(['auth'])->group(function () {
    // Forum Homepage
    Route::get('/', [ForumController::class, 'index'])->name('index');

    // Display Forum Posts
    Route::get('/posts', [ForumController::class, 'showPosts'])->name('posts');

    // Submit a New Post
    Route::post('/submit-post', [ForumController::class, 'submitPost'])->name('submitPost');

    // React to a Post (Like/Unlike)
    Route::post('/react/{postId}', [ForumController::class, 'react'])->name('react');

    // Add a Comment to a Post
    Route::post('/comment/{postId}', [ForumController::class, 'addComment'])->name('addComment');

    // Delete a Comment
    Route::delete('/comment/delete/{commentId}', [ForumController::class, 'deleteComment'])->name('deleteComment');
});

// Admin-Protected Routes for Forum Management

    // Admin Dashboard
    Route::get('/dashboard', [ForumController::class, 'adminDashboard'])->name('dashboard');

    // Approve a Post
    Route::put('/post/approve/{postId}', [ForumController::class, 'approvePost'])->name('approvePost');

    // Deny a Post
    Route::put('/post/deny/{postId}', [ForumController::class, 'denyPost'])->name('denyPost');

    // Delete a Post
    Route::delete('/post/delete/{postId}', [ForumController::class, 'deletePost'])->name('deletePost');










// Album Routes
// Route::get('/media-gallery/albums/create', [MediaGalleryController::class, 'createAlbum'])->name('media.gallery.albums.create');
// Route::post('/media-gallery/albums/store', [MediaGalleryController::class, 'storeAlbum'])->name('media.gallery.albums.store');
// Route::delete('/media-gallery/albums/{album}', [MediaGalleryController::class, 'destroyAlbum'])->name('media.gallery.albums.destroy');

// Admin-Protected Routes for Media Gallery

    // Media Gallery Dashboard
    Route::get('/news-media/media-gallery', [MediaGalleryController::class, 'dashboard'])->name('media.gallery.dashboard');

    // Media Gallery Resource Routes
    Route::prefix('dashboard/media-gallery')->name('media.gallery.')->group(function () {
        // Image Routes
        Route::post('/images/store', [MediaGalleryController::class, 'storeImage'])->name('images.store');
        Route::put('/images/{image}', [MediaGalleryController::class, 'updateImage'])->name('images.update');
        Route::delete('/images/{image}', [MediaGalleryController::class, 'destroyImage'])->name('images.destroy');

        // Album Routes
        Route::get('/albums', [MediaGalleryController::class, 'albumsIndex'])->name('albums.index');
        Route::post('/albums/store', [MediaGalleryController::class, 'albumsStore'])->name('albums.store');
        Route::put('/albums/{album}', [MediaGalleryController::class, 'albumsUpdate'])->name('albums.update');
        Route::delete('/albums/{album}', [MediaGalleryController::class, 'albumsDestroy'])->name('albums.destroy');

        // Video Routes
        Route::post('/videos/store', [MediaGalleryController::class, 'videosStore'])->name('videos.store');
        Route::put('/videos/{video}', [MediaGalleryController::class, 'videosUpdate'])->name('videos.update');
        Route::delete('/videos/{video}', [MediaGalleryController::class, 'videosDestroy'])->name('videos.destroy');
    });



// Video Routes
// Route::get('/media-gallery/videos/create', [MediaGalleryController::class, 'createVideo'])->name('media.gallery.videos.create');
// Route::post('/media-gallery/videos/store', [MediaGalleryController::class, 'storeVideo'])->name('media.gallery.videos.store');
// Route::delete('/media-gallery/videos/{video}', [MediaGalleryController::class, 'destroyVideo'])->name('media.gallery.videos.destroy');








// Public Feedback Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/submit-feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});

// Admin-Protected Feedback Routes

    Route::get('/feedback-db', [FeedbackController::class, 'dashboard'])->name('feedback-db');
    Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');








// Route to show the dashboard
Route::get('/dashboard', [VotersLoginController::class, 'showDashboard'])->name('dashboard');

// Route to update graph selections
Route::post('/dashboard/graph-selections', [VotersLoginController::class, 'updateGraphSelections'])->name('dashboard.updateGraphSelections');



// Route::post('/dashboard/update-graph-settings', [VotersLoginController::class, 'updateGraphSettings'])->name('election.updateGraphSettings');


// Route to show the public election page
Route::get('/election', [VotersLoginController::class, 'showElection'])->name('election.show');







Route::get('/sports', [SportsRegistrationController::class, 'showSportsList'])->name('sports.list');
Route::get('/sports/{sport}', [SportsRegistrationController::class, 'showRegistrationsBySport'])->name('registrations.by.sport');



// Publicly Accessible Routes
Route::post('/election/resetTimes', [VotersLoginController::class, 'resetTimes'])->name('election.resetTimes');

// Update Election Times
Route::post('/election/updateTimes', [VotersLoginController::class, 'updateElectionTimes'])->name('election.updateTimes');

    Route::get('/login', [VotersLoginController::class, 'loginPage'])->name('login.page');
    Route::post('/login', [VotersLoginController::class, 'login'])->name('voters.login');
    Route::get('/election-form', function () {
        return view('local-election-form');
    })->name('election.form');


Route::view('/local-election', 'local-election');
    //Route::get('/local-election', [VotersLoginController::class, 'localElectionPage'])->name('local-election');
    Route::get('/votes', [VotersLoginController::class, 'viewVotes'])->name('votes.index');
    Route::post('/votes', [VotersLoginController::class, 'storeVote'])->name('votes.store');
    Route::delete('/votes/{id}', [VotersLoginController::class, 'deleteVote'])->name('votes.delete');


// Admin-Protected Routes

    // Dashboard and Management Routes
    Route::get('/dashboard', [VotersLoginController::class, 'index'])->name('dashboard');
    Route::post('/voters', [VotersLoginController::class, 'store'])->name('voters.store');
    Route::post('/voters/bulk-upload', [VotersLoginController::class, 'bulkUpload'])->name('voters.bulkUpload');
    Route::delete('/voters/{id}', [VotersLoginController::class, 'destroy'])->name('voters.destroy');
    Route::put('/voters/{id}', [VotersLoginController::class, 'update'])->name('voters.update');
    Route::get('/voters/download-template', [VotersLoginController::class, 'downloadTemplate'])->name('voters.downloadTemplate');
    Route::get('/election/voting-form', [VotersLoginController::class, 'getVotingForm'])->name('election.form');

    // Position Management Routes
    Route::post('/positions', [VotersLoginController::class, 'storePosition'])->name('positions.store');
    Route::put('/positions/{id}', [VotersLoginController::class, 'updatePosition'])->name('positions.update');
    Route::delete('/positions/{id}', [VotersLoginController::class, 'destroyPosition'])->name('positions.destroy');

    // Candidate Management Routes
    Route::post('/candidates', [VotersLoginController::class, 'storeCandidate'])->name('candidates.store');
    Route::put('/candidates/{id}', [VotersLoginController::class, 'updateCandidate'])->name('candidates.update');
    Route::delete('/candidates/{id}', [VotersLoginController::class, 'destroyCandidate'])->name('candidates.destroy');

    // Election Dashboard Routes
    Route::get('/local-election-db', [VotersLoginController::class, 'showDashboard'])->name('local.election.db');

    // Election Section Management
    Route::post('/sections', [VotersLoginController::class, 'addSection'])->name('sections.add');
    Route::put('/sections/{id}', [VotersLoginController::class, 'editSection'])->name('sections.edit');
    Route::delete('/sections/{id}', [VotersLoginController::class, 'deleteSection'])->name('sections.destroy');

    // Election Subtitles Management
    Route::post('/sections/{section_id}/subtitles', [VotersLoginController::class, 'addSubtitle'])->name('subtitles.add');
    Route::put('/subtitles/{id}', [VotersLoginController::class, 'editSubtitle'])->name('subtitles.edit');
    Route::delete('/subtitles/{id}', [VotersLoginController::class, 'deleteSubtitle'])->name('subtitles.destroy');

    // Election Images Management
    Route::post('/subtitles/{subtitle_id}/electionimages', [VotersLoginController::class, 'uploadElectionImage'])->name('electionimages.upload');
    Route::put('/electionimages/{id}', [VotersLoginController::class, 'updateElectionImage'])->name('electionimages.update');
    Route::delete('/electionimages/{id}', [VotersLoginController::class, 'deleteElectionImage'])->name('electionimages.destroy');




// Route to handle printing all voters
Route::get('/voters/print', [VotersLoginController::class, 'printAll'])->name('voters.printAll');











// Routes for public and authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/sports-form', [SportsRegistrationController::class, 'showForm'])->name('sports.form');
    Route::post('/submit-sports-registration', [SportsRegistrationController::class, 'submitRegistration'])->name('submit.sports.registration');
    Route::get('/check-registration', [SportsRegistrationController::class, 'checkRegistration'])->name('check.registration');
});

// Admin-protected routes

    Route::get('/dashboard', [SportsRegistrationController::class, 'dashboard'])->name('dashboard');
    Route::post('/edit-registration/{id}', [SportsRegistrationController::class, 'edit'])->name('edit.registration');
    Route::delete('/delete-registration/{id}', [SportsRegistrationController::class, 'delete'])->name('delete.registration');

    Route::get('/get-registration-data/{id}', [SportsRegistrationController::class, 'getRegistrationData'])->name('get.registration.data');

    // Bulk Upload and Template Download Routes
    Route::post('/bulk-upload', [SportsRegistrationController::class, 'bulkUpload'])->name('bulk.upload');
    Route::get('/registrations/download-template', [SportsRegistrationController::class, 'downloadTemplate'])->name('registrations.downloadTemplate');

    Route::post('/add-registration', [SportsRegistrationController::class, 'addRegistration'])->name('add.registration');

    // Print Campus-Specific Registrations
    Route::get('/print/{campus}', [SportsRegistrationController::class, 'printByCampus'])->name('print.by.campus');











// Admin-Protected Routes for President Corner

    // View President Corner Dashboard
    Route::get('/dashboard/president-corner', [PresidentCornerController::class, 'index'])->name('dashboard.president-corner.index');

    // Add a new post
    Route::post('/dashboard/president-corner/add', [PresidentCornerController::class, 'store'])->name('dashboard.president-corner.add');

    // Edit a post
    Route::get('/dashboard/president-corner/edit/{id}', [PresidentCornerController::class, 'edit'])->name('dashboard.president-corner.edit');

    // Update a post
    Route::put('/dashboard/president-corner/update/{id}', [PresidentCornerController::class, 'update'])->name('dashboard.president-corner.update');

    // Delete a post
    Route::delete('/dashboard/president-corner/delete/{id}', [PresidentCornerController::class, 'destroy'])->name('dashboard.president-corner.delete');


// Public Route for Fetching Latest Images (Optional)
Route::get('/presidents-message/latest-images', [PresidentCornerController::class, 'getLatestImages'])->name('presidents-message.latest-images');











// USER CONTROLLER AND ROUTES
Route::get('/login', [UnifiedLoginController::class, 'showLoginForm'])->name('login');

// Profile route after user logging google account
Route::get('/profile', [UserController::class, 'profile'])->name('profile');

// Fetch user information (only for authenticated users)
Route::middleware('auth')->get('/api/user', [UserController::class, 'getUserInfo']);

// Google login routes
Route::get('/login/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('/login/google/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();
    } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
        return redirect()->route('login.google')->with('error', 'Google login failed.');
    }

    // Create or update user in the database
    $user = User::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'avatar' => $googleUser->getAvatar(),
            'password' => bcrypt('defaultpassword'), // Placeholder password
        ]
    );

    // Log the user in
    Auth::login($user);

    // Redirect to main page
    return redirect()->route('index');
});

// Unified Logout Route for Users page
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('index');
})->name('logout');








// ADMINISTRATOR CONTROLLER AND ROUTES

 Route::prefix('admin')->name('admin.')->group(function () {
    // Login Routes
    Route::get('/login', [AdministratorLoginController::class, 'showLoginForm'])
        ->name('login')
        ->middleware('guest:administrator');

    Route::post('/login', [AdministratorLoginController::class, 'login'])
        ->name('login.submit')
        ->middleware('guest:administrator');

    Route::post('/logout', [AdministratorLoginController::class, 'logout'])
        ->name('logout');

    // Protected Routes
    Route::group(['middleware' => ['auth:administrator']], function () {
        Route::view('dashboard', 'Dashboard.dashboard')->name('dashboard');

        // Academic Resources Routes
        Route::resource('academic-resources-db', AcademicResourcesController::class)->except(['show']);

        Route::resource('auditor-db', AcademicResourcesController::class)->except(['show']);

        // Latest News Routes
        Route::resource('latest-news-db', LatestNewsController::class)->except(['show']);

        // Media Gallery Routes
        Route::resource('media-gallery-db', MediaGalleryController::class)->except(['show']);

        // Press Releases Routes
        Route::resource('press-releases-db', PressReleasesController::class)->except(['show']);

        // President's Corner Routes
     // President's Corner Routes
        Route::resource('president-corner-db', PressReleasesController::class)->except(['show']);
    
    
        Route::resource('upcoming-events-db', UpcomingEventsController::class)->except(['show']);

        // Volunteer Opportunities Routes
        Route::resource('volunteer-opportunities-db', VolunteerOpportunitiesController::class)->except(['show']);

        // Forum Routes
        Route::resource('forum-db', ForumController::class)->except(['show']);

        // Feedback Routes
        Route::resource('feedback-db', FeedbackController::class)->except(['show']);

        // Sports Registration Routes
        Route::resource('sports-registration-db', SportsRegistrationController::class)->except(['show']);

    });
});





//  ROUTE


Route::get('/dashboard', function () {
    return view('Dashboard.dashboard');
})->middleware('auth:administrator')->name('dashboard');

Route::get('/auditor-db', function () {
    return view('Dashboard.auditor-db');
})->middleware('auth:administrator')->name('auditor-db');

Route::get('/academic-resources-db', function () {
    return view('Dashboard.academic-resources-db');
})->middleware('auth:administrator')->name('academic-resources-db');

Route::get('/latest-news-db', function () {
    return view('Dashboard.latest-news-db');
})->middleware('auth:administrator')->name('latest-news-db');

Route::get('/media-gallery-db', function () {
    return view('Dashboard.media-gallery-db');
})->middleware('auth:administrator')->name('media-gallery-db');

Route::get('/press-releases-db', function () {
    return view('Dashboard.press-releases-db');
})->middleware('auth:administrator')->name('press-releases-db');

Route::get('/president-corner-db', function () {
    return view('Dashboard.president-corner-db');
})->middleware('auth:administrator')->name('president-corner-db');

Route::get('/upcoming-events-db', function () {
    return view('Dashboard.upcoming-events-db');
})->middleware('auth:administrator')->name('upcoming-events-db');

Route::get('/join-an-organization-db', function () {
    return view('Dashboard.join-an-organization-db');
})->middleware('auth:administrator')->name('join-an-organization-db');

Route::get('/volunteer-opportunities-db', function () {
    return view('Dashboard.volunteer-opportunities-db');
})->middleware('auth:administrator')->name('volunteer-opportunities-db');

Route::get('/forum-db', function () {
    return view('Dashboard.forum-db');
})->middleware('auth:administrator')->name('forum-db');

Route::get('/feedback-db', function () {
    return view('Dashboard.feedback-db');
})->middleware('auth:administrator')->name('feedback-db');

Route::get('/sports-registration-db', function () {
    return view('Dashboard.sports-registration-db');
})->middleware('auth:administrator')->name('sports-registration-db');






Route::prefix('comelec')->name('comelec.')->group(function () {
    // Login Routes
    Route::get('/login', [AdministratorLoginController::class, 'showLoginForm'])
        ->name('login')
        ->middleware('guest:comelec');

    Route::post('/login', [AdministratorLoginController::class, 'login'])
        ->name('login.submit')
        ->middleware('guest:comelec');

    Route::post('/logout', [AdministratorLoginController::class, 'logout'])
        ->name('logout');

     // Protected Routes for COMELEC users
     Route::middleware(['auth:comelec'])->group(function () {
        // COMELEC Dashboard
        Route::view('/dashboard', 'Comelec_Dashboard.dashboard')->name('dashboard');

        // Election Time
        Route::view('/election-time', 'Comelec_Dashboard.election-time')->name('election-time');

        // Registered Voters
        Route::view('/election-voters', 'Comelec_Dashboard.election-voters')->name('election-voters');

        // Votes
        Route::view('/election-votes', 'Comelec_Dashboard.election-votes')->name('election-votes');

        // Election Positions
        Route::view('/election-positions', 'Comelec_Dashboard.election-positions')->name('election-positions');

        // Election Candidates
        Route::view('/election-candidates', 'Comelec_Dashboard.election-candidates')->name('election-candidates');

        // Election Campaign Image
        Route::view('/election-profile', 'Comelec_Dashboard.election-profile')->name('election-profile');
    });
});















// Home Page Route
Route::get('/', function () {
    return view('index');  // Adjust the view name as needed
})->name('index');


Route::prefix('about-us')->group(function () {
Route::get('/history', function () {
    return view('history');  // Adjust the view name as needed
})->name('history');

// Home Page Route
Route::get('/mission-vision', function () {
    return view('mission-vision');  // Adjust the view name as needed
})->name('mission.vision');


Route::get('leadership', function () {
    return view('leadership'); // Adjust the view name as needed
})->name('leadership');

Route::get('committees', function () {
    return view('committees'); // Adjust the view name as needed
})->name('committees');
});

// Resources Routes
Route::prefix('resources')->group(function () {
    Route::get('/student-guide', function () {
        return view('student-guide'); // Adjust the view name as needed
    })->name('student.guide');

    Route::get('academic-resources', function () {
        return view('academic-resources'); // Adjust the view name as needed
    })->name('academic.resources');

    Route::get('career-support', function () {
        return view('career-support'); // Adjust the view name as needed
    })->name('career.support');

    Route::get('wellbeing-support', function () {
        return view('wellbeing-support'); // Adjust the view name as needed
    })->name('wellbeing.support');
});

// News & Media Routes
Route::prefix('news-media')->group(function () {
    Route::get('latest-news', function () {
        return view('latest-news'); // Adjust the view name as needed
    })->name('latest.news');

    Route::get('newsletter', function () {
        return view('newsletter'); // Adjust the view name as needed
    })->name('newsletter');

    Route::get('media-gallery', function () {
        return view('media-gallery'); // Adjust the view name as needed
    })->name('media.gallery');

    Route::get('press-releases', function () {
        return view('press-releases'); // Adjust the view name as needed
    })->name('press.releases');

    Route::get('presidents-corner', function () {
        return view('presidents-corner'); // Adjust the view name as needed
    })->name('presidents.corner');
});

// Get Involved Routes
Route::prefix('get-involved')->group(function () {

    Route::get('explore-organization', function () {
        return view('explore-organization'); // Adjust the view name as needed
    })->name('explore.organization');

    Route::get('volunteer-opportunities', function () {
        return view('volunteer-opportunities'); // Adjust the view name as needed
    })->name('volunteer.opportunities');

    Route::get('forum', function () {
        return view('forum'); // Adjust the view name as needed
    })->name('forum');

    Route::get('feedback', function () {
        return view('feedback'); // Adjust the view name as needed
    })->name('feedback');



    // SPORTS PAGE ROUTE
    Route::get('sports-registration', function () {
        return view('sports-registration');
    })->name('sports.registration');

    Route::get('sports-form', function () {
        return view('sports-form');
    })->name('sports-form');




    // Home Page Route
    Route::get('/local-election', function () {
        return view('local-election');  // Adjust the view name as needed
    })->name('local.election');

    Route::get('/voters-login', function () {
        return view('voters-login');
    })->name('voters-login');







    // Home Page Route
    Route::get('/local-election-form', function () {
        return view('local-election-form');  // Adjust the view name as needed
    })->name('local.election.form');




    Route::get('tabulation', function () {
        return view('tabulation'); // Adjust the view name as needed
    })->name('tabulation');

});

// Contact Us Route
Route::get('contact-us', function () {
    return view('contact-us'); // Adjust the view name as needed
})->name('contact.us');
























