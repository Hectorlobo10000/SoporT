<?php


	Auth::routes();
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
	Route::get('/','HomeController@index');
	Route::group(['middleware'=>['check.admin.role','prevent-back-history']], function(){
		//rutas del admin
		Route::resource('usuarios','UserController');
		Route::resource('departamentos','DepartmentController');
		Route::resource('actividades','TaskTypeController');
		Route::resource('lugares','PlaceController');
	});

	Route::group(['middleware'=>['check.technician.role','prevent-back-history']], function(){
		//rutas del tecnico
		Route::get('/tareas-pendientes','TechnicianController@pending')->name('pending');
		Route::get('/tareas-iniciadas','TechnicianController@initiated')->name('initiated');
		Route::get('/tareas-finalizadas','TechnicianController@finished')->name('finished');
		Route::patch('/actualizar-anotacion/{task}','TechnicianController@updateAnnotation')->where('task', '\d+')->name('update task annotation');
		Route::get('/editar-anotacion/{task}','TechnicianController@editAnnotation')->name('edit task annotation');
		Route::get('/mostrar-anotacion/{task}','TechnicianController@showAnnotation')->name('show task annotation');
		Route::get('/editar-estado/{task}','TechnicianController@editState')->name('edit task state');
		Route::patch('/actualizar-estado/{task}','TechnicianController@updateState')->where('task', '\d+')->name('update task state');
	});

	Route::group(['middleware'=>['check.client.role','prevent-back-history']], function(){
		//rutas del cliente
		Route::get('/tareas','TaskController@index')->name('tasks.index');
		Route::get('/tareas/edit/{task}','TaskController@edit')->name('tasks.edit');
		Route::put('/tareas/update/{task}','TaskController@update')->name('tasks.update');
		Route::post('/tareas/store','TaskController@store')->name('tasks.store');
		Route::delete('/tareas/destroy/{task}','TaskController@destroy')->name('tasks.destroy');
		Route::get('/tareas/create','TaskController@create')->name('tasks.create');
		Route::get('/tareas/historial','TaskController@history')->name('tasks.history');
		Route::delete('/tareas/historial/destroy/{task_log}','TaskLogController@destroy')->name('task_logs.destroy');
		Route::get('/chat/{task}','TaskMessageController@index')->name('chat.index');
	});

	Route::group(['middleware'=>['check.boss.role','prevent-back-history']], function(){
		//rutas del jefe
		Route::get('/inicio-jefe','BossController@index')->name('boss index');
	});

	//rutas para el tecnico y el cliente
	Route::get('/chat/{task}','TaskMessageController@index')->name('chat.index');
	Route::post('/chat/store','TaskMessageController@store')->name('chat.store');

	//rutas para todos los roles
	Route::get('/editar-perfil/{id}','UserController@editProfile')->name('edit.profile');
	Route::get('/mostrar-perfil/{id}','UserController@show')->name('show.profile');
?>