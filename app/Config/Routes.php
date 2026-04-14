<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'About::index');
$routes->get('management', 'Management::index');
$routes->get('institusi', 'Institusi::index');
$routes->get('individu', 'Individu::index');
$routes->get('news', 'News::index');
$routes->get('news/read/(:segment)', 'News::read/$1');
$routes->get('news/(:num)', 'News::detail/$1');
$routes->get('journals', 'Journals::index');
$routes->get('documents', 'Documents::index');
$routes->get('events', 'Events::index');
$routes->get('events/(:num)', 'Events::detail/$1');
$routes->get('events/(:num)/register', 'Events::registerForm/$1');
$routes->post('events/(:num)/register', 'Events::registerStore/$1');
$routes->get('events/(:num)/register/success', 'Events::registerSuccess/$1');
$routes->get('contact', 'Contact::index');
$routes->post('contact/submit', 'Contact::submit');

// Admin Authentication Routes
$routes->get('admin/login', 'Admin\Auth::index');
$routes->post('admin/login', 'Admin\Auth::login');
$routes->get('admin/logout', 'Admin\Auth::logout');

// Protected Admin Routes
$routes->group('admin', ['filter' => 'adminAuth'], function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    
    // News Management
    $routes->get('news', 'Admin\News::index');
    $routes->get('news/create', 'Admin\News::create');
    $routes->post('news/store', 'Admin\News::store');
    $routes->get('news/edit/(:num)', 'Admin\News::edit/$1');
    $routes->post('news/update/(:num)', 'Admin\News::update/$1');
    $routes->get('news/delete/(:num)', 'Admin\News::delete/$1');
    
    // Events Management
    $routes->get('events', 'Admin\Events::index');
    $routes->get('events/create', 'Admin\Events::create');
    $routes->post('events/store', 'Admin\Events::store');
    $routes->get('events/edit/(:num)', 'Admin\Events::edit/$1');
    $routes->post('events/update/(:num)', 'Admin\Events::update/$1');
    $routes->get('events/delete/(:num)', 'Admin\Events::delete/$1');
    
    // Member Management
    $routes->get('members', 'Admin\Members::index');
    
    // Individuals
    $routes->get('members/individuals/create', 'Admin\Members::createIndividual');
    $routes->post('members/individuals/store', 'Admin\Members::storeIndividual');
    $routes->get('members/individuals/edit/(:num)', 'Admin\Members::editIndividual/$1');
    $routes->post('members/individuals/update/(:num)', 'Admin\Members::updateIndividual/$1');
    $routes->get('members/individuals/delete/(:num)', 'Admin\Members::deleteIndividual/$1');
    
    // Institutions
    $routes->get('members/institutions/create', 'Admin\Members::createInstitution');
    $routes->post('members/institutions/store', 'Admin\Members::storeInstitution');
    $routes->get('members/institutions/edit/(:num)', 'Admin\Members::editInstitution/$1');
    $routes->post('members/institutions/update/(:num)', 'Admin\Members::updateInstitution/$1');
    $routes->get('members/institutions/delete/(:num)', 'Admin\Members::deleteInstitution/$1');
    
    // Board
    $routes->get('members/board/create', 'Admin\Members::createBoard');
    $routes->post('members/board/store', 'Admin\Members::storeBoard');
    $routes->get('members/board/edit/(:num)', 'Admin\Members::editBoard/$1');
    $routes->post('members/board/update/(:num)', 'Admin\Members::updateBoard/$1');
    $routes->get('members/board/delete/(:num)', 'Admin\Members::deleteBoard/$1');
    
    // Partners
    $routes->get('partners', 'Admin\Partners::index');
    $routes->post('partners/store', 'Admin\Partners::store');
    $routes->post('partners/update/(:num)', 'Admin\Partners::update/$1');
    $routes->get('partners/delete/(:num)', 'Admin\Partners::delete/$1');
    
    // Banners
    $routes->get('banners', 'Admin\Banners::index');
    $routes->post('banners/store', 'Admin\Banners::store');
    $routes->post('banners/update/(:num)', 'Admin\Banners::update/$1');
    $routes->get('banners/delete/(:num)', 'Admin\Banners::delete/$1');
    
    // Achievements
    $routes->get('achievements', 'Admin\Achievements::index');
    $routes->post('achievements/store', 'Admin\Achievements::store');
    $routes->post('achievements/update/(:num)', 'Admin\Achievements::update/$1');
    $routes->get('achievements/delete/(:num)', 'Admin\Achievements::delete/$1');
    
    // Profile / Settings
    $routes->get('profile', 'Admin\Profile::index');
    $routes->post('profile/update', 'Admin\Profile::update');

    // Documents & Panduan
    $routes->get('documents', 'Admin\Documents::index');
    $routes->post('documents/store', 'Admin\Documents::store');
    $routes->post('documents/update/(:num)', 'Admin\Documents::update/$1');
    $routes->get('documents/delete/(:num)', 'Admin\Documents::delete/$1');

    // Messages (Pesan Masuk)
    $routes->get('messages', 'Admin\Messages::index');
    $routes->get('messages/read/(:num)', 'Admin\Messages::read/$1');
    $routes->get('messages/delete/(:num)', 'Admin\Messages::delete/$1');
    $routes->get('messages/mark-all-read', 'Admin\Messages::markAllRead');

    // Event Registrations
    $routes->get('event-registrations', 'Admin\EventRegistrations::index');
    $routes->get('event-registrations/(:num)/participants', 'Admin\EventRegistrations::participants/$1');
    $routes->get('event-registrations/(:num)/export', 'Admin\EventRegistrations::export/$1');
    $routes->post('event-registrations/status/(:num)', 'Admin\EventRegistrations::updateStatus/$1');
    $routes->get('event-registrations/delete/(:num)', 'Admin\EventRegistrations::delete/$1');
});
