<?php

use App\Http\Controllers\ToolController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('login', [AuthController::class, 'auth'])->name('auth');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'store'])->name('register.store');

Route::middleware(['auth'])->group(function () {

    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');

    Route::get('my/projects', [ProjectController::class, 'mine'])->name('projects.mine');
    Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

    Route::get('projects/{project}/slides', [SlideController::class, 'index'])->name('projects.slides.index');
    Route::get('projects/{project}/slides/create', [SlideController::class, 'create'])->name('projects.slides.create');
    Route::post('projects/{project}/slides', [SlideController::class, 'store'])->name('projects.slides.store');
    Route::get('slides/{slide}/edit', [SlideController::class, 'edit'])->name('slides.edit');
    Route::put('slides/{slide}', [SlideController::class, 'update'])->name('slides.update');
    Route::delete('slides/{slide}', [SlideController::class, 'destroy'])->name('slides.destroy');

    Route::get('projects/{project}/images', [ImageController::class, 'index'])->name('projects.images.index');
    Route::get('projects/{project}/images/create', [ImageController::class, 'create'])->name('projects.images.create');
    Route::post('projects/{project}/images', [ImageController::class, 'store'])->name('projects.images.store');
    Route::get('images/{image}/edit', [ImageController::class, 'edit'])->name('images.edit');
    Route::put('images/{image}', [ImageController::class, 'update'])->name('images.update');
    Route::delete('images/{image}', [ImageController::class, 'destroy'])->name('images.destroy');

    Route::get('projects/{project}/links', [LinkController::class, 'index'])->name('projects.links.index');
    Route::get('projects/{project}/links/create', [LinkController::class, 'create'])->name('projects.links.create');
    Route::post('projects/{project}/links', [LinkController::class, 'store'])->name('projects.links.store');
    Route::get('links/{link}/edit', [LinkController::class, 'edit'])->name('links.edit');
    Route::put('links/{link}', [LinkController::class, 'update'])->name('links.update');
    Route::delete('links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');

    Route::get('projects/{project}/materials', [MaterialController::class, 'index'])->name('projects.materials.index');
    Route::get('projects/{project}/materials/create', [MaterialController::class, 'create'])->name('projects.materials.create');
    Route::post('projects/{project}/materials', [MaterialController::class, 'store'])->name('projects.materials.store');
    Route::get('materials/{material}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::put('materials/{material}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('materials/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');

    Route::get('projects/{project}/members', [MemberController::class, 'index'])->name('projects.members.index');
    Route::get('projects/{project}/members/create', [MemberController::class, 'create'])->name('projects.members.create');
    Route::post('projects/{project}/members', [MemberController::class, 'store'])->name('projects.members.store');
    Route::get('members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('members/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

    Route::get('projects/{project}/events', [EventController::class, 'index'])->name('projects.events.index');
    Route::get('projects/{project}/events/create', [EventController::class, 'create'])->name('projects.events.create');
    Route::post('projects/{project}/events', [EventController::class, 'store'])->name('projects.events.store');
    Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::post('projects/{project}/comments', [CommentController::class, 'store'])->name('projects.comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('projects/{project}/tools', [ToolController::class, 'index'])->name('projects.tools.index');
    Route::get('projects/{project}/tools/create', [ToolController::class, 'create'])->name('projects.tools.create');
    Route::post('projects/{project}/tools', [ToolController::class, 'store'])->name('projects.tools.store');
    Route::get('tools/{tool}/edit', [ToolController::class, 'edit'])->name('tools.edit');
    Route::put('tools/{tool}', [ToolController::class, 'update'])->name('tools.update');
    Route::delete('tools/{tool}', [ToolController::class, 'destroy'])->name('tools.destroy');

    Route::get('questionnaires/create', [QuestionnaireController::class, 'create'])->name('questionnaires.create');
    Route::get('questionnaires/{questionnaire}', [QuestionnaireController::class, 'show'])->name('questionnaires.show');
    Route::post('questionnaires', [QuestionnaireController::class, 'store'])->name('questionnaires.store');
    Route::get('questionnaires/{questionnaire}/edit', [QuestionnaireController::class, 'edit'])->name('questionnaires.edit');
    Route::put('questionnaires/{questionnaire}', [QuestionnaireController::class, 'update'])->name('questionnaires.update');

    Route::get('questionnaires/{questionnaire}/questions', [QuestionController::class, 'index'])->name('questionnaires.questions.index');
    Route::get('questionnaires/{questionnaire}/questions/create', [QuestionController::class, 'create'])->name('questionnaires.questions.create');
    Route::get('questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
    Route::post('questionnaires/{questionnaire}/questions', [QuestionController::class, 'store'])->name('questionnaires.questions.store');
    Route::get('questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('questions/{question}', [QuestionController::class, 'update'])->name('questions.update');

    Route::get('questionnaires/{questionnaire}/participants', [AnswerController::class, 'participant'])->name('questionnaires.answers.participant');
    Route::get('questionnaires/{questionnaire}/users/{user}/answers', [AnswerController::class, 'index'])->name('questionnaires.answers.index');
    Route::get('questionnaires/{questionnaire}/answers/create', [AnswerController::class, 'create'])->name('questionnaires.answers.create');
    Route::get('questions/{answer}', [AnswerController::class, 'show'])->name('questions.show');
    Route::post('questionnaires/{questionnaire}/answers', [AnswerController::class, 'store'])->name('questionnaires.answers.store');
    Route::get('questions/{answer}/edit', [AnswerController::class, 'edit'])->name('answers.edit');
    Route::put('questions/{answer}', [AnswerController::class, 'update'])->name('answers.update');

    Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('inquiries/create', [InquiryController::class, 'create'])->name('inquiries.create');
    Route::get('inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
    Route::post('inquiries', [InquiryController::class, 'store'])->name('inquiries.store');
    Route::get('inquiries/{inquiry}/edit', [InquiryController::class, 'edit'])->name('inquiries.edit');
    Route::put('inquiries/{inquiry}', [InquiryController::class, 'update'])->name('inquiries.update');

    Route::get('shares/{project}/create', [ShareController::class, 'create'])->name('shares.create');
    Route::post('shares/{project}', [ShareController::class, 'send'])->name('shares.send');

    Route::get('notices/{project}/create', [NoticeController::class, 'create'])->name('notices.create');
    Route::post('notices/{project}/store', [NoticeController::class, 'store'])->name('notices.store');
    Route::get('notices/{project}/email', [NoticeController::class, 'email'])->name('notices.email');
    Route::post('notices/{project}/send', [NoticeController::class, 'send'])->name('notices.send');
});
Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('questionnaires', [QuestionnaireController::class, 'index'])->name('questionnaires.index');
