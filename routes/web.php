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







Route::get('/login', [VotersLoginController::class, 'loginPage'])->name('login.page');
Route::post('/login', [VotersLoginController::class, 'login'])->name('voters.login');
Route::get('/election-form', function () {
    return view('local-election-form');
})->name('election.form');


Route::get('/dashboard', [VotersLoginController::class, 'index'])->name('dashboard');
Route::post('/voters', [VotersLoginController::class, 'store'])->name('voters.store');
Route::put('/voters/{id}', [VotersLoginController::class, 'update'])->name('voters.update');
Route::delete('/voters/{id}', [VotersLoginController::class, 'destroy'])->name('voters.destroy');











Route::post('/submit-feedback', [FeedbackController::class, 'store'])->name('feedback.store');




// SPORTS REGISTRATION USER PAGE SUBMIT ROUTE
Route::get('/sports-form', [SportsRegistrationController::class, 'showForm'])->name('sports.form');
Route::post('/submit-sports-registration', [SportsRegistrationController::class, 'submitRegistration'])->name('submit.sports.registration');
Route::get('/check-registration', [SportsRegistrationController::class, 'checkRegistration'])->name('check.registration');


Route::get('/dashboard', [SportsRegistrationController::class, 'dashboard'])->name('dashboard');
Route::post('/edit-registration/{id}', [SportsRegistrationController::class, 'edit'])->name('edit.registration');
Route::post('/delete-registration/{id}', [SportsRegistrationController::class, 'delete'])->name('delete.registration');
Route::get('/get-registration-data/{id}', [SportsRegistrationController::class, 'getRegistrationData'])->name('get.registration.data');











// President Corner Dashboard
Route::get('/dashboard/president-corner', [PresidentCornerController::class, 'index'])->name('dashboard.president-corner.index');

// Add a new post
Route::post('/dashboard/president-corner/add', [PresidentCornerController::class, 'store'])->name('dashboard.president-corner.add');

// Edit a post
Route::get('/dashboard/president-corner/edit/{id}', [PresidentCornerController::class, 'edit'])->name('dashboard.president-corner.edit');

// Update a post
Route::put('/dashboard/president-corner/update/{id}', [PresidentCornerController::class, 'update'])->name('dashboard.president-corner.update');

// Delete a post
Route::delete('/dashboard/president-corner/delete/{id}', [PresidentCornerController::class, 'destroy'])->name('dashboard.president-corner.delete');

// Route to fetch latest images for the carousel (optional, for AJAX)
Route::get('/presidents-message/latest-images', [PresidentCornerController::class, 'getLatestImages'])->name('presidents-message.latest-images');
// End President Corner Dashboard











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
    Route::group(['middleware' => ['auth:administrator', 'check.admin']], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Academic Resources Routes
        Route::resource('academic-resources-db', AcademicResourcesController::class)->except(['academic-resources-db']);

        // Latest News Routes
        Route::resource('latest-news-db', LatestNewsController::class)->except(['show']);

        // Media Gallery Routes
        Route::resource('media-gallery-db', MediaGalleryController::class)->except(['show']);

        // Press Releases Routes
        Route::resource('press-releases-db', PressReleasesController::class)->except(['show']);

        // President's Corner Routes
   
    
        

        // Volunteer Opportunities Routes
        Route::resource('volunteer-opportunities-db', VolunteerOpportunitiesController::class)->except(['show']);

        // Forum Routes
        Route::resource('forum-db', ForumController::class)->except(['show']);

        // Feedback Routes
        Route::resource('feedback-db', FeedbackController::class)->except(['show']);

        // Sports Registration Routes
        Route::resource('sports-registration-db', SportsRegistrationController::class)->except(['show']);

        // Local Election Routes
        Route::resource('local-election-db', LocalElectionController::class)->except(['show']);

        // Tabulation Routes
        Route::resource('tabulation-db', TabulationController::class)->except(['show']);
    });
});





//  ROUTE


Route::get('dashboard', function () {
    return view('Dashboard.dashboard');
})->name('dashboard');

Route::get('/academic-resources-db', function () {
    return view('Dashboard.academic-resources-db');
})->name('academic-resources-db');

Route::get('/latest-news-db', function () {
    return view('Dashboard.latest-news-db');
})->name('latest-news-db');

Route::get('/media-gallery-db', function () {
    return view('Dashboard.media-gallery-db');
})->name('media-gallery-db');

Route::get('/press-releases-db', function () {
    return view('Dashboard.press-releases-db');
})->name('press-releases-db');

Route::get('/president-corner-db', function () {
    return view('Dashboard.president-corner-db');
})->name('president-corner-db');

Route::get('/join-an-organization-db', function () {
    return view('Dashboard.join-an-organization-db');
})->name('join-an-organization-db');

Route::get('/volunteer-opportunities-db', function () {
    return view('Dashboard.volunteer-opportunities-db');
})->name('volunteer-opportunities-db');

Route::get('/forum-db', function () {
    return view('Dashboard.forum-db');
})->name('forum-db');

Route::get('/feedback-db', function () {
    return view('Dashboard.feedback-db');
})->name('feedback-db');

Route::get('/sports-registration-db', function () {
    return view('Dashboard.sports-registration-db');
})->name('sports-registration-db');

Route::get('/local-election-db', function () {
    return view('Dashboard.local-election-db');
})->name('local-election-db');

Route::get('/tabulation-db', function () {
    return view('Dashboard.tabulation-db');
})->name('tabulation-db');









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
    return view('about.leadership'); // Adjust the view name as needed
})->name('leadership');

Route::get('committees', function () {
    return view('about.committees'); // Adjust the view name as needed
})->name('committees');
});

// Resources Routes
Route::prefix('resources')->group(function () {
    Route::get('student-guide', function () {
        return view('resources.studentGuide'); // Adjust the view name as needed
    })->name('student.guide');

    Route::get('academic-resources', function () {
        return view('resources.academicResources'); // Adjust the view name as needed
    })->name('academic.resources');

    Route::get('career-support', function () {
        return view('resources.careerSupport'); // Adjust the view name as needed
    })->name('career.support');

    Route::get('wellbeing-support', function () {
        return view('resources.wellbeingSupport'); // Adjust the view name as needed
    })->name('wellbeing.support');
});

// News & Media Routes
Route::prefix('news-media')->group(function () {
    Route::get('latest-news', function () {
        return view('news.latestNews'); // Adjust the view name as needed
    })->name('latest.news');

    Route::get('newsletter', function () {
        return view('news.newsletter'); // Adjust the view name as needed
    })->name('newsletter');

    Route::get('media-gallery', function () {
        return view('news.mediaGallery'); // Adjust the view name as needed
    })->name('media.gallery');

    Route::get('press-releases', function () {
        return view('news.pressReleases'); // Adjust the view name as needed
    })->name('press.releases');

    Route::get('presidents-corner', function () {
        return view('news.presidentsCorner'); // Adjust the view name as needed
    })->name('presidents.corner');
});

// Get Involved Routes
Route::prefix('get-involved')->group(function () {

    Route::get('explore-organization', function () {
        return view('explore-organization'); // Adjust the view name as needed
    })->name('explore.organization');

    Route::get('volunteer-opportunities', function () {
        return view('involvement.volunteerOpportunities'); // Adjust the view name as needed
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
        return view('involvement.tabulation'); // Adjust the view name as needed
    })->name('tabulation');

    Route::get('calendar-activities', function () {
        return view('involvement.calendarActivities'); // Adjust the view name as needed
    })->name('calendar.activities');
});

// Contact Us Route
Route::get('contact-us', function () {
    return view('contact-us'); // Adjust the view name as needed
})->name('contact.us');






























