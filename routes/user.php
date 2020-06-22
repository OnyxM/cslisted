<?php


Route::get('/','User\PostingController@index')->name('user.dashboard');
Route::get('/attach-posting','User\PostingController@attachPostingToUser')->name('user.attach-posting');

Route::post('wishlist/add','User\WishlistController@add')->name('user.wishlist.add');

Route::resource('user-orders','OrderController');

Route::post('wishlist/remove','User\WishlistController@remove')->name('user.wishlist.remove');
Route::get('wishlist','User\WishlistController@index')->name('user.wishlist');
Route::get("/chat/messages/{conversation_id}","ChatController@fetchMessages");
Route::post("/chat/message/text/create","ChatController@createTextMessage");
Route::post("/chat/message/image/create","ChatController@createImageMessage");
Route::post("/chat/message/attachement/create", "ChatController@createAttachementMessage");
Route::get('/chat', 'ChatController@index')->name('chat');
Route::post('/chat/start', 'ChatController@startConversation')->name('chat.start');
Route::post('/chat/message/{message_id}/seen', "ChatController@markAsSeen")->name("chat.seen");
Route::resource('review','ReviewController')->only('store');
Route::get("/account", 'User\UserController@account')->name("user.account");
Route::post("/account/update", 'User\UserController@update')->name("user.update");