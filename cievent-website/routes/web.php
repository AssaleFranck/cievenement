
<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChronoCntroller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\PostController;

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
// ==============LES ROUTES POUR LES PAGES================//
Route::get('/', [PagesController::class, 'index'])->name('pages.index');

//  Nos routes pour les events
// Route::get('/events', [PagesController::class, 'events'])->name('pages.events');

//  Nos routes blog
Route::get('/blog/details/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
// To edit single blog post
Route::get('dashboard/blogPosts/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');

// To update single blog post
Route::put('dashboard/blogPosts/blog/{post}', [BlogController::class, 'update'])->name('blog.update');

// To delete single blog post
Route::delete('dashboard/blog/posts/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');

// To create blog post
Route::get('dashboard/blogPosts/create', [BlogController::class, 'create'])->name('blog.create');

// To store blog post to the DB
Route::post('dashboard/blogPosts', [BlogController::class, 'store'])->name('blog.store');

//  Nos categories
Route::resource('admin/categories', CategoryController::class);

Route::post('admin/blogPosts/blog/comments/{post}', [CommentController::class, 'store'])->name('comment.store');



Route::get('admin/blogPosts/blog/comments/{id}', [CommentController::class, 'getCommentById']);
//   Fin Nos Blogs


// Nos contacts
Route::get('/contact', [PagesController::class, 'contact'])->name('pages.contact');
Route::post('/contact', [PagesController::class, 'contactValidate'])->name('contact.post');

// Nos Services
Route::get('/services', [PagesController::class, 'services'])->name('pages.contact');


Route::get('/erros444', function () {
    return view('pages.erros444');
});

Route::get('/ci-login', function () {
    return view('pages.login');
});



// ============FIN ROUTES POUR LES PAGES===================//

Route::get('/dashboard/home',[DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();


// ----------------------------------- CATEGORIE -----------------------------------

// Route::resource('dashboard/blog/categories', CategoryController::class);

// Afficher les catégories
Route::get('/dashboard/blog/categories',[CategoryController::class, 'index'])->name('categories.index');

// // Créer une catégories
Route::post('/dashboard/blog/categories',[CategoryController::class, 'store'])->name('categories.store');

// // Modifier une catégories
Route::get('/dashboard/blog/categories/edit/{id}',[CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/dashboard/blog/categories/edit/{id}',[CategoryController::class, 'update'])->name('categories.update');

// // Supprimer une catégories
Route::get('/dashboard/blog/categories/delete/{id}',[CategoryController::class, 'destroy'])->name('categories.destroy');

// ----------------------------------------------------------------------------------





// -------------------------------------- POST -------------------------------------

// Afficher les posts dashboard
Route::get('dashboard/blog/posts', [PostController::class, 'index'])->name('post.index');

// Créer un post
Route::get('dashboard/blog/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('dashboard/blog/posts/create', [PostController::class, 'store'])->name('post.store');

// Supprimer un post
Route::get('dashboard/blog/posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');

// Modifier un post
Route::get('dashboard/blog/posts/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('dashboard/blog/posts/edit/{id}', [PostController::class, 'update'])->name('post.update');

// ----------------------------------------------------------------------------------








// -------------------------------------- COMMANTAIRE -------------------------------


Route::post('admin/blogPosts/blog/comments/{post}', [CommentController::class, 'store'])->name('comment.store');

// Route::get('dashboard/blogPosts/comments', [CommentController::class, 'index'])->name('comment.index');

Route::get('dashboard/blogPosts/comments/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');

Route::delete('dashboard/blogPosts/blog/comments/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::put('dashboard/blogPosts/blog/comments/{id}', [CommentController::class, 'update'])->name('comment.update');

Route::get('admin/blogPosts/blog/comments/{id}', [CommentController::class, 'getCommentById']);

// Afficher les commentaires dans le dashboard
Route::get('/dashboard/blog/commentaires', [CommentController::class, 'index'])->name('comment.index');
Route::post('/dashboard/blog/commentaires', [CommentController::class, 'crud'])->name('test.post');





// ----------------------------------------------------------------------------------







// -------------------------------------- EVENT -------------------------------------

//afficher les Events dans le dashboard
Route::get('/dashboard/events',[EventController::class, 'index'])->name('event.index');

//ajouter les Events
Route::get('/dashboard/events/create',[EventController::class, 'create'])->name('event.create');
Route::post('/dashboard/events/create',[EventController::class, 'store'])->name('event.store');

//Modifier les Events
Route::get('/dashboard/events/edit/{id}',[EventController::class, 'edit'])->name('event.edit');
Route::post('/dashboard/events/edit/{id}', [EventController::class, 'update'])->name('event.update');

//supprimer les Events
Route::get('/dashboard/events/{id}',[EventController::class, 'destroy'])->name('event.destroy');

//statut des events
Route::get('/dashboard/events/state/{id}',[EventController::class, 'state'])->name('event.state');

//details des events
Route::get('/dashboard/events/details/{id}',[EventController::class, 'show'])->name('event.show');

//contact mail
Route::get('/dashboard/events/details/contact/{id}',[RegistedController::class, 'contact'])->name('register.contact');
Route::post('/dashboard/events/details/contact',[RegistedController::class, 'send'])->name('register.mail_send');



// Page Acceuil des events 
Route::get('/events',[RegistedController::class, 'index'])->name('pages.events');


//Afficher les details des evenement
Route::get('/events/details/{id}', [EventController::class, 'events_details'])->name('event.details');

//S'inscrire
Route::get('/events/inscription/{id}',[RegistedController::class, 'create'])->name('register.create');
Route::post('/events/inscription',[RegistedController::class, 'store'])->name('register.store');

// Chrono
Route::post('/dashboard/events', [ChronoCntroller::class, 'update'])->name('chrono.update');

// ----------------------------------------------------------------------------------




// ------------------------------------- INVITE -------------------------------------

//Afficher les invité d'un event
Route::get('/dashboard/events/invites/{id}', [InviteController::class, 'show'])->name('invite.show');

//Ajouter un invité
Route::post('/dashboard/events/invites', [InviteController::class, 'store'])->name('invite.store');

// Mofifier un invité
Route::get('/dashboard/events/invites/edit/{id}', [InviteController::class, 'edit'])->name('invite.edit');
Route::post('/dashboard/events/invites/edit/{id}', [InviteController::class, 'update'])->name('invite.update');

// Supprimer un invité
Route::get('/dashboard/events/invites/delete/{id}', [InviteController::class, 'destroy'])->name('invite.destroy');

// ----------------------------------------------------------------------------------





// -------------------------------------- Users -------------------------------------

//afficher les users
Route::get('/dashboard/users',[DashboardController::class, 'users'])->name('users.index');

//ajouter un users
Route::get('/dashboard/users/create',[DashboardController::class, 'create'])->name('users.create');
Route::post('/dashboard/users/create',[DashboardController::class, 'store'])->name('users.store');

//n'est pas utiliser
Route::get('/dashboard/users/show/{id}',[DashboardController::class, 'show'])->name('users.show');

//Modifier un users
Route::get('/dashboard/users/edit/{id}',[DashboardController::class, 'edit'])->name('users.edit');
Route::patch('/dashboard/users/edit/{id}',[DashboardController::class, 'update'])->name('users.update');

//Supprimer un users
Route::delete('/dashboard/users/{id}',[DashboardController::class, 'destroy'])->name('users.destroy');

// ------------------------------------------------------------------------------------
