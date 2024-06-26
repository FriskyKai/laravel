<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Регистрация
Route::post('/registration', [UserController::class, 'singIn']);
// Авторизация
Route::post('/authorization', [UserController::class, 'login']);

// Роуты для авторизированных пользователей
Route::middleware('auth:sanctum')->group(function () {
    // Выход
    Route::get('/logout', [UserController::class, 'logout']);

    // РОЛЬ
    // Добавление роли
    Route::post('/roles', [RoleController::class, 'create']);
    // Просмотр всех ролей
    Route::get('/roles', [RoleController::class, 'index']);
    // Просмотр роли
    Route::get('/roles/{id}', [RoleController::class, 'show']);
    // Редактирование роли
    Route::patch('/roles/{id}', [RoleController::class, 'edit']);
    // Удаление роли
    Route::delete('/roles/{id}', [RoleController::class, 'destroy']);

    // ПОЛЬЗОВАТЕЛЬ
    // Просмотр всех пользователей
    Route::get('/users', [UserController::class, 'index']);
    // Просмотр пользователя
    Route::get('/users/{id}', [UserController::class, 'show']);
    // Редактирование пользователя
    Route::patch('/users/{id}', [UserController::class, 'edit']);
    // Удаление пользователя
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // СМЕНА
    // Добавление смены
    Route::post('/shifts', [ShiftController::class, 'create']);
    // Просмотр всех смен
    Route::get('/shifts', [ShiftController::class, 'index']);
    // Просмотр смены
    Route::get('/shifts/{id}', [ShiftController::class, 'show']);
    // Редактирование смены
    Route::patch('/shifts/{id}', [ShiftController::class, 'edit']);
    // Удаление смены
    Route::delete('/shifts/{id}', [ShiftController::class, 'destroy']);

    // АДРЕС
    // Добавление адреса
    Route::post('/addresses', [AddressController::class, 'create']);
    // Просмотр всех адресов
    Route::get('/addresses', [AddressController::class, 'index']);
    // Просмотр адреса
    Route::get('/addresses/{id}', [AddressController::class, 'show']);
    // Редактирование адреса
    Route::patch('/addresses/{id}', [AddressController::class, 'edit']);
    // Удаление адреса
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy']);

    // ЗАКАЗ
    // Добавление заказа
    Route::post('/orders', [OrderController::class, 'create']);
    // Просмотр всех заказов
    Route::get('/orders', [OrderController::class, 'index']);
    // Просмотр заказа
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    // Редактирование заказа
    Route::patch('/orders/{id}', [OrderController::class, 'edit']);
    // Удаление заказа
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

    // СОСТАВ ЗАКАЗА
    // Добавление состава заказа
    Route::post('/orderlists', [OrderListController::class, 'create']);
    // Просмотр всех составов заказа
    Route::get('/orderlists', [OrderListController::class, 'index']);
    // Просмотр состава заказа
    Route::get('/orderlists/{id}', [OrderListController::class, 'show']);
    // Редактирование состава заказа
    Route::patch('/orderlists/{id}', [OrderListController::class, 'edit']);
    // Удаление состава заказа
    Route::delete('/orderlists/{id}', [OrderListController::class, 'destroy']);

    // ДОБАВКА
    // Добавление добавки
    Route::post('/additives', [AdditiveController::class, 'create']);
    // Просмотр всех добавок
    Route::get('/additives', [AdditiveController::class, 'index']);
    // Просмотр добавки
    Route::get('/additives/{id}', [AdditiveController::class, 'show']);
    // Редактирование добавки
    Route::patch('/additives/{id}', [AdditiveController::class, 'edit']);
    // Удаление добавки
    Route::delete('/additives/{id}', [AdditiveController::class, 'destroy']);

    // СОСТАВ ЗАКАЗА_ДОБАВКА
    // Просмотр всех добавок в составе заказа
    Route::get('/orderlistadditives', [OrderListAdditiveController::class, 'index']);
    // Добавление добавки в состав заказа
    Route::post('/orderlistadditives', [OrderListAdditiveController::class, 'create']);
    // Удаление добавки из состава заказа
    Route::delete('/orderlistadditives/{id}', [OrderListAdditiveController::class, 'destroy']);

    // ТОВАР
    // Добавление товара
    Route::post('/products', [ProductController::class, 'create']);
    // Просмотр всех товаров
    Route::get('/products', [ProductController::class, 'index']);
    // Просмотр товара
    Route::get('/products/{id}', [ProductController::class, 'show']);
    // Редактирование товара
    Route::patch('/products/{id}', [ProductController::class, 'edit']);
    // Удаление товара
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    // КАТЕГОРИЯ
    // Добавление категории
    Route::post('/categories', [CategoryController::class, 'create']);
    // Просмотр всех категорий
    Route::get('/categories', [CategoryController::class, 'index']);
    // Просмотр категории
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    // Редактирование категории
    Route::patch('/categories/{id}', [CategoryController::class, 'edit']);
    // Удаление категории
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    // АКЦИЯ
    // Добавление акции
    Route::post('/promotions', [PromotionController::class, 'create']);
    // Просмотр всех акций
    Route::get('/promotions', [PromotionController::class, 'index']);
    // Просмотр акции
    Route::get('/promotions/{id}', [PromotionController::class, 'show']);
    // Редактирование акции
    Route::patch('/promotions/{id}', [PromotionController::class, 'edit']);
    // Удаление акции
    Route::delete('/promotions/{id}', [PromotionController::class, 'destroy']);

    // НОВОСТИ
    // Добавление новости
    Route::post('/articles', [ArticleController::class, 'create']);
    // Просмотр всех новостей
    Route::get('/articles', [ArticleController::class, 'index']);
    // Просмотр новости
    Route::get('/articles/{id}', [ArticleController::class, 'show']);
    // Редактирование новости
    Route::patch('/articles/{id}', [ArticleController::class, 'edit']);
    // Удаление новости
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);

    // СЛАЙДЕР
    // Добавление фотографии в слайдер
    Route::post('/slider', [SliderController::class, 'add']);
    // Просмотр всех фотографий в слайдере
    Route::get('/articles', [SliderController::class, 'index']);
    // Редактирование фотографий в слайдере
    Route::patch('/articles/{id}', [SliderController::class, 'edit']);
    // Удаление фотографий в слайдере
    Route::delete('/articles/{id}', [SliderController::class, 'destroy']);

    // КОРЗИНА
    // Добавление корзины
    Route::post('/cars', [CarController::class, 'create']);
    // Просмотр всех корзин
    Route::get('/cars', [CarController::class, 'index']);
    // Просмотр корзины
    Route::get('/cars/{id}', [CarController::class, 'show']);
    // Редактирование корзины
    Route::patch('/cars/{id}', [CarController::class, 'edit']);
    // Удаление корзины
    Route::delete('/cars/{id}', [CarController::class, 'destroy']);
});
